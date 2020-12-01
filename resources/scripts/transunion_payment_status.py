import requests
from bs4 import BeautifulSoup
import xlwt
import xlrd, json
import time, sys, traceback
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import os
from os import path
import datetime


class transUnionMebership:

    def __init__(self, argumnets):
        self.username = sys.argv[1]
        self.password = sys.argv[2]
        self.json_directory = sys.argv[3]
        self.db_id = sys.argv[4]

        os.environ["HOME"] = '/home/ubuntu'

        mime_types = "application/pdf,application/vnd.adobe.xfdf,application/vnd.fdf,application/vnd.adobe.xdp+xml"

        options = webdriver.FirefoxOptions()
        options.add_argument("--disable-gpu")
        user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36'
        options.set_preference("general.useragent.override", user_agent)
        options.add_argument('--headless')
        options.add_argument('--no-sandbox')
        self.driver = webdriver.Firefox(executable_path=os.environ.get('GECKO_DRIVER_PATH', '/usr/bin/geckodriver'), log_path='/home/ubuntu/geckodriver.log', options=options)

#         self.json_directory = '../../storage/reports/' +self.db_id + '/transunion_payments'

        # create directory if not exist
        if not os.path.exists(self.json_directory):
            try:
                original_umask = os.umask(0)
                os.makedirs(self.json_directory)
            finally:
                os.umask(original_umask)

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
        except Exception as e:
            return {
                'status': 'error',
                'error': e.args[0],
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
            raise Exception({"message": "Account Locked."})
        elif 'The credit card information you provided is not valid.' in soup.text.strip():
            raise Exception({"message":"The credit card information you provided is not valid."})

        elif 'Unable to Verify' in soup.text.strip():
            raise Exception({"message":"Unable to Verify Identity"})

        try:
            self.driver.find_element_by_xpath(
                '//*[@id="bodyContent"]/div/div[2]/div/div/div[2]/div[1]/button'
            ).click()

            WebDriverWait(self.driver, 30).until(EC.url_to_be('https://membership.tui.transunion.com/tucm/dashboard.page'))
            WebDriverWait(self.driver, 30).until(EC.visibility_of_element_located((By.XPATH, '/html/body/div[6]/form/div[2]/div/div[2]/div/a')))
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
        except:
            pass

        try:
            WebDriverWait(self.driver, 60).until(EC.presence_of_element_located((By.XPATH, '/html/body/div[1]/div[2]/form/div/div/section[3]/div/div/button')))
            self.driver.find_element_by_xpath('/html/body/div[1]/div[2]/form/div/div/section[3]/div/div/button').click()
            time.sleep(15)
        except:
            pass

        # Hitting Credit Report Page
        self.driver.get("https://membership.tui.transunion.com/tucm/creditReport_TUCM.page?")

        # Clicking on Each Report to Expand
        # Real Estate
        self.driver.execute_script("$('.account-row').click()")


        #self.print_pdf('accounts')

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

        soup = BeautifulSoup(self.driver.page_source, u"html.parser")

        all_scripts = soup.find('script',attrs={'id':'UserData'})
        all_scripts = str(all_scripts).split(' var ud = ')[1].split('</script>')[0].strip().replace('/n','')
        all_scripts = all_scripts.replace('/','').strip()

        jsondata = json.loads(all_scripts)

        with open(self.filepath_report, "a+") as f:
            sorted = json.dumps(jsondata, indent=4)
            f.write(sorted)

        #self.driver.execute_script('window.print();')
        #self.print_pdf('payments')

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
quit()
