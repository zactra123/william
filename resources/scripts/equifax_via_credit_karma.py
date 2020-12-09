import json
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
from seleniumwire import webdriver
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

        options = webdriver.FirefoxOptions()
        options.add_argument('--disable-gpu')
        options.add_argument('--headless')
        user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36'
        options.set_preference("general.useragent.override", user_agent)
        try:
            self.driver = webdriver.Firefox(
                executable_path=os.environ.get('GECKO_DRIVER_PATH', '/var/www/python/geckodriver'), log_path='/home/ubuntu/geckodriver.log', options=options)
        except Exception as e:
            print(e)
            sys.exit()

        if not os.path.exists(self.json_directory):
            os.makedirs(self.json_directory)
        filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
        self.report_filepath = self.json_directory +'/report_'+filename


    def call(self):
        try:
            self.login()
#             self.print_report()
            self.driver.close()
            return {
                'status': 'success',
                'report_filepath': self.report_filepath
            }
        except Exception as e:
            self.driver.close()
            return {
                'status': 'error',
                'error': e,
                'report_filepath': self.report_filepath
            }

    def login(self):
        self.driver.get('https://www.creditkarma.com/auth/logon?redirectUrl=https%3A%2F%2Fwww.creditkarma.com%2Fdashboard')
        time.sleep(5)

        WebDriverWait(self.driver, 50).until(EC.presence_of_element_located((By.XPATH, '//*[@id="username"]')))
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

        self.driver.get('https://www.creditkarma.com/credit-health/equifax/credit-report')
        WebDriverWait(self.driver, 300).until(EC.url_to_be('https://www.creditkarma.com/credit-health/equifax/credit-report'))
        time.sleep(10)
        print("trying to access report")
        for request in self.driver.requests:
            self.process_browser_log_entry(request)
        time.sleep(10)

    def process_browser_log_entry(self, request):
        try:
            if request.response:
                if 'https://api.creditkarma.com/mobile/4.5' in request.url:
                    if b'creditReport' in request.response.body:
                        body = json.loads(request.response.body)
                        with open(self.report_filepath, "a+") as f:
                            sorted = json.dumps(body, indent=4)
                            f.write(sorted)
        except Exception as e:
            print(e)
            pass


equifax = equifaxCreditKarma(sys.argv)
print(equifax.call())
