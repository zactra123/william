import json
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
from selenium import webdriver
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.proxy import Proxy, ProxyType
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import requests
from requests.auth import HTTPBasicAuth
import re
from PIL import Image
from fpdf import FPDF


import os
from os import path
import datetime


class experianViewReport():
    def __init__(self, arguments):
        self.email = arguments[1]
        self.ssn = arguments[2]
        ssn_arr = (self.ssn).split('-')
        self.ssn1 = ssn_arr[0]
        self.ssn2 = ssn_arr[1]
        self.ssn3 = ssn_arr[2]
        self.report_numbers = arguments[3].split(',')
        self.rn_status = {}
        self.db_id = arguments[4]
        PROXY = '64.71.145.122:3128'

        webdriver.DesiredCapabilities.FIREFOX['proxy'] = {
            "httpProxy": PROXY,
            "ftpProxy": PROXY,
            "sslProxy": PROXY,
            "proxyType": "MANUAL",
        }

        options = webdriver.FirefoxOptions()
        options.add_argument('--disable-gpu')
        user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36'
        options.set_preference("general.useragent.override", user_agent)
        options.add_argument('--headless')
        # options.add_argument('print.always_print_silent')
        # fp = webdriver.FirefoxProfile()
        # # 0 means to download to the desktop, 1 means to download to the default "Downloads" directory, 2 means to use the directory
        # fp.set_preference("browser.download.folderList", 1)
        # fp.set_preference("browser.helperApps.alwaysAsk.force", False)
        # fp.set_preference("print.always_print_silent", True)
        # fp.set_preference("Save as PDF", True)
        # fp.set_preference("print save as pdf", True)
        # fp.set_preference("browser.download.manager.showWhenStarting", False)


        self.driver = webdriver.Firefox(
            executable_path=os.environ['GECKO_DRIVER_PATH'], options=options)


        self.json_directory = '../storage/reports/' + self.db_id + '/experian_view_report'
        # create directory if not exist
        if not os.path.exists(self.json_directory):
            os.makedirs(self.json_directory)
        self.filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S')
        self.filepath_report = self.json_directory +'/report_data_'+self.filename + '.json'


    def call(self):
        try:
            self.login()
            self.get_report()
            self.print_pdf()

            return {
                'status': 'success',
                'report_numbers': self.rn_status,
                'report_filepath': self.filepath_report,
            }
        except Exception as e:
            return {
                'status': 'error',
                'report_numbers': self.rn_status,
                'error': e[0],
                'report_filepath': self.filepath_report
            }

    def login(self):
        for rn in self.report_numbers:
            try:
                self.driver.get('https://www.experian.com/ncaconline/dispute')
                WebDriverWait(self.driver, 5).until(EC.presence_of_element_located((By.ID, 'reg-capid-rn-txt-reportNumber')))
                report_numberxpath = self.driver.find_element_by_id('reg-capid-rn-txt-reportNumber')
                report_numberxpath.send_keys(str(rn))
                time.sleep(1)
                ssnxpath1 = self.driver.find_element_by_id('reg-capid-rn-txt-ssn1')
                ssnxpath1.send_keys(self.ssn1)
                time.sleep(1)
                ssnxpath2 = self.driver.find_element_by_id('reg-capid-rn-txt-ssn2')
                ssnxpath2.send_keys(self.ssn2)
                time.sleep(1)
                ssnxpath3 = self.driver.find_element_by_id('reg-capid-rn-txt-ssn3')
                ssnxpath3.send_keys(self.ssn3)
                time.sleep(1)

                try:
                    self.driver.find_element_by_name('reg-capid-rn-txt-ssn-option').click()
                    time.sleep(3)
                except:
                    pass

                emailxpath = self.driver.find_element_by_id('reg-capid-rn-txt-emailAddress')
                emailxpath.send_keys(self.email)
                time.sleep(1)
                conemailxpath = self.driver.find_element_by_id('reg-capid-rn-txt-emailAddressConfirm')
                conemailxpath.send_keys(self.email)
                time.sleep(1)
                # agree checkbox
                self.driver.find_element_by_id('reg-capid-rn-chk-agreeTermsConditions').click()
                time.sleep(1)
                #  submit form
                self.driver.find_element_by_id('reg-capid-rn-btn-submit').click()
                time.sleep(15)
                try:
                    ressoup = BeautifulSoup(self.driver.page_source, u'html.parser')
                    title = ressoup.find('div', attrs={'id': 'section-titles'}).text.strip()
                    if not 'Your credit report' in title:
                        raise("Report number not logged in")
                except:
                    raise("Report number not logged in")
                self.rn_status[rn] = 'success'
                return "success"

            except:
                self.rn_status[rn] = sys.exc_info()

    def get_report(self):
        self.driver.execute_script("$('#expand-submit').click()")
        # self.click_to_expand()
        soup = BeautifulSoup(self.driver.page_source, u'html.parser')
        personal_block = []
        address_block = []
        other_personal_block = []
        negative_block = []
        accounts_block = []
        credit_inquiry_block = []
        bankruptcy_block = []
        try:
            block1 = soup.find('div', attrs={'id': 'report-group-names'}).find_all('div', attrs={'class': 'report-entry'})

            # print(block1)
            for i in block1:
                try:
                    try:
                        name = i.find('div', attrs={'class': 'val name'}).text.strip()
                    except:
                        name = 'none'

                    try:
                        identity = i.find("div", attrs={'class': 'val name-id'}).text.strip()
                    except:
                        identity = 'none'
                except:
                    pass

                personal_block.append(
                    {"name": name, "name_identification_number": identity})
        except:
            pass
        # print("personal_block",personal_block)
        try:
            block2 = soup.find('div', attrs={
                               'id': 'report-group-addresses'}).find_all('div', attrs={'class': "report-entry"})
            # print('Block2',block2)
            for i in block2:
                try:
                    try:
                        address = i.find('div', attrs={'class': "val address"}).text.strip()
                    except:
                        address = 'none'

                    try:
                        address_identity = i.find("div", attrs={'class': 'val address-id'}).text.strip()
                    except:
                        address_identity = 'none'

                    try:
                        residence_type = i.find(
                            "div", attrs={"class": "val residence-type"}).text.strip()
                    except:
                        residence_type = 'none'

                    try:
                        geographical_code = i.find(
                            "div", attrs={"class": "val geo-code"}).text.strip()
                    except:
                        geographical_code = 'none'

                    address_block.append({"address": address, "address_identification_number": address_identity,
                                          "residence_type": residence_type, "geographical_code": geographical_code})
                except:
                    pass
        except:
            pass
        # print("address_block", address_block)

        try:
            yob = soup.find('div', attrs={'class': 'val yob'}).text.strip()
        except:
            yob = 'none'

        try:
            spouse = soup.find(
                'div', attrs={'class': 'val coapplicant'}).text.strip()
        except:
            spouse = 'none'

        try:
            ssn_val = soup.find(
                'div', attrs={'class': 'val ssn'}).text.strip()
        except:
            ssn_val = 'none'

        other_personal_block.append(
            {"year of birth": yob, "spouse_coapplicant": spouse, "ssn_variation": ssn_val})
        # print("other_info",other_personal_block)
        try:
            block3 = soup.find('div', attrs={'id': 'report-group-phones'}).find_all('div', attrs={'class': 'report-entry'})
            for i in block3:
                try:
                    try:
                        telephone = i.find('div', attrs={'class': 'val telephone'}).text.strip()
                    except:
                        telephone = 'none'

                    try:
                        telephone_type = i.find("div", attrs={'class': 'val tele-type'}).text.strip()
                    except:
                        telephone_type = 'none'

                    # print("telephone", telephone, telephone_type)

                    other_personal_block.append(
                        {"telephone_number": telephone, "telephone_type": telephone_type})
                except:
                    pass
        except:
            pass
        try:
            block4 = soup.find('div', attrs={'id': 'report-group-employer'}).find_all('div', attrs={'class': 'report-entry'})

            for i in block4:
                try:
                    try:
                        employer = i.find('div', attrs={'class': "val employer"}).text.strip()
                    except:
                        employer = 'none'

                    try:
                        address = i.find("div", attrs={'class': 'val address'}).text.strip()
                    except:
                        address = 'none'

                    # print("employer", employer, address)

                    other_personal_block.append(
                        {"employer": employer, "address": address})
                except:
                    pass
        except:
            pass

        block5 = soup.find_all('div', attrs={'class': 'val fraudnotice'})
        for i in block5:
            try:
                try:
                    notice = i.text.strip()
                except:
                    notice = 'none'

                other_personal_block.append({"notice": notice})
            except:
                pass

        personal_statement =[]
        try:
            personal_statements = soup.find('div', attrs={'id': 'report-group-personal-statements'}).find_all("div", attrs={"class": "report-entry"})

            for ps in personal_statements:
                try:
                    personal_statement.append({"statement": ps.find('div', attrs={'class': 'val statement'}).text.strip()})
                except:
                    pass
        except:
            pass

        # STarted Bankrupcyyyy

        try:
            item_name = item_number = claim_amount = date_filled = val_status = address = ad_iden = libality_block = date_resolved = on_record_until = responsibility_b = reinvestigation = address6 = 'none'
            block_crupcy = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all(
                    "div", attrs={"class": "bankruptcy"})

            for i in block_crupcy:
                try:
                    item_name = i.find("div", attrs={"class": "val item-name"}).text.strip()
                except:
                    continue
                try:
                    item_number = i.find(
                        'div', attrs={'class': 'val id-number'}).text.strip()
                except:
                    item_number = 'none'
                # print('Itemno-->',item_number)
                try:
                    claim_amount = i.find(
                        'div', attrs={'class': 'val claim-amount'}).text.strip()
                except:
                    claim_amount = 'none'

                try:
                    in_dispunte = ('in-dispute' in i.get('class'))
                except:
                    in_dispunte = False

                try:
                    date_filled = i.find(
                        'div', attrs={'class': 'val date-filed'}).text.strip()
                except:
                    date_filled = 'none'

                try:
                    val_status = i.find(
                        'div', attrs={'class': 'val status'}).text.strip()
                except:
                    val_status = 'none'

                    # print(bankcrpcy_blockaddress)
                try:
                    address_name = i.find(
                        'div', attrs={'class': 'val address'}).text.strip()
                    # print(address6)
                    add_city = i.find(
                        'span', attrs={'class': 'val city'}).text.strip()

                    add_state = i.find(
                        'span', attrs={'class': 'val state'}).text.strip()

                    add_zip = i.find(
                        'span', attrs={'class': 'val zip'}).text.strip()

                    add_id = i.find(
                        'div', attrs={'class': 'val address-id'}).text.strip()

                    add_phone = i.find(
                        'div', attrs={'class': 'val phone'}).text.strip()

                    address = {
                        'address': address_name,
                        'city': add_city,
                        'state': add_state,
                        'zip': add_zip,
                        'identification_number': add_id,
                        'phone': add_phone,
                    }

                except:
                    address = {}


                try:
                    liability = i.find(
                        'div', attrs={'class': 'val liability-amount'}).text.strip()
                except:
                    liability = 'none'

                try:
                    onrecord_until = i.find(
                        'div', attrs={'class': 'val on-record-until'}).text.strip()
                except:
                    onrecord_until = 'none'

                try:
                   date_resolved = i.find(
                        'div', attrs={'class': 'val date-resolved'}).text.strip()
                except:
                    date_resolved = 'none'

                try:
                   reinvestigation = i.find(
                        'div', attrs={'class': 'val reinvestigation'}).text.strip()
                except:
                    reinvestigation = 'none'

                try:
                    responsibility_b = i.find(
                        'div', attrs={'class': 'val responsibility'}).text.strip()
                except:
                    responsibility_b = 'none'

                bankruptcy_block.append({
                    "item_name": item_name,
                    "item_number": item_number,
                    "claim_amount": claim_amount,
                    "under_dispunte": in_dispunte,
                    "date_filled": date_filled,
                    "value_status": val_status,
                    'address': address,
                    'liability': liability,
                    'date_resolved': date_resolved,
                    'onrecord_until': onrecord_until,
                    'reinvestigation': reinvestigation,
                    'responsibility': responsibility_b
                })

        except:
            pass

        #  Start Of Negative------------------------------------------------------------------------------------

        try:
            block6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all(
                "div", attrs={"class": "report-entry"})
            for i in block6:
                # not needed if account name not present
                try:
                    acc_name = i.find(attrs={"class": "val account-name"}).text.strip()
                except:
                    continue
                try:
                    acc_no = i.find(
                        'div', attrs={'class': 'val account-number'}).text.strip()
                except:
                    acc_no = 'none'

                try:
                    in_dispunte = ('in-dispute' in i.get('class'))
                except:
                    in_dispunte = False

                try:
                    recent_bal = i.find(
                        'div', attrs={'class': 'val recent-balance'}).text.strip()
                except:
                    recent_bal = 'none'

                try:
                    date_opened = i.find(
                        'div', attrs={'class': 'val date-opened'}).text.strip()
                except:
                    date_opened = 'none'

                try:
                    responsible_names = i.find(
                        'div', attrs={'class': 'val responsibleNames'}).text.strip()
                except:
                    responsible_names = 'none'

                try:
                    val_status = i.find(
                        'div', attrs={'class': 'val status'}).text.strip()
                except:
                    val_status = 'none'

                try:
                    address6 = i.find(
                        'div', attrs={'class': 'val address'}).text.strip()
                    # print(address6)
                    add_city = i.find(
                        'span', attrs={'class': 'val city'}).text.strip()

                    add_state = i.find(
                        'span', attrs={'class': 'val state'}).text.strip()
                    add_zip = i.find(
                        'span', attrs={'class': 'val zip'}).text.strip()

                    # print(address6)
                except:
                    address6 = 'none'
                    add_city = 'none'
                    add_state = 'none'
                    add_zip = 'none'

                try:
                    ad_iden = i.find(
                        'div', attrs={'class': 'val address-id'}).text.strip()
                except:
                    ad_iden = 'none'
                try:
                    ad_phone = i.find(
                        'div', attrs={'class': 'val phone'}).text.strip()
                except:
                    ad_phone = 'none'


                try:
                    types = i.find(
                        'div', attrs={'class': 'val type'}).text.strip()
                except:
                    types = 'none'

                try:
                    terms = i.find(
                        'div', attrs={'class': 'val terms'}).text.strip()
                except:
                    terms = 'none'

                try:
                    on_record_until = i.find(
                        'div', attrs={'class': 'val on-record-until'}).text.strip()
                except:
                    on_record_until = 'none'


                try:
                    credit_limit = i.find(
                        'div', attrs={'class': 'val credit-limit'}).text.strip()
                except:
                    credit_limit = 'none'

                try:
                    high_limit = i.find(
                        'div', attrs={'class': 'val high-balance'}).text.strip()
                except:
                    high_limit = 'none'

                try:
                    month_limit = i.find(
                        'div', attrs={'class': 'val monthly-payment'}).text.strip()
                except:
                    month_limit = 'none'

                try:
                    recent_limit = i.find(
                        'div', attrs={'class': 'val recent-payment'}).text.strip()
                except:
                    recent_limit = 'none'

                try:
                    date_status = i.find(
                        'div', attrs={'class': 'val status-date'}).text.strip()
                except:
                    date_status = 'none'

                try:
                    first_reported = i.find(
                        'div', attrs={'class': 'val report-started-date'}).text.strip()
                except:
                    first_reported = 'none'

                try:
                    responsibility = i.find(
                        'div', attrs={'class': 'val responsibility'}).text.strip()
                except:
                    responsibility = 'none'


                try:
                    comment = i.find(
                        'div', attrs={'class': 'val comment'}).text.strip()
                except:
                    comment = 'none'

                try:
                    acccounts = i.find("div", attrs={"class": "acc-hist-items-container"})

                    regex = re.compile('.*col-acc-hist-item.*')
                    account = acccounts.find_all("div", attrs={"class": regex})

                    account_history = []
                    for v in account:

                        try:
                            yeraValue = v.find(
                                'div', attrs={'class': 'acc-hist-year'}).text.strip()

                            if  "" !=  yeraValue:
                                yera = yeraValue
                        except:
                            pass

                        try:
                            month = v.find(
                                'div', attrs={'class': 'acc-hist-month'}).text.strip()
                        except:
                            month = 'none'

                        try:
                            value = v.find(
                                'div', attrs={'class': 'acc-hist-value'}).text.strip()
                        except:
                            value = 'none'

                        account_history.append({
                            'year':yera,
                            'month':month,
                            'value':value

                        })


                except:
                    account_history = {}

                try:
                    payAll = i.find("div", attrs={"class": "row-payment-history"})

                    pays = []
                    if payAll:
                        pay = payAll.find_all("div", attrs={"class": "pay-hist-item"})
                        for v in pay:
                            try:
                                pay_s = v.text.strip()
                                pays.append(pay_s)

                            except:
                                pass
                except:
                    pays = []


                try:
                    balance = i.find("div", attrs={"class": "bal-hist-items-container"})
                    balanceAll = balance.find_all("div", attrs={"class": "bal-hist-item"})

                    balance_history = []
                    for v in balance:

                        try:
                            balance_history.append(v.text.strip())

                        except:
                            pass

                except:
                    balance_history = []

                try:
                    original_creditor = i.find(
                        "div", attrs={"class": "val original-creditor"}).text.strip()
                except:
                    original_creditor = 'none'

                try:
                    sold_to = i.find(
                        "div", attrs={"class": "val sold-purchased"}).text.strip()
                except:
                    sold_to = 'none'

                try:
                    mortage_id = i.find('div', attrs={
                        'class': 'val mortgageId'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    mortage_id = 'none'

                try:
                    agency_id = i.find('div', attrs={
                        'class': 'val secondaryAgencyId'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    agency_id = 'none'


                try:
                    agency_name = i.find('div', attrs={
                        'class': 'val secondaryAgencyId'}).find_previous('div').text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    agency_name = 'none'

                try:
                    purchased_from = i.find('div', attrs={
                        'class': 'val specialcomment'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    purchased_from = 'none'

                negative_block.append({
                    "account_name": acc_name,
                    "account_number": acc_no,
                    "recent_balance": recent_bal,
                    "date_opened": date_opened,
                    "under_dispunte": in_dispunte,
                    "responsible_names":responsible_names,
                    "value_status": val_status,
                    "address": address6,
                    "city": add_city,
                    "state": add_state,
                    "zip": add_zip,
                    "identity": ad_iden,
                    "phone":ad_phone,
                    "account_type": types,
                    "term": terms,
                    "on_record_until": on_record_until,
                    "credit_limit": credit_limit,
                    "high_balance": high_limit,
                    "monthly_payment": month_limit,
                    "compliance_code": comment,
                    "recent_payment": recent_limit,
                    "date_status": date_status,
                    "agency_id": agency_id,
                    "agency_name": agency_name,
                    "mortage_id": mortage_id,
                    "first_reported": first_reported,
                    "original_creditor": original_creditor,
                    "sold_to": sold_to,
                    "status_updated": status_updated,
                    "responsibility": responsibility,
                    "pay_states": pays,
                    "comment": comment,
                    "statement": comment,
                    "purchased_from": purchased_from,
                    "accounts_history": account_history,
                    "balance_history": balance_history
                })

                # negative_block.append({'address':address6,'identity':ad_iden})
        except:
            pass


        try:
            block7 = soup.find('div', attrs={'id': 'report-group-good-standing'}).findAll('div', attrs={'class': 'good-standing'})

            for i in block7:
                # not needed if account name not present
                try:
                    acc_name = i.find(
                        'div', attrs={'class': 'val account-name'}).text.strip()
                except:
                    continue
                # print(acc_name)
                try:
                    acc_no = i.find(
                        'div', attrs={'class': 'val account-number'}).text.strip()
                except:
                    acc_no = 'none'

                try:
                    recent_bal = i.find(
                        'div', attrs={'class': 'val recent-balance'}).text.strip()
                except:
                    recent_bal = 'none'

                try:
                    date_opened = i.find(
                        'div', attrs={'class': 'val date-opened'}).text.strip()
                except:
                    date_opened = 'none'

                try:
                    responsible_names = i.find(
                        'div', attrs={'class': 'val responsibleNames'}).text.strip()
                except:
                    responsible_names = 'none'

                try:
                    val_status = i.find(
                        'div', attrs={'class': 'val status'}).text.strip()
                except:
                    val_status = 'none'

                try:
                    address6 = i.find(
                        'div', attrs={'class': 'val address'}).text.strip()
                    # print(address6)
                    add_city = i.find(
                        'span', attrs={'class': 'val city'}).text.strip()

                    add_state = i.find(
                        'span', attrs={'class': 'val state'}).text.strip()
                    add_zip = i.find(
                        'span', attrs={'class': 'val zip'}).text.strip()

                    # print(address6)
                except:
                    address6 = 'none'
                    add_city = 'none'
                    add_state = 'none'
                    add_zip = 'none'

                try:
                    ad_iden = i.find(
                        'div', attrs={'class': 'val address-id'}).text.strip()
                except:
                    ad_iden = 'none'


                try:
                    ad_phone = i.find(
                        'div', attrs={'class': 'val phone'}).text.strip()
                except:
                    ad_phone = 'none'

                try:
                    types = i.find(
                        'div', attrs={'class': 'val type'}).text.strip()
                except:
                    types = 'none'

                try:
                    term = i.find(
                        'div', attrs={'class': 'val terms'}).text.strip()
                except:
                    term = 'none'

                try:
                    on_record_until = i.find(
                        'div', attrs={'class': 'val on-record-until'}).text.strip()
                except:
                    on_record_until = 'none'

                try:
                    credit_limit = i.find(
                        'div', attrs={'class': 'val credit-limit'}).text.strip()
                except:
                    credit_limit = 'none'

                try:
                    high_bal = i.find(
                        'div', attrs={'class': 'val high-balance'}).text.strip()
                except:
                    high_bal = 'none'

                try:
                    monthly_payment = i.find(
                        'div', attrs={'class': 'val monthly-payment'}).text.strip()
                except:
                    monthly_payment = 'none'

                try:
                    recent_payment = i.find(
                        'div', attrs={'class': 'val recent-payment'}).text.strip()
                except:
                    recent_payment = 'none'

                try:
                    date_of_status = i.find(
                        'div', attrs={'class': 'val status-date'}).text.strip()
                except:
                    date_of_status = 'none'

                try:
                    first_reported = i.find(
                        'div', attrs={'class': 'val report-started-date'}).text.strip()
                except:
                    first_reported = 'none'

                try:
                    responsibilty = i.find(
                        'div', attrs={'class': 'val responsibility'}).text.strip()
                except:
                    responsibilty = 'none'

                try:
                    comment = i.find(
                        'div', attrs={'class': 'val comment'}).text.strip()
                except:
                    comment = 'none'

                try:

                    acccounts = i.find("div", attrs={"class": "acc-hist-items-container"})

                    regex = re.compile('.*col-acc-hist-item.*')
                    account = acccounts.find_all("div", attrs={"class": regex})

                    account_history = []
                    for v in account:

                        try:
                            yearValue = v.find(
                                'div', attrs={'class': 'acc-hist-year'}).text.strip()

                            if  "" !=  yearValue:
                                yera = yearValue
                        except:
                            pass

                        try:
                            month = v.find(
                                'div', attrs={'class': 'acc-hist-month'}).text.strip()
                        except:
                            month = 'none'

                        try:
                            value = v.find(
                                'div', attrs={'class': 'acc-hist-value'}).text.strip()
                        except:
                            value = 'none'
                        account_history.append({
                                'year':yera,
                                'month':month,
                                'value':value
                            })


                except:
                    account_history = []

                try:
                    balance = i.find("div", attrs={"class": "bal-hist-items-container"})
                    balanceAll = balance.find_all("div", attrs={"class": "bal-hist-item"})

                    balance_history = []
                    for v in balanceAll:
                        try:
                            balance_s = v.text.strip()
                            balance_history.append(balance_s)
                        except:
                            pass
                except:
                    balance_history = []

                try:
                    original_creditor = i.find(
                        "div", attrs={"class": "val original-creditor"}).text.strip()
                except:
                    original_creditor = 'none'

                try:
                    sold_to = i.find(
                        "div", attrs={"class": "val sold-purchased"}).text.strip()
                except:
                    sold_to = 'none'


                try:
                    payAll = i.find("div", attrs={"class": "row-payment-history grid"})
                    pay = payAll.find_all("div", attrs={"class": "pay-hist-item"})

                    recent_payments = []
                    for v in pay:
                        try:
                            pay_s = v.text.strip()
                            recent_payments.appent(pay_s)

                        except:
                            pass
                except:
                    recent_payments = []

                try:
                    mortage_id = i.find('div', attrs={
                        'class': 'val mortgageId'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    mortage_id = 'none'

                try:
                    agency_id = i.find('div', attrs={
                        'class': 'val secondaryAgencyId'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    agency_id = 'none'


                try:
                    agency_name = i.find('div', attrs={
                        'class': 'val secondaryAgencyId'}).find_previous('div').text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    agency_name = 'none'

                try:
                    purchased_from = i.find('div', attrs={
                        'class': 'val specialcomment'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                except:
                    purchased_from = 'none'


                accounts_block.append({
                    "account_name": acc_name,
                    "account_number": acc_no,
                    "recent_balance": recent_bal,
                    "date_opened": date_opened,
                    "under_dispunte": False,
                    "responsible_names": responsible_names,
                    "value_status": val_status,
                    "address": address6,
                    "city": add_city,
                    "state": add_state,
                    "zip": add_zip,
                    "phone":ad_phone,
                    "identity": ad_iden,
                    "account_type": types,
                    "term": term,
                    "on_record_until": on_record_until,
                    "credit_limit": credit_limit,
                    "high_balance": high_bal,
                    "monthly_payment": monthly_payment,
                    "compliance_code": comment,
                    "recent_payment": recent_payment,
                    "date_status": date_of_status,
                    "agency_id": agency_id,
                    "agency_name": agency_name,
                    "first_reported": first_reported,
                    "original_creditor": original_creditor,
                    "sold_to": sold_to,
                    "responsibilty": responsibilty,
                    "mortage_id": mortage_id,
                    "pay_states": recent_payments,
                    "status_updated": status_updated,
                    "comment": comment,
                    "statement": comment,
                    "purchased_from": purchased_from,
                    "account_history": account_history,
                    "balance_history": balance_history
                })
        except:
            pass

        # print("accounts_block", accounts_block)
        try:
            block8 = soup.find('div', attrs={'id': 'report-group-credit-inquiries-others'}).find_all(
                "div", attrs={"class": "report-entry"})

            for i in block8:
                try:
                    acc_name = i.find("div", attrs={"class": "val account-name"}).text.strip()
                except:
                    continue
                date_of_request = []
                try:
                    date_of_requests_block = i.find( "div", attrs={"class": "col-info-2"})
                    for v in date_of_requests_block.find_all('div', attrs={'class': 'date-of-request'}):
                        date_of_request.append(v.text.strip())
                except:
                    pass
                # print(date_of_request)

                try:
                    address = i.find(
                        'div', attrs={'class': 'val address'}).text.strip()
                    # print(address6)
                    add_city = i.find(
                        'span', attrs={'class': 'val city'}).text.strip()

                    add_state = i.find(
                        'span', attrs={'class': 'val state'}).text.strip()
                    add_zip = i.find(
                        'span', attrs={'class': 'val zip'}).text.strip()

                    # print(address6)
                except:
                    address = 'none'
                    add_city = 'none'
                    add_state = 'none'
                    add_zip = 'none'

                try:
                    ad_iden = i.find(
                        'div', attrs={'class': 'val address-id'}).text.strip()
                except:
                    ad_iden = 'none'


                try:
                    ad_phone = i.find(
                        'div', attrs={'class': 'val phone'}).text.strip()
                except:
                    ad_phone = 'none'

                # print(address)
                try:
                    comments = i.find(
                        'div', attrs={'class': 'val comments'}).text.strip()
                except:
                    comments = 'none'
                # print(comments)
                credit_inquiry_block.append({
                    "account_name": acc_name,
                    "date_of_request": date_of_request,
                    "address": address,
                    "city":add_city,
                    "state":add_state,
                    "zip":add_zip,
                    "phone":ad_phone,
                    "address_id":ad_iden,
                    "comments": comments
                })
        except:
            pass

        consumer_block = []
        try:
            block9 = soup.find('div', attrs={'id': 'report-group-credit-inquiries-only-you'}).find_all(
                "div", attrs={"class": "report-entry"})


            for i in block9:
                try:
                    acc_name = i.find("div", attrs={"class": "val account-name"}).text.strip()
                except:
                    continue
                # print(acc_name)
                date_of_request = []
                try:
                    date_of_requests_block = i.find( "div", attrs={"class": "col-info-2"})
                    for v in date_of_requests_block.find_all('div', attrs={'class': 'date-of-request'}):
                        date_of_request.append(v.text.strip())
                except:
                    pass

                # print(date_of_request)

                try:
                    address = i.find(
                        'div', attrs={'class': 'val address'}).text.strip()
                    # print(address6)
                    add_city = i.find(
                        'span', attrs={'class': 'val city'}).text.strip()

                    add_state = i.find(
                        'span', attrs={'class': 'val state'}).text.strip()
                    add_zip = i.find(
                        'span', attrs={'class': 'val zip'}).text.strip()

                    # print(address6)
                except:
                    address = 'none'
                    add_city = 'none'
                    add_state = 'none'
                    add_zip = 'none'

                try:
                    ad_iden = i.find(
                        'div', attrs={'class': 'val address-id'}).text.strip()
                except:
                    ad_iden = 'none'


                try:
                    ad_phone = i.find(
                        'div', attrs={'class': 'val phone'}).text.strip()
                except:
                    ad_phone = 'none'
                # print(address)
                try:
                    comments = i.find(
                        'div', attrs={'class': 'val comments'}).text.strip()
                except:
                    comments = 'none'
                # print(comments)
                consumer_block.append(
                    {"account_name": acc_name, "date_of_request": date_of_request, "address": address, "city":add_city, "state":add_state, "zip":add_zip, "phone":ad_phone, "identity":ad_iden})
        except:
            pass

        try:
            public_records = soup.find('div', attrs={
                                       'id': 'report-group-important-messages'}).find_all('p')[1].text.replace("\n", " ").strip()
            public_records = public_records.replace("\u00A0", " ")
        except:
            public_records = 'none'

        try:
            medical_records = soup.find('div', attrs={
                                        'id': 'report-group-important-messages'}).find_all('p')[0].text.replace("\n", " ").strip()
            medical_records = medical_records.replace("\u00A0", " ")
        except:
            medical_records = 'none'

        findata = {
            "personal_infomation": personal_block,
            "address": address_block,
            "other_personal_information": other_personal_block,
            "personal_statement": personal_statement,
            "potentially_statements": negative_block,
            'bankcrupcy_information': bankruptcy_block,
            "goodstanding_accountsinformation": accounts_block,
            "credit_inquiry_information": credit_inquiry_block,
            'consumer_inquiryblock': consumer_block,
            'medical_info': medical_records,
            'public_info': public_records
        }

        with open(self.filepath_report, "a+") as f:
            sorted = json.dumps(findata, indent=4)
            f.write(sorted)


    def click_to_expand(self):
        try:
            time.sleep(2)
            self.driver.find_element_by_id('expand-submit').click()
            return 'success'
        except:
            self.click_to_expand()

    def print_pdf(self):
        full_image = self.filename + '_%s.png'
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



experian = experianViewReport(sys.argv)
print(experian.call())


