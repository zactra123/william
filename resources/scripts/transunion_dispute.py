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
        self.dob = arguments[10]
        dob = str(self.dob).split('/')
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
            executable_path='/home/collab015/Documents/bcf/final_version/geckodriver', options=options)
            # executable_path=os.environ['GECKO_DRIVER_PATH'], options=options)


        # json_directory = '../storage/reports/' + self.db_id + '/transunion_dispute'
        json_directory = 'reports/' + self.db_id + '/transunion_dispute'
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
            if 'Account Security: Your account has been temporarily suspended.' in msg:
                self.unlock_account()
                return {
                    'status': 'success',
                    'message': 'Your request to unlock your account has been submitted.',
                }
            if 'Username or Password Incorrect' in msg:
                self.recover_account()

            msg = self.getDisputes()
            print(msg)
            if msg == 're_login':
                msg = self.login()
                msg = self.getDisputes()

            return {
                'status': 'success',
                'username': self.username,
                'password': self.password,
                'data_path': self.filepath_report
            }
        except:
            return {
                'status': 'error',
                'error': sys.exc_info(),
                'report_filepath': self.filepath_report
            }

    def login(self):
        try:
            if not 'https://service.transunion.com/dss/login.page' in self.driver.current_url:
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
            soup = BeautifulSoup(self.driver.page_source, u'html.parser')
            msg = soup.find('div', attrs={'class': 'message'})
            if msg:
                return msg.text.strip()
            else:
                return 'success'
        except:
            msg = sys.exc_info()
            return msg

    def unlock_account(self):
        href = self.driver.find_element_by_xpath('/html/body/div[1]/div[2]/div/div/section[2]/div[2]/ul/li/a').get_attribute("href")

        self.driver.get(href)
        time.sleep(5)
        self.driver.find_element_by_class_name('SingleAnswer').click()
        time.sleep(1)
        self.driver.find_element_by_class_name('NextButton').click()
        time.sleep(2)

        try: 
            first_name = self.driver.find_element_by_xpath('//*[@id="QR~QID6"]')
            first_name.click()
            first_name.send_keys(self.fname)
        except:
            pass

        try: 
            last_name = self.driver.find_element_by_xpath('//*[@id="QR~QID7"]')
            last_name.click()
            last_name.send_keys(self.lname)
        except:
            pass

        try: 
            last_4 = self.driver.find_element_by_xpath('//*[@id="QR~QID12"]')
            last_4.click()
            last_4.send_keys(self.last4sscnumber)
        except:
            pass

        try: 
            dob = self.driver.find_element_by_xpath('//*[@id="QR~QID16"]')
            dob.click()
            dob.send_keys(self.dob)
        except:
            pass

        try: 
            email = self.driver.find_element_by_xpath('//*[@id="QR~QID8"]')
            email.click()
            email.send_keys(self.email)
        except:
            pass

        try: 
            zip_number = self.driver.find_element_by_xpath('//*[@id="QR~QID9"]')
            zip_number.click()
            zip_number.send_keys(self.zipcode)
        except:
            pass

        try: 
            phone = self.driver.find_element_by_xpath('//*[@id="QR~QID10"]')
            phone.click()
            phone.send_keys(self.mobile)
        except:
            pass
        time.sleep(1)       
        self.driver.find_element_by_class_name('NextButton').click()


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
            # step 3
            soup = BeautifulSoup(self.driver.page_source, 'html.parser')

            if 'We are sorry, but we are unable to fulfill your request at this time.' in soup.text.strip():
                number = soup.text.strip().split(
                    'Access Support team at')[1].split(',')[0]
                raise {
                    'status': 'We are sorry, but we are unable to fulfill your request at this time.',
                    'code': status.HTTP_409_CONFLICT,
                    'message': 'Please Contact at ~ ' + number,
                    'number': number,
                }
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

                time.sleep(1)
                try:
                    self.driver.find_element_by_class_name(
                        'form').find_element_by_tag_name('button').click()
                except:
                    raise "Something went wrong on recover account"

                time.sleep(10)
                # cpage = 'https://service.transunion.com/dss/ivFailed_error.page'
                # error = driver.find_element_by_class_name('message').text
                # if 'Unable to Verify Identity' in error:
                soup = BeautifulSoup(self.driver.page_source, u'html.parser')
                # print(soup.text)
                if 'Online dispute currently' in soup.text.strip():
                    nm = self.driver.find_element_by_class_name('section-content').text
                    num = str(nm).split('Access Support team at')[1].split('.')[0]
                    raise {
                        'status': 'error',
                        'code': status.HTTP_401_UNAUTHORIZED,
                        'message': 'Unable to Verify Identity',
                        'Please Contact on this number': num,
                    }
                elif self.driver.current_url == 'https://service.transunion.com/dss/identityVerification_form.page':
                    self.time_delay()

    def time_delay(self):
        if self.driver.current_url == 'https://service.transunion.com/dss/identityVerification_form.page':
            time.sleep(5)
            print('time + 5seconde')
            self.time_delay()
        else: return True

    def create_account(self):
        self.driver.get('https://service.transunion.com/dss/orderStep1_form.page')
        time.sleep(10)
        soup = BeautifulSoup(self.driver.page_source, u'html.parser')
        secret_question = 'What was the make and model of your first car?'
        secret_answer = "TOYOTA"

        try:
            self.driver.find_element_by_name('tl.first-name').send_keys(self.fname)
            time.sleep(2)
        except:
            pass

        # ----------
        try:
            self.driver.find_element_by_name('tl.last-name').send_keys(self.lname)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.curr-street').send_keys(self.address)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('tl.curr-city').send_keys(self.city)
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
                self.driver.find_element_by_name(
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
        self.time_delay()


        errorlink = str(self.driver.current_url)

        if 'error.page'in errorlink:
            self.fill_formfields()

    def fill_formfields(self):
        self.driver.get(
            'https://dispute.transunion.com/dp/dispute/order.jsp?package=DisputeDisclosureXML')

        secret_question = 'What was the make and model of your first car?'
        secret_answer = "TOYOTA"

        try:
            self.driver.find_element_by_name('firstName').send_keys(self.fname)
            time.sleep(2)
        except:
            pass

        # ----------
        try:
            self.driver.find_element_by_name('lastName').send_keys(self.lname)
            time.sleep(2)
        except:
            pass

        # ----------------------------------------------------------------------------------------------

        try:
            self.driver.find_element_by_name(
                'mailAddress').send_keys(self.address)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('mailCity').send_keys(self.city)
            time.sleep(2)
        except:
            pass

        try:
            select_box = self.driver.find_element_by_name(
                'mailState').send_keys(self.state)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name(
                'mailZipCode').send_keys(self.zipcode)
            time.sleep(2)
            driver.find_element_by_name('name').click()
            time.sleep(8)
        except:
            pass

        # # Step2 Started---------------------------------------------------------------------------------------------------------------------------------------

        try:
            self.driver.find_element_by_name('username').send_keys(self.username)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name(
                'password').send_keys(self.password)
            time.sleep(3)
        except:
            pass

        try:
            self.driver.find_element_by_name(
                'confirmPassword').send_keys(self.password)
            time.sleep(3)
        except:
            pass

        try:
            select_boxs = self.driver.find_element_by_name(
                'secretQuestion').click()
            time.sleep(5)

            # select_box = driver.find_element_by_name('secretQuestion')
            # print(select_box)
            options = self.driver.find_elements_by_tag_name('option')
            # print(options)
            # driver.find_element_by_name('secretQuestion').click()
            # time.sleep(1)
            for option in options:
                # print(option.get_attribute("value"))
                if option.get_attribute("value") == '3':
                    option.click()  # select() in earlier versions of webdriver
                    break
                    time.sleep(5)
            try:
                self.driver.find_element_by_name(
                    'secretAnswer').send_keys(self.secret_answer)
                time.sleep(3)
            except:
                pass
        except:
            pass

        try:
            self.driver.find_element_by_name('email').send_keys(self.email)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name(
                'confirmEmail').send_keys(self.email)
            time.sleep(2)
        except:
            pass

        try:
            dates = str(dobmonth)+'/'+str(dobday)+'/'+str(dobyear)
            self.driver.find_element_by_name('yearDOB').send_keys(self.dates)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSN1').send_keys(self.ssn1)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSN2').send_keys(self.ssn2)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSN3').send_keys(self.ssn3)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSNC1').send_keys(self.ssn1)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSNC2').send_keys(self.ssn2)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('SSNC3').send_keys(self.ssn3)
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_id('checkbox').click()
            time.sleep(2)
        except:
            pass

        try:
            self.driver.find_element_by_name('agreeCB1').click()
            time.sleep(2)
        except:
            pass

        # This is Continue Button
        try:
            self.driver.find_element_by_id('continueButton').click()
            time.sleep(20)
        except:
            pass

        soup = BeautifulSoup(self.driver.page_source, u'html.parser')
        # print(soup.text)
        if 'You Already Have an Account' in soup.text:
            self.login()

        if 'We are unable to confirm your identity' in soup.text.strip():
            message = soup.text.split('What to do ')[1]
            raise {
                'status': 'error',
                'code': status.HTTP_401_UNAUTHORIZED,
                'message': 'Unable to Verify Identity '+str(message),
            }

        elif 'account has been temporarily suspended' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_403_FORBIDDEN,
                'message': 'Your account has been temporarily suspended',
            }

        # We are unable to complete your request

        elif 'We are experiencing technical difficulties.' in soup.text.strip():
            message = 'We appreciate your patience while we resolve this issue. Please try again later or contact us at (833)-395-6940.'
            raise {
                'status': 'error',
                'code': status.HTTP_401_UNAUTHORIZED,
                'message': 'We are experiencing technical difficulties. '+str(message),
            }

        elif 'Online dispute currently' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_404_NOT_FOUND,
                'message': 'Online dispute currently not available',
            }
        elif 'We are unable to complete your request' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_404_NOT_FOUND,
                'message': 'We are unable to complete your request',
            }

        else:
            self.login()


    def getDisputes(self):
        acc_arr = []
        acc_dict = {}
        finlarr = []
        self.click_to_continue()
        if self.driver.current_url != 'https://service.transunion.com/dss/dispute.page?':
            self.driver.get('https://service.transunion.com/dss/dispute.page?')
        time.sleep(10)
        soup = BeautifulSoup(self.driver.page_source, u'html.parser')

        try:
            # check_status = soup.find('tbody', attrs={'id': "activeDispute"})
            datesubest = soup.find('tbody', attrs={'id': "activeDispute"})
            ac_dispute = datesubest.findAll('tr')
            
            mn_datesubest = soup.find('tbody', attrs={'id': "manualDisputes"})
            mn_dispute = mn_datesubest.findAll('tr')

            past_datesubest = soup.find('tbody', attrs={'id': "pastDisputes"})
            past_dispute = past_datesubest.findAll('tr')

            final_arr = []
            dates_arr = []
            mn_dates_arr = []
            past_dates_arr = []

            for a in ac_dispute:
                try:
                    dates = a.text.strip()
                except:
                    dates = 'None'
                dates_arr.append(dates)

            for a in mn_dispute:
                try:
                    dates = a.text.strip()
                except:
                    dates = 'None'
                mn_dates_arr.append(dates)


            for a in past_dispute:
                try:
                    dates = a.text.strip()
                except:
                    dates = 'None'
                past_dates_arr.append(dates)    

            new_arr = dates_arr[0].split('\n')
            mn_new_arr = mn_dates_arr[0].split('\n')
            past_new_arr = past_dates_arr[0].split('\n')

            if (len(new_arr) >= 3):
                datesub = dates_arr[0].split('\n')[0].strip()
                datec = dates_arr[0].split('\n')[1].strip()
                state = dates_arr[0].split('\n')[2].strip()
                final_arr.append(
                    {'Date_Submitted': datesub, 'Estimated_Completion': datec, 'Status': state})

            if (len(mn_new_arr) >= 3):
                mn_datesub = mn_dates_arr[0].split('\n')[0].strip()
                mn_datec = mn_dates_arr[0].split('\n')[1].strip()
                mn_state = mn_dates_arr[0].split('\n')[2].strip()
                final_arr.append(
                    {'Date_Submitted': mn_datesub, 'Estimated_Completion': mn_datec, 'Status': mn_state})

            if (len(past_new_arr) >= 3):

                past_datesub = past_dates_arr[0].split('\n')[0].strip()
                past_datec = past_dates_arr[0].split('\n')[1].strip()

                if len(past_new_arr) == 4:
                    past_state = past_dates_arr[0].split('\n')[2].strip()
                    if "" == past_state:
                        past_state = past_dates_arr[0].split('\n')[3].strip()

                if past_state == "View Dispute Results":

                    time.sleep(5)

                    self.driver.find_element_by_xpath('/html/body/div[1]/div[3]/form/div/div/section[5]/table/tbody/tr/td[3]/a').click()
                    time.sleep(25)

                    if self.driver.current_url != "https://service.transunion.com/dss/disputeResults.page":
                        time.sleep(20)
                    past = {}
                    try: 
                        fin = self.driver.find_element_by_class_name("fin")
                        past["fin"] = fin.text.strip() 
                    except:
                        pass

                    try:
                        fcell = self.driver.find_element_by_class_name("fcell")
                        past["fcell"] = fcell.text.strip()
                    except:
                        pass

                    self.driver.get("https://service.transunion.com/dss/dispute.page?")
                    time.sleep(10)
                    final_arr.append(
                        {'Date_Submitted': past_datesub, 'Estimated_Completion': past_datec, 'Status': past})              
                else:
                    final_arr.append(
                        {'Date_Submitted': past_datesub, 'Estimated_Completion': past_datec, 'Status': past_state})    
                          


            if final_arr:
                with open(self.filepath_report, "a+") as f:
                    jsondata = json.dumps(final_arr, indent=4)
                    f.write(jsondata)
                    f.close()
        except:
            pass

        if 'Online dispute currently' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_404_NOT_FOUND,
                'message': 'Online dispute currently not available',
            }
        elif 'account has been temporarily suspended' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_403_FORBIDDEN,
                'message': 'Your account has been temporarily suspended',
            }

        elif 'Unable to Verify' in soup.text.strip():
            raise {
                'status': 'error',
                'code': status.HTTP_401_UNAUTHORIZED,
                'message': 'Unable to Verify Identity',
            }
        else:
            try:
                start_dispute = self.driver.find_element_by_xpath(
                    '//*[@id="startDispute"]/a')
                start_dispute_text = start_dispute.text
                start_dispute.click()
                time.sleep(2)
                if 'PLEASE LOG OFF THEN LOG BACK IN TO START A NEW DISPUTE.' in start_dispute_text:
                    return "re_login"
                time.sleep(10)
            except:
                pass

            try:
                self.driver.find_element_by_xpath(
                    '//*[@id="disputeRefresh"]/label').click()
            except:
                try:
                    self.driver.find_element_by_xpath(
                        '/html/body/div[1]/div[2]/form/div[2]/div/section/p[2]/label').click()
                except:
                    sys.exit()
            time.sleep(1)

            try:
                self.driver.find_element_by_id(
                    'confirmRefreshButton-startDispute').click()
            except:
                self.driver.find_element_by_id('Continue').click()
            WebDriverWait(self.driver, 20).until(EC.url_to_be('https://service.transunion.com/dss/disputeCategories.page'))


            soup = BeautifulSoup(self.driver.page_source, u'html.parser')

            try:
                self.driver.find_element_by_id('expand-all').click()
                time.sleep(5)
            except:
                pass

            # for i in range(50):
            #     try:
            #         driver.find_element_by_id('trade-' + str(i)).click()
            #         time.sleep(2)
            #         ele = soup.find('td', attrs={'id': 'trade-'+str(i)})
            #     except:
            #         continue

                # Element Public Records

            # for i in range(50):
            #     try:
            #         driver.find_element_by_id('publicRecord-' + str(i)).click()
            #         time.sleep(2)
            #     except:
            #         continue

            # #  tHIS IS For Collections
            # for i in range(50):
            #     try:
            #         driver.find_element_by_id('collection-' + str(i)).click()
            #         time.sleep(2)
            #     except:
            #         continue

            # # Satisfactory Accounts
            # for i in range(50):
            #     try:
            #         driver.find_element_by_id('collection-' + str(i)).click()
            #         time.sleep(2)
            #     except:
            #         continue

            try:
                cons_statement = soup.find('section', attrs={
                    'id': 'simple-cons-statement'}).text.replace('\n', ' ').strip()
            except:
                cons_statement = 'none'

            try:
                public_records = soup.find('section', attrs={
                    'id': 'simple-public-records'}).text.replace('\n', ' ').strip()
            except:
                public_records = 'none'

            try:
                inquiries = soup.find(
                    'section', attrs={'id': 'simple-inquiries'}).text.replace('\n', ' ').strip()
            except:
                inquiries = 'none'

            other_dict = {'cons_statement': cons_statement,
                          'public_records': public_records, 'inquiries': inquiries}
            finlarr.append(other_dict)

            all_scripts = soup.find('script', attrs={'id': 'UserData'})
            all_scripts = str(all_scripts).split(' var ud = ')[1].split(
                '</script>')[0].strip().replace('/n', '')
            all_scripts = all_scripts.replace('/', '').strip()

            jsondata = json.loads(all_scripts)

            with open(self.filepath_report, "a+") as f:
                sorted = json.dumps(jsondata, indent=4)
                f.write(sorted)
                f.close() 
            return 'success'

    def click_to_continue(self):

        # /html/body/div[1]/div[2]/form/div/div/div/div/div/div/div/button
        try:
            button = self.driver.find_element_by_xpath(
                '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div/button')
        except:
            try:
                button = self.driver.find_element_by_xpath('/html/body/div[1]/div[2]/form/div/div/div/div/div/div/div/button')
            except:
                time.sleep(2)
                self.click_to_continue()
        button.click()

transunion = transunionDispute(sys.argv)
print(transunion.call())
