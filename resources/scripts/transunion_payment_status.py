import requests
from bs4 import BeautifulSoup
import xlwt
import xlrd, json
import time,sys
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from colorama import init
from termcolor import colored
from PIL import Image
from fpdf import FPDF
import img2pdf
import os
from os import path
import datetime


class transUnionMebership: 

    def __init__(self, argumnets):
        self.username = sys.argv[1]
        self.password = sys.argv[2]
        self.db_id = sys.argv[3]

        mime_types = "application/pdf,application/vnd.adobe.xfdf,application/vnd.fdf,application/vnd.adobe.xdp+xml"

        options = webdriver.FirefoxOptions()
        options.add_argument("--disable-gpu")
        options.add_argument('--headless')
        fp = webdriver.FirefoxProfile()
        fp.set_preference("browser.download.folderList", 1)
        fp.set_preference("browser.helperApps.alwaysAsk.force", False)
        fp.set_preference("print.always_print_silent", True)
        fp.set_preference("Save as PDF", True)
        fp.set_preference("print save as pdf", True)
        fp.set_preference("browser.download.manager.showWhenStarting", False)
        fp.set_preference("browser.helperApps.neverAsk.saveToDisk", mime_types)
        fp.set_preference("plugin.disable_full_page_plugin_for_types", mime_types)
        fp.set_preference("pdfjs.disabled", True)

        self.driver = webdriver.Firefox(executable_path=os.environ['GECKO_DRIVER_PATH'], options=options, firefox_profile=fp)

        self.json_directory = '../storage/reports/' +self.db_id + '/transunion_payments'

        # create directory if not exist
        if not os.path.exists(self.json_directory):
            os.makedirs(self.json_directory)

        self.filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S')
        self.filepath_report = self.json_directory +'/report_data_'+self.filename  + '.json'
        self.filepath_report1 = self.json_directory +'/report_data1_'+self.filename + '.json'
    def call(self):
        try:
            msg = self.login()

            if msg =='Account Locked.':
                return {
                    'status': 'error',
                    'error': 'Account Locked.',
                    'report_filepath': self.filepath_report,
                }
            elif msg == "credit card information":
            
                return {
                    'status': 'error',
                    'error': 'Credit card information',
                    'report_filepath': self.filepath_report,
                }    
            else:
                return {
                    'status': 'success',
                    'report_filepath': self.filepath_report,
                }
        except:
            return {
                'status': 'error',
                'error': sys.exc_info(),
                'report_filepath': self.filepath_report,
            }



    def login(self):

        self.driver.get("https://membership.tui.transunion.com/tucm/login.page")

        username_field = self.driver.find_element_by_xpath(
            '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/div[1]/input'
        )
        username_field.send_keys(self.username)
        time.sleep(1)
        password_field = self.driver.find_element_by_xpath(
            '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/div[2]/input'
        )
        password_field.send_keys(self.password)
        time.sleep(1)
        self.driver.find_element_by_xpath(
            '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/button'
        ).click()
        time.sleep(5)

        soup = BeautifulSoup(self.driver.page_source, u'html.parser')

        if 'Account Locked.' in soup.text.strip():
            return 'Account Locked.'
        elif 'The credit card information you provided is not valid.' in soup.text.strip():
            return 'credit card information'

        elif 'Unable to Verify' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_401_UNAUTHORIZED,
                'message': 'Unable to Verify Identity',
            }


        try:
            self.driver.find_element_by_xpath(
                '//*[@id="bodyContent"]/div/div[2]/div/div/div[2]/div[1]/button'
            ).click()
            time.sleep(25)
            self.driver.find_element_by_xpath('/html/body/div[6]/form/div[2]/div/div[2]/div/a').click()
            time.sleep(3)
        except:
            pass

        try:
            self.driver.find_elements_by_class_name('dontShow floaterLink modal-action-alt').click()
            time.sleep(3)
        except:
            pass

        # Refresh Now Button Click
        try:
            self.driver.find_element_by_xpath('//*[@id="dashboard-tools"]/div[2]/div[1]/div/a[1]').click()
            time.sleep(15)
            self.driver.find_element_by_id('confirmRefreshconfirmRefresh').click()
            time.sleep(1)

            self.driver.find_element_by_id('confirmRefreshButton').click()
            time.sleep(60)
        except:
            # print(sys.exc_info())
            pass

        try:
            self.driver.find_element_by_xpath('/html/body/div[1]/div[2]/form/div/div/section[3]/div/div/button').click()
            time.sleep(15)
        except:
            pass

        # Hitting Credit Report Page
        self.driver.get("https://membership.tui.transunion.com/tucm/creditReport_TUCM.page?")

        # Clicking on Each Report to Expand
        # Real Estate
        self.driver.execute_script("$('.account-row').click()")
       

        self.print_pdf('accounts')

        # self.driver.execute_script('window.print();')
        # Waiting for pdf Saving
        # time.sleep(60)

        # --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        # Clicking For Payment Status
        # ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        # Loading For Payments
        self.driver.execute_script("$('.account-toggle:contains(Payment Status)').click()")
        self.driver.execute_script("$('.history-show-more').click()")

        time.sleep(5)     


        time.sleep(3)
        soup = BeautifulSoup(self.driver.page_source, u"html.parser")

        all_scripts = soup.find('script',attrs={'id':'UserData'})
        all_scripts = str(all_scripts).split(' var ud = ')[1].split('</script>')[0].strip().replace('/n','')
        all_scripts = all_scripts.replace('/','').strip()

        jsondata = json.loads(all_scripts)

        with open(self.filepath_report, "a+") as f:
            sorted = json.dumps(jsondata, indent=4)
            f.write(sorted)
       
        self.print_pdf('payments')

    def print_pdf(self, subName):
        full_image = self.filename+subName+ '_%s.png'
        js = 'return Math.max( document.body.scrollHeight, document.body.offsetHeight,  document.documentElement.clientHeight,  document.documentElement.scrollHeight,  document.documentElement.offsetHeight);'
        total_height = self.driver.execute_script(js)
        self.driver.set_window_size(1920, 20000)

        slices = [] 
        offset = 0
        verbose = 1
        img = ''
        s = 0
        step = 20000
        while offset < total_height:
            s +=1
            self.driver.execute_script("window.scrollTo(0, %s);" % offset)
            offset += step
            if total_height < offset:
                offset = total_height
            self.driver.get_screenshot_as_file(self.json_directory + '/' + (full_image % s))


transUnion = transUnionMebership(sys.argv)
print(transUnion.call())