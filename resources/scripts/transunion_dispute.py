from rest_framework import status
import json
from selenium import webdriver
import requests
from bs4 import BeautifulSoup
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
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
        self.fname = arguments[3]
        self.lname = arguments[4]
        self.address = str(arguments[5]).replace('_', ' ')
        self.city = arguments[6].replace('_', ' ')
        self.state = arguments[7]
        self.zipcode = arguments[8]
        # Shoud be True or False
        # mi hat tenanq es incha
        self.lived_status = True

        self.email = arguments[9]
        dob = str(arguments[10]).split('/')
        self.dobmonth = dob[0]
        self.dobday = dob[1]
        self.dobyear = dob[2]

        ssn = str(arguments[11]).split('-')
        self.ssn1 = ssn[0].strip()
        self.ssn2 = ssn[1].strip()
        self.ssn3 = self.last4sscnumber = ssn[2].strip()

        # Boolean
        self.tips_enable = True
        self.mobile = arguments[12]
        self.secret_answer = 'TOYOTA'

        self.should_login = arguments[13]
        self.db_id = arguments[14]

        # webdriver
        options = webdriver.FirefoxOptions()
        options.add_argument('--disable-gpu')
        self.driver = webdriver.Firefox(
            executable_path=os.environ['GECKO_DRIVER_PATH'], options=options)


        json_directory = '../storage/reports/' + self.db_id + '/transunion_dispute'
        # create directory if not exist
        if not os.path.exists(json_directory):
            os.makedirs(json_directory)

        filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
        self.filepath_report = json_directory +'/report_data_'+filename

    def call(self):
        try:
            #try to login
            msg = 'Username or Password Incorrect'
            if self.should_login == 'True':
                msg = self.login()

            if 'Username or Password Incorrect' in msg:
                self.recover_account()
            return msg
        except:
            return {
                'status': 'error',
                'error': sys.exc_info(),
                'report_filepath': self.filepath_report
            }

    def login(self):
        try:
            self.driver.get('https://service.transunion.com/dss/login.page?dest=dispute')
            WebDriverWait(self.driver, 2).until(EC.presence_of_element_located((By.NAME, 'tl.username')))
            uname = self.driver.find_element_by_name('tl.username')
            uname.click()
            uname.send_keys(self.username)
            upass = self.driver.find_element_by_name('tl.password')
            upass.click()
            upass.send_keys(self.password)
            time.sleep(1)
            self.driver.find_element_by_xpath(
                '//*[@id="c1527812999683"]/form/div/div/section[2]/div/div/div/button').click()
            time.sleep(15)
            soup = BeautifulSoup(driver.page_source, u'html.parser')
            msg = soup.find('div', attrs={'class': 'message'})
            if msg:
                return msg.text.strip()
            else:
                return 'success'
        except:
            msg = 'Exception'
            return msg

    def recover_account(self):
        self.driver.get('https://service.transunion.com/dss/loginHelp1_form.page?')
        WebDriverWait(self.driver, 2).until(EC.presence_of_element_located((By.XPATH, '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[1]/input')))
        sssn1 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[1]/input')
        sssn1.click()
        sssn1.send_keys(self.ssn1)
        sssn2 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[2]/input')
        sssn2.click()
        sssn2.send_keys(self.ssn2)
        sssn3 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[3]/input')
        sssn3.click()
        sssn3.send_keys(self.ssn3)

        csss1 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[1]/input')
        csss1.click()
        csss1.send_keys(self.ssn1)
        csss2 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[2]/input')
        csss2.click()
        csss2.send_keys(self.ssn2)
        csss3 = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[3]/input')
        csss3.click()
        csss3.send_keys(self.ssn3)

        lsname = self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[3]/input')
        lsname.click()
        lsname.send_keys(self.lname)
        self.driver.find_element_by_xpath(
            '/html/body/div[1]/div[2]/form/div/div/section[2]/div/button').click()
        WebDriverWait(self.driver, 5).until(EC.url_changes('https://service.transunion.com/dss/loginHelp1_form.page?'))

        if self.driver.current_url == 'https://service.transunion.com/dss/incorrectInformation.page':
            self.create_account()
        else:
            WebDriverWait(self.driver, 2).until(EC.presence_of_element_located((By.XPATH, '//*[@id="question"]')))
            vquestion = self.driver.find_element_by_xpath(
                '//*[@id="question"]').get_attribute('value')
            ans = self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[2]/input')
            if 'car' in vquestion:
                ans.click()
                ans.send_keys('TOYOTA')
            elif 'city' in vquestion:
                ans.click()
                ans.send_keys('YEREVAN')
            monthh = self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[1]/input')
            monthh.click()
            monthh.send_keys(self.dobmonth)
            dayy = self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[2]/input')
            dayy.click()
            dayy.send_keys(self.dobday)
            yearr = self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[3]/input')
            yearr.click()
            yearr.send_keys(self.dobyear)

            self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[3]/form/div/div/section[2]/div/button').click()
            WebDriverWait(self.driver, 2).until(EC.url_changes('https://service.transunion.com/dss/loginHelp2_form.page'))
            print("Next step")
            # step 3
            soup = BeautifulSoup(self.driver.page_source, 'html.parser')
            sys.exit()
            if 'We are sorry, but we are unable to fulfill your request at this time.' in soup.text.strip():
                number = soup.text.strip().split(
                    'Access Support team at')[1].split(',')[0]
                print(number)
                response = {
                    'status': 'We are sorry, but we are unable to fulfill your request at this time.',
                    'code': status.HTTP_409_CONFLICT,
                    'message': 'Please Contact at ~ ' + number,
                }
                print(response)
            else:
                vpass = self.driver.find_element_by_name('tl.password')
                vpass.click()
                vpass.send_keys(self.password)
                vcpass = self.driver.find_element_by_name('tl.password2')
                vcpass.click()
                vcpass.send_keys(self.password)
                vuser = self.driver.find_element_by_xpath(
                    '//*[@id="username"]').get_attribute('value')
                self.username = vuser
              # all_script = soup.find('div', attrs={'id': 'c1547224005442'}).find(
              #     'script').text.strip()
              # import pprint
              # pprint.pprint(all_script)
                time.sleep(5)
                try:
                    driver.find_element_by_class_name(
                        'form').find_element_by_tag_name('button').click()
                except:
                    raise "Something went wrong on recover account"

                time.sleep(10)
                # cpage = 'https://service.transunion.com/dss/ivFailed_error.page'
                # error = driver.find_element_by_class_name('message').text
                # if 'Unable to Verify Identity' in error:
                soup = BeautifulSoup(driver.page_source, u'html.parser')
                # print(soup.text)
                if 'Online dispute currently' in soup.text.strip():
                    nm = driver.find_element_by_class_name('section-content').text
                    num = str(nm).split('Access Support team at')[1].split('.')[0]
                    response = {
                        'status': 'error',
                        'code': status.HTTP_401_UNAUTHORIZED,
                        'message': 'Unable to Verify Identity',
                        'Please Contact on this number': num,
                    }
                    print(response)
                elif driver.current_url == 'https://service.transunion.com/dss/identityVerification_form.page':
                    print('ba xi stex chei')

                    time_delay()
                    getDisputes(vuser, password, driver)


                else:
                    print('Loging in....')
                    getDisputes(vuser, password, driver)


    def create_account(self):
        driver.get('https://service.transunion.com/dss/orderStep1_form.page')
        time.sleep(10)
        soup = BeautifulSoup(driver.page_source, u'html.parser')
        secret_question = 'What was the make and model of your first car?'
        secret_answer = "TOYOTA"

        try:
            self.driver.find_element_by_name('tl.first-name').send_keys(self.fname)
            time.sleep(2)
        except:
            pass

        # ----------
        try:
            driver.find_element_by_name('tl.last-name').send_keys(self.lname)
            time.sleep(2)
        except:
            pass

        # ------------------

        try:

            driver.find_element_by_name('tl.curr-street').send_keys(self.address)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('tl.curr-city').send_keys(self.city)
            time.sleep(2)
        except:
            pass

        try:
            select_box = self.driver.find_element_by_name('tl.curr-state')
            select_box.click()
            time.sleep(2)

            for option in select_box.find_elements_by_tag_name('option'):
                if option.get_attribute("value") == self.state:
                    option.click()  # select() in earlier versions of webdriver
                    break
                    time.sleep(5)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.curr-zip-code').send_keys(self.zipcode)
            time.sleep(2)
        except:
            pass

        try:
            if self.lived_status == True:
                self.driver.find_element_by_id('residency-yes').click()
                time.sleep(2)
            else:
                self.driver.find_element_by_id('residency-no').click()
                time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.phone-number').send_keys(self.mobile)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.email-address').send_keys(self.email)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('dobMonth').send_keys(self.dobmonth)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('dobDay').send_keys(self.dobday)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('dobYear').send_keys(self.dobyear)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name(
                'tl.last-4-ssn').send_keys(self.last4sscnumber)
            time.sleep(1)
        except:
            pass

        try:
            if self.tips_enable == True:
                self.driver.find_element_by_id('email-opt-in-yes').click()
                time.sleep(1)
            else:
                self.driver.find_element_by_id('email-opt-in-no').click()
                time.sleep(1)
        except:
            pass

        try:
            self.driver.find_element_by_xpath(
                '//*[@id="order-form"]/button').click()
            time.sleep(5)
        except:
            pass

        # Step2 Started

        try:
            self.driver.find_element_by_name('tl.username').send_keys(self.username)
            time.sleep(1)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.password').send_keys(self.password)
            time.sleep(3)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.password2').send_keys(self.password)
            time.sleep(3)
        except:
            pass

        try:
            select_box = self.driver.find_element_by_name('tl.secret-question')
            self.driver.find_element_by_name('tl.secret-question').click()
            time.sleep(1)
            for option in select_box.find_elements_by_tag_name('option'):
                if option.get_attribute("value") == secret_question:
                    option.click()  # select() in earlier versions of webdriver
                    break
                    time.sleep(5)
            try:
                driver.find_element_by_name(
                    'tl.secret-answer').send_keys(self.secret_answer)
                time.sleep(3)
            except:
                pass
        except:
            pass

        # This is Continue Button
        try:
            self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div/button').click()
            time.sleep(3)
        except:
            pass
        # ---------------------------------------------------------------------------------------------------------------------------------------------------------
        print('Waiting For Continue Button You Have 50 Seconds To Click On Continue and fill Questions')

        time_delay()


        errorlink = str(self.driver.current_url)

        if 'error.page'in errorlink:
            print('Error Occured in Transunion Normal Registration')
            fill_formfields(driver)
        else:
            print('Going To Get Dispute After Transunion Register 1')
            getDisputes(username, password, driver)

transunion = transunionDispute(sys.argv)
print(transunion.call())
