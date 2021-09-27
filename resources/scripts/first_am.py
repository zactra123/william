import json
import time
from selenium import webdriver
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.proxy import Proxy, ProxyType
import sys
import random
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import requests
from requests.auth import HTTPBasicAuth
from pprint import pprint
session = requests.Session()


class myFirstAm:
     def __init__(self, arguments):
        self.address = arguments[1]
        self.city = arguments[2]
        self.state = arguments[2]
        self.zip = arguments[2]
        print(self.username, self.password)