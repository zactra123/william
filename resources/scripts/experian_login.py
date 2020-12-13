import json
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
from pyvirtualdisplay import Display
# from selenium import webdriver
from seleniumwire import webdriver
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.proxy import Proxy, ProxyType
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import requests
from requests.auth import HTTPBasicAuth

from requests.adapters import HTTPAdapter
from requests.packages.urllib3.util.retry import Retry

from pprint import pprint

import os
from os import path
import datetime


class experianLogin:
    def __init__(self, arguments):
        self.username = arguments[1]
        self.password = arguments[2]
        self.question = arguments[3]
        self.pinn = arguments[4]
        self.dob = arguments[5]
        self.ssn = arguments[6]
        self.json_directory = arguments[7]
        self.db_id = arguments[8]
        self.error_message = []

        # PROXY = '143.110.151.242:3128'
        # PROXY = '18.144.13.212:3128'
#         PROXY = '144.202.100.35:3128'

#         webdriver.DesiredCapabilities.CHROME['proxy'] = {
#             "httpProxy": PROXY,
#             "ftpProxy": PROXY,
#             "sslProxy": PROXY,
#             "proxyType": "MANUAL",
#
#         }

#         self.proxies = {
#             "http": "http://%s"%PROXY,
#             "https": "http://%s"%PROXY
#         }
#         caps = webdriver.DesiredCapabilities.CHROME
#         caps['loggingPrefs'] = {'performance': 'ALL'}
        driver = webdriver.Chrome()
        appState = {
            "recentDestinations": [
                {
                    "id": "Save as PDF",
                    "origin": "local",
                    "account": ""
                }
            ],
            "selectedDestinationId": "Save as PDF",
            "version": 2
        }
        profile = {
            'printing.print_preview_sticky_settings.appState': json.dumps(appState)}

        self.options = webdriver.ChromeOptions()
        self.options.add_experimental_option("useAutomationExtension", False)
        self.options.add_experimental_option(
                "excludeSwitches", ["enable-automation"])
        self.options.add_experimental_option('prefs', profile)
        self.options.add_argument('--kiosk-printing')
#         self.options.add_argument('--headless')

        self.driver = webdriver.Chrome(executable_path=os.environ.get('CHROME_DRIVER_PATH', '/usr/bin/chromedriver'), options=self.options)
        # self.driver = webdriver.Chrome(executable_path="C:/python/tests/python_new_scripts/ALLCREDITUNIONS/Furnisher_address/chromedriver.exe", options=self.options)

        # create directory if not exist
        if not os.path.exists(self.json_directory):
            os.makedirs(self.json_directory)
        filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
        self.filepath_report = self.json_directory +'/report_data_'+filename
        self.filepath_numbers = self.json_directory +'/report_numbers_'+filename


    def call(self):
        try:
#             self.get_json()
            self.login()
            self.get_report()
            self.get_report_numbers()
            self.driver.close()
            return {
                'status': 'success',
                'message': self.error_message,
                'report_filepath': self.filepath_report,
                'numbers_filepath': self.filepath_numbers
            }
        except Exception as e:
            self.driver.close()
            return {
                'status': 'error',
                'error': e,
                'report_filepath': self.filepath_report,
                'numbers_filepath': self.filepath_numbers
            }

    def get_json(self):

        session = requests.Session()
#         session.proxies = self.proxies
        retry = Retry(connect=3, backoff_factor=0.5)
        adapter = HTTPAdapter(max_retries=retry)
        session.mount('http://', adapter)
        session.mount('https://', adapter)


        #session = requests.Session()
        data = '{"username":"'+self.username+'","password":"' + \
            self.password+'","clientId": "experian", "jsc":"7la44j1eJNlY5BSo9z4ofjb75PaK4Vpjt4U_98uszHVyVxFAk.lzXJJIneGffLMC7EZ3QHPBirTYKUowRslzRQqwSM2ighjB9igDN.TpZHgfLMC7AeLd7FmrpwoNN5uT2M6uJ6o6e0T.5yjaY1WMsiZRPrwXjm_3xRUdFUFTc4s.Nzl998tp7ppfAaZ6m1CdC5MQjGejuTDRNziCvTDfWrLLra4ML6B.EPm8LKfAaZ4ySy.aPjftckogtOwFPDLLMUbJlpMpwoNSUC56MnGWpwoNHHACVZXnN9133cDkKSijMhRCk6Hb9LarUqUdHz16rgPtTma1kxNGYidKw1VgN40N9csdmcKFvj9dyP4yfhwHCSFQ_v9NA2pNNW5BQYTrYetvqU1j8xiDyCY5DuXY5BNkOxfT0XwPIixBEjaCQucKFye4yP4yfhzI5a5CWJA0GrCEuWYKOIN.nySEw.PhHR5F9aL27ozbOKOOkToufjJ291Sp_evrW55uKXVFCowrFvWUjoKnvi9gJ2KZVsBhElNaU89O74gDvuA9hmVsgJ0Nc3QO_btyrYeycYYIDbvRa0Nc0QEtzmfWepK9bMe1Uws1LJoCLef80b37OTcBuXDCBuUhmNByzZ6m61DCBsJr8VYf4.9gJ.elF1x_Ff4.A2pWL90ftctDL90ftctDL9.Mfp9gJ.jMeKNc0QR9lFDSy.aPrRvxnS9lF3t8.fh2DkFnzeb.6eZq2hJ9b.0LMMAhZccDSRoRPaHEvwLNApw.2ni","trustId":"385a4dbdb7cd4ff3a44a6f4965275ade"}'
        headers = {
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0',
            'Accept': 'application/json',
            'Accept-Language': 'en-US,en;q=0.5',
            'Referer': 'https://usa.experian.com/',
            'Content-Type': 'application/json',
            'ADRUM': 'isAjax:true',
            'Origin': 'https://usa.experian.com',
            'Connection': 'keep-alive',
            'TE': 'Trailers',
        }

        ress = session.post(
            'https://usa.experian.com/api/securelogin/oauth/token', data=data, headers=headers)
        headd = json.loads(ress.content)
        if 'errors' in headd:
            raise Exception(headd['errors'])

        tokken = str(headd['token']['accessToken'])
        tid = str(headd['trustId'])
        headers = {
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0',
            'Accept': 'application/json',
            'Accept-Language': 'en-US,en;q=0.5',
            'Referer': 'https://usa.experian.com/',
            'Authorization': tokken,
            'Content-Type': 'application/json; charset=utf-8',
            'ADRUM': 'isAjax:true',
            'Origin': 'https://usa.experian.com',
            'DNT': '1',
            'Connection': 'keep-alive',
            'TE': 'Trailers',
        }
        data = '{"answer":"'+str(self.question)+'","pin":"'+str(self.pinn)+'","trustDevice":true,"trustId":"' + \
            str(tid)+'"}'
        response = session.post('https://usa.experian.com/api/securelogin/submitquestion',
                                headers=headers, data=data.encode('utf-8'))

        main = json.loads(response.content)

        try:
            m_token = str(main['token']['accessToken'])
        except:
            m_token = tokken
        try:
            qdata = '{"dob": "1983-03-07","ssn": "618252314","trustDevice": true,"trustId": "' + \
                str(tid)+'"}'
            qheaders = {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:78.0) Gecko/20100101 Firefox/78.0',
                'Accept': 'application/json',
                'Accept-Language': 'en-US,en;q=0.5',
                'Referer': 'https://usa.experian.com/',
                'Authorization': m_token,
                'Content-Type': 'application/json',
                'ADRUM': 'isAjax:true',
                'Connection': 'keep-alive',
                'Cache-Control': 'max-age=0',
                'TE': 'Trailers',
                'DNT': '1',
            }
            qress = session.post(
                'https://usa.experian.com/api/securelogin/submitdob', data=qdata.encode('utf-8'), headers=qheaders)

            qheadd = json.loads(qress.content)
            q_token = str(qheadd['token']['accessToken'])
            m_token = q_token
        except:
            m_token = m_token
            pass
        headers = {
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0',
            'Accept': 'application/json',
            'Accept-Language': 'en-US,en;q=0.5',
            'Referer': 'https://usa.experian.com/',
            'Authorization': m_token,
            'Content-Type': 'application/json',
            'ADRUM': 'isAjax:true',
            'Connection': 'keep-alive',
            'Cache-Control': 'max-age=0',
            'TE': 'Trailers',
        }

        resp = session.get("https://usa.experian.com/api/dispute/cdis", headers=headers)
        p_main = json.loads(resp.content)

        with open(self.filepath_report, "a+") as f:
            sorted = json.dumps(p_main, indent=4)
            f.write(sorted)

    def login(self):

#         self.driver = webdriver.Chrome(executable_path="C:/python/tests/python_new_scripts/ALLCREDITUNIONS/Furnisher_address/chromedriver.exe", options=self.options)
        self.driver.get('https://usa.experian.com/login/index')
        time.sleep(5)
        WebDriverWait(self.driver, 30).until(EC.presence_of_element_located((By.XPATH, '//*[@id="username"]')))
        uname = self.driver.find_element_by_xpath(
            '//*[@id="username"]')
        uname.click()

        uname.send_keys(self.username)

        upass = self.driver.find_element_by_xpath(
            '//*[@id="password"]')
        upass.click()
        upass.send_keys(self.password)

        self.driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/div[1]/app-signin-form/ecs-form/form/div[5]/button').click()
        time.sleep(5)
        soup = BeautifulSoup(self.driver.page_source, 'html.parser')
        if 'Billing Information Update' in soup.text.strip():
            raise Exception({"message": "Please Enter Credit Card Number"})


        if self.driver.current_url == 'https://usa.experian.com/member/loginInterstitial':
            try:
                self.driver.find_element_by_xpath('//*[@id="siteContent"]/div/div/form/div/div[2]/div/div[2]/div/div[5]/button').click()
                time.sleep(10)
            except:
                pass

        if self.driver.current_url == 'https://usa.experian.com/member/overview':
            return True


        try:
            WebDriverWait(self.driver, 20).until(EC.presence_of_element_located((By.XPATH, '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-text/p/a')))

            secretQuestion = self.driver.find_element_by_xpath('/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-text/p/a')
            secretQuestion.click()
        except:
            pass

        time.sleep(8)


        try:
            # self.driver.get('https://usa.experian.com/login/ato/question')

            teacher = self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[1]/div/div[2]/input')

            teacher.click()

            teacher.send_keys(self.question)

            pin = self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[2]/div/div[2]/input')

            pin.click()
            pin.send_keys(self.pinn)

            self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/button').click()
            time.sleep(10)

            DOB = self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-dob-input/div/ecs-input/div/div[2]/input')

            DOB.click()

            DOB.send_keys(self.dob)

            ssn = self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-ssn-input/label/div[2]/input')
            ssn.click()
            ssn.send_keys(self.ssn)

            self.driver.find_element_by_xpath(
                '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/div/button').click()

        except:
            pass
        time.sleep(8)



    def get_report(self):
        try:
            self.driver.find_element_by_xpath(
                '/html/body/app-root/div[2]/div/div[1]/main/div/div/form/div/div[2]/div/div[2]/div/div[5]/button').click()
        except:
            pass

        time.sleep(6)

        soup = BeautifulSoup(self.driver.page_source, 'html.parser')

        if 'Billing Information Update' in soup.text.strip():
            raise Exception({"message": "Please Enter Credit Card Number"})
        else:
            self.driver.get(
                'https://usa.experian.com/member/disputeCenter/reportSummary')
            time.sleep(5)

            soup = BeautifulSoup(self.driver.page_source, 'html.parser')
            try:
                block1 = soup.find('div', attrs={'class': 'dispute-error-found--block'})
                from rest_framework import status
                self.error_message.append( {
                    'status': 'technical difficulties and cannot access your report',
                    'code': status.HTTP_422_UNPROCESSABLE_ENTITY,
                    'message': block1.text.strip(),
                })
            except:
                pass

            if 'Billing Information Update' in soup.text.strip():
                raise Exception({"message": "Please Enter Credit Card Number"})
            try:
                self.driver.find_element_by_xpath(
                        '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/form/label').click()
            except:
                pass
            try:
                self.driver.find_element_by_xpath(
                    ('/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/form/label[2]/span[1]')).click()
            except:
                pass

            time.sleep(5)
            try:
                self.driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/button').click()
            except:
                pass
            try:
                self.driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/div[2]/div[1]/div/div[2]/div/a').click()
            except:
                pass

            self.driver.get(
                'https://usa.experian.com/member/disputeCenter/reportSummary')
            time.sleep(5)
            try:
                error = self.driver.find_element_by_class_name(
                    'dispute-header').text
                if "Dispute Can't Be Processed Online" in error:
                    self.driver.get(
                        'https://usa.experian.com/member/reports/experian/now?scroll=false')
                self.driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div[2]/div/div/div/div[2]/div[1]/button').click()
                time.sleep(5)
            except:
                time.sleep(10)
                self.driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div/div/div[2]/div[2]/a/span').click()

            time.sleep(5)
            # driver.switch_to.active_element
            self.driver.switch_to_window(self.driver.window_handles[1])
            self.driver.switch_to.default_content
            self.driver.switch_to.window
            # driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + Keys.TAB)
            time.sleep(15)
            for request in self.driver.requests:
                try:
                    if request.response:
                        if 'https://usa.experian.com/api/dispute/cdis' in request.url:
                            body = json.loads(request.response.body)
                            with open(self.filepath_report, "a+") as f:
                                sorted = json.dumps(body, indent=4)
                                f.write(sorted)
                            break
                except Exception as e:
                    pass
            time.sleep(3)
            # print(driver.current_window_handle)
            self.driver.execute_script('window.print();')
            time.sleep(5)


    def get_report_numbers(self):
        self.driver.switch_to_window(self.driver.window_handles[0])
        self.driver.switch_to.default_content
        self.driver.switch_to.window
        self.driver.get('https://usa.experian.com/member/disputeCenter')

        time.sleep(4)
        soup = BeautifulSoup(self.driver.page_source, 'html.parser')
        a_main = []
        repn = []

        all_rep = soup.findAll(
            'div', attrs={'data-tms': 'dispute-completed-view-results'})
        if len(all_rep) != 0:
            for rep in all_rep:
                rep_links = 'https://usa.experian.com' + str(rep.get('href'))

                self.driver.get(rep_links)
                time.sleep(3)
                rsoup = BeautifulSoup(self.driver.page_source, 'html.parser')
                rnum = rsoup.find(
                    'span', attrs={'ng-bind': '::cdfItem.reportNumber'}).text.strip().replace('-', '')

                rdate = rsoup.find('span', attrs={
                    'ng-bind': 'getFormattedDate(cdfItem.cdfDateCreated)'}).text.strip()

                aa = {

                    'Report Number': rnum,
                    'Date Generated': rdate
                }

                a_main.append(aa)

            repn = {
                'Username': self.username,
                'SSN': int(self.ssn.replace('-', '').replace('\u200e', '')),
                'Report Numbers': a_main,
            }
            with open(self.filepath_numbers, "a+") as f:
                sorted = json.dumps(repn, indent=4)
                f.write(sorted)

        else:

            self.driver.get(
                'https://usa.experian.com/member/disputeCenter/reportSummary')
            repn = []
            time.sleep(4)
            ssoup = BeautifulSoup(self.driver.page_source, 'html.parser')

            repnum = ssoup.find(
                'span', attrs={"ng-bind": "modifiedCdiId || 'N/A'"}).text.strip().replace('-', '')
            rddate = ssoup.find(
                'span', attrs={"ng-bind": "(modifiedConsumerDate | date:'MMM d, yyyy') || 'N/A'"}).text.strip()

            repn = {
                'Username': self.username,
                'SSN': int(self.ssn.replace('-', '').replace('\u200e', '')),
                'Report Numbers': repnum,
                'Date Generated': rddate
            }

            with open(self.filepath_numbers, "a+") as f:
                sorted = json.dumps(repn, indent=4)
                f.write(sorted)

display = Display(visible=0, size=(800, 600))
display.start()
experian = experianLogin(sys.argv)
print(experian.call())
display.stop()
