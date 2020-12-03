import json
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
# from seleniumwire import webdriver
from selenium import webdriver
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.proxy import Proxy, ProxyType
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import requests
from requests.auth import HTTPBasicAuth
from pprint import pprint

import os
from os import path
import datetime


class equifaxCreditKarma:
    def __init__(self, arguments):
        self.username = arguments[1]
        self.password = arguments[2]
        self.json_directory = arguments[3]
        self.db_id = arguments[4]

#         PROXY = '64.137.162.212:3128'
#         PROXY = '199.191.56.218:3128'
        # PROXY = '206.127.88.18:80'
        # PROXY = '199.195.252.161:8080'
        # PROXY = '206.221.176.130:3128'
        # PROXY = '45.77.68.5:3128'

        caps = webdriver.DesiredCapabilities.CHROME
#         caps['proxy'] = {
#             "httpProxy": PROXY,
#             "ftpProxy": PROXY,
#             "sslProxy": PROXY,
#             "proxyType": "MANUAL",
#
#         }
        caps['loggingPrefs'] = {'performance': 'ALL'}
        driver = webdriver.Chrome(desired_capabilities=caps)
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

        options = webdriver.ChromeOptions()
        options.add_experimental_option("useAutomationExtension", False)
        options.add_experimental_option(
                "excludeSwitches", ["enable-automation"])
        options.add_experimental_option('prefs', profile)
        options.add_argument('--kiosk-printing')
        options.add_argument('--headless')

        self.driver = webdriver.Chrome(executable_path=os.environ.get('CHROME_DRIVER_PATH', '/usr/bin/chromedriver'), options=options)

        # create directory if not exist
        if not os.path.exists(self.json_directory):
            os.makedirs(self.json_directory)
        filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
        self.report_filepath = self.json_directory +'/report_numbers_'+filename


    def call(self):
        try:
            self.login()

            return {
                'status': 'success',
                'report_filepath': self.report_filepath
            }
        except Exception as e:
            return {
                'status': 'error',
                'error': e[0],
                'report_filepath': self.report_filepath
            }

    def login(self):
        try:
            self.driver.get('https://www.creditkarma.com/auth/logon?redirectUrl=https%3A%2F%2Fwww.creditkarma.com%2Fdashboard')
            WebDriverWait(self.driver, 10).until(EC.presence_of_element_located((By.XPATH, '//*[@id="username"]')))
            time.sleep(2)
            uname = self.driver.find_element_by_xpath(
                '//*[@id="username"]')
            uname.click()

            uname.send_keys(self.username)

            upass = self.driver.find_element_by_xpath(
                '//*[@id="password"]')
            upass.click()
            upass.send_keys(self.password)

            self.driver.find_element_by_xpath(
                '//*[@id="Logon"]').click()
            WebDriverWait(self.driver, 300).until(EC.url_to_be('https://www.creditkarma.com/dashboard'))

            self.driver.get('https://www.creditkarma.com/credit-health/equifax/report')
            # WebDriverWait(self.driver, 20).until(EC.url_to_be('https://www.creditkarma.com/credit-health/equifax/report'))
            time.sleep(10)
            browser_log = self.driver.get_log('performance')

            for request in browser_log:
                self.process_browser_log_entry(request)
        except:
            pass
        time.sleep(8)
        self.driver.get('https://www.creditkarma.com/myfinances/creditreport/equifax/view/print#overview')
        self.driver.execute_script('window.print();')

    def process_browser_log_entry(self, entry):
        response = json.loads(entry['message'])['message']
        try:
            if response["params"]["response"]:
                if 'https://api.creditkarma.com/mobile/4.5' in response["params"]["response"]["url"]:
                    body = self.driver.execute_cdp_cmd('Network.getResponseBody', {'requestId': response["params"]["requestId"]})['body']
                    data = json.loads(body)[3]
                    with open(self.report_filepath, "a+") as f:
                        sorted = json.dumps(data, indent=4)
                        f.write(sorted)
        except:
            pass


equifax = equifaxCreditKarma(sys.argv)
print(equifax.call())
