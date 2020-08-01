from rest_framework import status
import json
from selenium import webdriver
import requests
from bs4 import BeautifulSoup
from selenium.webdriver.firefox.options import Options
import sys
import time
from selenium.webdriver.common.keys import Keys
import re
import random
import string

import os
from os import path
import datetime


class transunionDispute:
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


