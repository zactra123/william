import json
from selenium import webdriver
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.keys import Keys
import requests
from requests.auth import HTTPBasicAuth
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
        self.db_id = arguments[7]

        options = webdriver.ChromeOptions()
        # options.add_argument('--disable-gpu')
        # options.add_argument("disable-infobars")
        options.add_experimental_option("useAutomationExtension", False)
        options.add_experimental_option(
            "excludeSwitches", ["enable-automation"])
        options.add_experimental_option('prefs', profile)
        options.add_argument('--kiosk-printing')
        # options.add_argument('--headless')
        self.driver = webdriver.Chrome(
            executable_path=os.environ['CHROME_DRIVER_PATH'], options=options)

        json_directory = '../storage/reports/' + self.db_id + '/experian_login'
        # create directory if not exist
        if not os.path.exists(json_directory):
            os.makedirs(json_directory)
        filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
        self.filepath_report = json_directory +'/report_data_'+filename
        self.filepath_numbers = json_directory +'/report_numbers_'+filename


    def call(self):
        try:
            self.get_json()
            self.get_pdf()
            self.get_report_numbers()

            return {
                'status': 'success',
                'report_filepath': self.filepath_report,
                'numbers_filepath': self.filepath_numbers
            }
        except:
            return {
                'status': 'error',
                'error': sys.exc_info(),
                'report_filepath': self.filepath_report,
                'numbers_filepath': self.filepath_numbers
            }

    def get_json(self):
        session = requests.Session()
        data = '{"username":"'+self.username+'","password":"' + \
            self.password+'","clientId": "experian"}'
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

    def get_pdf(self):
        self.driver.get('https://usa.experian.com/login/index')
        time.sleep(10)
        uname = self.driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/ecs-input/div/div[2]/input')
        uname.click()

        uname.send_keys(self.username)

        upass = self.driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/div[2]/ecs-input/div/div[2]/input')
        upass.click()
        upass.send_keys(self.password)

        self.driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/div[4]/button').click()
        time.sleep(5)
        soup = BeautifulSoup(driver.page_source, 'html.parser')
        if 'Billing Information Update' in soup.text.strip():
            from rest_framework import status
            raise {
                'status': 'Billing Information Update require',
                'code': status.HTTP_422_UNPROCESSABLE_ENTITY,
                'message': 'Please Enter Credit Card Number',
            }

        else:

            try:
                self.driver.get('https://usa.experian.com/login/ato/question')

                teacher = self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[1]/div/div[2]/input')

                teacher.click()

                teacher.send_keys(question)

                pin = self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[2]/div/div[2]/input')

                pin.click()
                pin.send_keys(pinn)

                self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/button').click()
                time.sleep(10)

                DOB = self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-dob-input/div/ecs-input/div/div[2]/input')

                DOB.click()

                DOB.send_keys(date_OB)

                ssn = self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-ssn-input/label/div[2]/input')
                ssn.click()
                ssn.send_keys(sec_pin)

                self.driver.find_element_by_xpath(
                    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/div/button').click()

            except:
                pass

            time.sleep(8)

            try:
                self.driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div/form/div/div[2]/div/div[2]/div/div[5]/button').click()
            except:
                pass

            time.sleep(6)

            soup = BeautifulSoup(self.driver.page_source, 'html.parser')

            if 'Billing Information Update' in soup.text.strip():
                from rest_framework import status
                raise {
                    'status': 'Billing Information Update require',
                    'code': status.HTTP_422_UNPROCESSABLE_ENTITY,
                    'message': 'Please Enter Credit Card Number',
                }

            else:
                self.driver.get(
                    'https://usa.experian.com/member/disputeCenter/reportSummary')
                time.sleep(5)

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
                self.driver.switch_to_window(driver.window_handles[1])
                self.driver.switch_to.default_content
                self.driver.switch_to.window
                # driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + Keys.TAB)
                # driver.find_element_by_tag_name('button').click()

                # time.sleep(5)

                # print(driver.current_url)
                time.sleep(3)
                # print(driver.current_window_handle)
                self.driver.execute_script('window.print();')
                time.sleep(5)

    def get_report_numbers(self):
        self.driver.switch_to_window(driver.window_handles[0])
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
                rsoup = BeautifulSoup(driver.page_source, 'html.parser')
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
                'Username': username,
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

experian = experianLogin(sys.argv)
print(experian.call())
