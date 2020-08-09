from bs4 import BeautifulSoup
import xlwt
import json
import random
import time
import sys
import xlrd
import requests
from requests.auth import HTTPBasicAuth
from pprint import pprint
from selenium import webdriver
from selenium.webdriver.chrome.options import DesiredCapabilities
from selenium.webdriver.common.proxy import Proxy, ProxyType
from selenium.webdriver.support.ui import WebDriverWait


# PROXY = random.choice(ind).get_address()
#PROXY = '104.45.188.43:3128'
#PROXY = '52.41.192.68:8888'
PROXY = '64.71.145.122:3128'
#PROXY = '136.25.2.43:56726'
#PROXY = '52.41.192.68:8888'
#PROXY = '96.87.16.153:41344'
#PROXY ='178.57.89.142:35943'

print(PROXY)
webdriver.DesiredCapabilities.FIREFOX['proxy'] = {
    "httpProxy": PROXY,
    "ftpProxy": PROXY,
    "sslProxy": PROXY,
    "proxyType": "MANUAL",

}





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

options = webdriver.FirefoxOptions()
options.add_argument('--disable-gpu')
# options.add_argument('disable-infobars')
# options.add_argument("disable-notifications")
# options.add_argument("--disable-popup-blocking")
# options.page_load_strategy = 'normal'
# options.add_experimental_option("useAutomationExtension", False)
# options.add_experimental_option("detach", True)
# options.add_experimental_option("excludeSwitches", ["enable-automation"])
# options.add_experimental_option('prefs', profile)
# options.add_argument('--kiosk-printing')
# options.add_argument('--headless')
driver = webdriver.Firefox(
    executable_path='C:/python/tests/python_new_scripts/TransUnionExperian/Ex_Trans/Transcredit/geckodriver', options=options)



soup = BeautifulSoup(driver.page_source, u'html.parser')

# Only This U have to update to make that multiple reports thing work just add those report numbers like this

# Reportarr =['2398550174','0254323618','2932057896']
# It should be an array
# /usr/bin/python3 /home/nvdeep/Desktop/Backup/Ex_TransUnion/tests/testing.py 1,26,4,5
Reportarr = sys.argv[5].split(',')
# [6:32 PM, 6/10/2020] Nvdeep: Armen Harutyunyan 609- -  Report#0252664500 aharutyunyan88@gmail.com

# If One Report number didnt work it ll automatically try with the new one
email = sys.argv[1]
socialsec1 = sys.argv[2]
socialsec2 = sys.argv[3]
socialsec3 = sys.argv[4]
# 616-39-5510`
# 612-54-9753
# 618-25-2314 WILLIAM787@YMAIL.COM
# 618-25-2314
finlarr = []


for rn in Reportarr:
    try:
        driver.get('https://www.experian.com/ncaconline/dispute')
        time.sleep(5)

        print('Trying with-', rn)
        print('--'*60)
        report_numberxpath = driver.find_element_by_id(
            'reg-capid-rn-txt-reportNumber')
        # numb = random.choice(Reportarr)
        numb = str(rn)
        report_numberxpath.send_keys(numb)
        time.sleep(1)
        ssnxpath1 = driver.find_element_by_id('reg-capid-rn-txt-ssn1')
        ssnxpath1.send_keys(socialsec1)
        time.sleep(1)
        ssnxpath2 = driver.find_element_by_id('reg-capid-rn-txt-ssn2')
        ssnxpath2.send_keys(socialsec2)
        time.sleep(1)
        ssnxpath3 = driver.find_element_by_id('reg-capid-rn-txt-ssn3')
        ssnxpath3.send_keys(socialsec3)
        time.sleep(1)

        try:
            driver.find_element_by_name('reg-capid-rn-txt-ssn-option').click()
            time.sleep(3)
        except:
            pass

        emailxpath = driver.find_element_by_id('reg-capid-rn-txt-emailAddress')
        emailxpath.send_keys(email)
        time.sleep(1)
        conemailxpath = driver.find_element_by_id(
            'reg-capid-rn-txt-emailAddressConfirm')
        conemailxpath.send_keys(email)
        time.sleep(1)

        # Submitting
        driver.find_element_by_id(
            'reg-capid-rn-chk-agreeTermsConditions').click()
        time.sleep(1)
        driver.find_element_by_id('reg-capid-rn-btn-submit').click()
    except:
        pass

    # Loading The Soup to see Response
    time.sleep(15)
    ressoup = BeautifulSoup(driver.page_source, u'html.parser')
    try:
        title = ressoup.find(
            'div', attrs={'id': 'section-titles'}).text.strip()
        if 'Your credit report' in title:
            time.sleep(3)
            try:
                try:
                    driver.find_element_by_id('expand-submit').click()
                    print('Clicked on Expandall Try 1')
                    time.sleep(1)
                except:
                    driver.find_element_by_id('expand-submit').click()
                    print('Clicked on Expandall Try 2')
                # print('Clicked on Expandall')
                time.sleep(5)
            except:
                pass

            soup = BeautifulSoup(driver.page_source, u'html.parser')

            # html_str = driver.page_source
            # html_str = '"%s"' % html_str

            # Html_file = open("Dispute2.html", "w")
            # Html_file.write(html_str)
            # Html_file.close()

            # print('Html Saved')

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

            # print("other_personal_block",other_personal_block)
            try:
                personal_statement = soup.find('div', attrs={'id': 'report-box-personal-statements'}).text.replace(
                    "\n", " ").replace("\t", " ").replace("  ", "").strip()
            except:
                personal_statement = "none"

            # STarted Bankrupcyyyy

            try:
                try:
                    'report-entry even bankruptcy in-dispute expandable'
                    block_crupcy = soup.find('div', attrs={'class': 'bankruptcy'}).find_all(
                        "div", attrs={"class": "val item-name"})
                except:
                    block_crupcy = soup.find('div', attrs={
                                             'class': 'report-entry even bankruptcy'}).find_all("div", attrs={"class": "val item-name"})

                item_name = item_number = claim_amount = date_filled = val_status = address = ad_iden = libality_block = date_resolved = on_record_until = responsibility_b = reinvestigation = address6 = 'none'

                for i in block_crupcy:
                    try:
                        item_name = i.text.strip()
                    except:
                        item_name = 'none'

                    # print('Item-->',item_name)

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

                    # print('Claim-->',claim_amount)
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

                    try:
                        address = i.find(
                            "div", attrs={"class": "col-info-1"})[1].text.strip()
                    except:
                        address = 'none'

                        # print(bankcrpcy_blockaddress)
                    try:
                        try:
                            bankcrpcy_blockaddress = soup.find('div', attrs={'class': 'bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-1"})[1]
                        except:
                            bankcrpcy_blockaddress = soup.find('div', attrs={
                                                               'class': 'report-entry even bankruptcy'}).findAll("div", attrs={"class": "col-info-1"})[1]

                        address6 = bankcrpcy_blockaddress.text.strip()
                        address6 = address6.split('Address')[0].strip()
                    except:
                        address6 = 'none'

                    # print('Block Address-->>',address6)

                    try:
                        try:
                            ad_iden = soup.find('div', attrs={'class': 'bankruptcy'}).findAll("div", attrs={
                                "class": "col-info-1"})[1].find('div', attrs={'class': 'val address-id'}).text.strip()
                        except:
                            ad_iden = soup.find('div', attrs={'class': 'report-entry even bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-1"})[1].find('div', attrs={'class': 'val address-id'}).text.strip()

                    except:
                        ad_iden = 'none'

                    try:
                        try:
                            libality_block = soup.find('div', attrs={'class': 'bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-3"})[1]
                        except:
                            libality_block = soup.find('div', attrs={
                                                       'class': 'report-entry even bankruptcy'}).findAll("div", attrs={"class": "col-info-3"})[1]

                        liability = libality_block.find(
                            'div', attrs={'class': 'val liability-amount'}).text.strip()
                    except:
                        liability = 'none'

                    try:
                        try:
                            onrecord_until = soup.find('div', attrs={'class': 'bankruptcy'}).findAll("div", attrs={
                                "class": "col-info-2"})[1].find('div', attrs={'class': 'val on-record-until'}).text.strip()
                        except:
                            onrecord_until = soup.find('div', attrs={'class': 'report-entry even bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-2"})[1].find('div', attrs={'class': 'val on-record-until'}).text.strip()

                    except:
                        onrecord_until = 'none'

                    try:
                        try:
                            date_resolved = soup.find('div', attrs={'class': 'bankruptcy'}).findAll("div", attrs={
                                "class": "col-info-4"})[1].find('div', attrs={'class': 'val date-resolved'}).text.strip()
                        except:
                            date_resolved = soup.find('div', attrs={'class': 'report-entry even bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-4"})[1].find('div', attrs={'class': 'val date-resolved'}).text.strip()
                    except:
                        date_resolved = 'none'

                    try:
                        try:
                            reinvestigation = reinvestigation = soup.find('div', attrs={'class': 'bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-5"})[1].find('div', attrs={'class': 'val reinvestigation'}).text.strip()
                        except:
                            reinvestigation = reinvestigation = soup.find('div', attrs={'class': 'report-entry even bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-5"})[1].find('div', attrs={'class': 'val reinvestigation'}).text.strip()
                    except:
                        reinvestigation = 'none'
                        # print('Error in reinvestigation Block',sys.exc_info())
                        # print('Error in date_resolved Block',sys.exc_info())

                    try:
                        try:
                            responsibility_b = soup.find('div', attrs={'class': 'bankruptcy'}).findAll("div", attrs={
                                "class": "col-info-5"})[1].find('div', attrs={'class': 'val responsibility'}).text.strip()
                        except:
                            responsibility_b = soup.find('div', attrs={'class': 'report-entry even bankruptcy'}).findAll(
                                "div", attrs={"class": "col-info-5"})[1].find('div', attrs={'class': 'val responsibility'}).text.strip()
                    except:
                        responsibility_b = 'none'

                bankruptcy_block.append({"item_name": item_name,
                                         "item_number": item_number,
                                         "claim_amount": claim_amount,
                                         "date_filled": date_filled,
                                         "value_status": val_status, 'address': address6,
                                         'identity': ad_iden, 'liability': liability,
                                         'onrecord_until': onrecord_until, 'onrecord_until': onrecord_until,
                                         'reinvestigation': reinvestigation, 'date_resolved': date_resolved, 'responsibility': responsibility_b})

            except:
                import sys
                # print('Error in Item Block', sys.exc_info())
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
                        import re
                        acccounts = i.find("div", attrs={"class": "acc-hist-items-container"})

                        regex = re.compile('.*col-acc-hist-item.*')
                        account = acccounts.find_all("div", attrs={"class": regex})

                        account_history = {}

                        j = 0
                        for i in account:
                                    
                            try:
                                yeraValue = i.find(
                                    'div', attrs={'class': 'acc-hist-year'}).text.strip()
                               
                                if  "" !=  yeraValue:
                                    yera = yeraValue     
                            except:
                                pass

                            try:
                                month = i.find(
                                    'div', attrs={'class': 'acc-hist-month'}).text.strip()
                            except:
                                month = 'none'

                            try:
                                value = i.find(
                                    'div', attrs={'class': 'acc-hist-value'}).text.strip()
                            except:
                                value = 'none'

                            account_history[j] =  {
                                'year':yera,
                                'month':month,
                                'value':value

                            }
                            j +=1 


                    except:
                        print(sys.exc_info())
                        account_history = {}

                    try:
                        payAll = i.find("div", attrs={"class": "row-payment-history grid"})
                        pays = {}
                        if payAll:
                            pay = payAll.find_all("div", attrs={"class": "pay-hist-item"})
                            j = 0
                            for v in pay:
                                        
                                try:
                                    pays[j] = v.text.strip()

                                except:
                                    pass
                                j +=1   
                    except:
                        pays = {}


                    
                    try:
                        balance = i.find("div", attrs={"class": "col-1-1 bal-hist-items-container"})
                        balanceAll = balance.find_all("div", attrs={"class": "bal-hist-item"})

                        balance_history = {}
                        j = 0
                        for v in balance:
                                    
                            try:
                                balance3 = v.text.strip()
                                balance_history[j] = balance3

                            except:
                                pass
                                
                            j +=1   
                    except:
                        balance_history = {}

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
                        status_updated = i.find('div', attrs={
                            'class': 'val status-date'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                    except:
                        status_updated = 'none'

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
                print(sys.exc_info())
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

                        account_history = {}

                        j = 0
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
                                value = i.find(
                                    'div', attrs={'class': 'acc-hist-value'}).text.strip()
                            except:
                                value = 'none'

                            account_history[j] =  {
                                'year':yera,
                                'month':month,
                                'value':value

                            }
                            j +=1 


                    except:
                        print(sys.exc_info(), j , acc_name)
                        account_history = {}

                    try:
                        balance = i.find("div", attrs={"class": "col-1-1 bal-hist-items-container"})
                        balanceAll = balance.find("div", attrs={"class": "bal-hist-item"})

                        balance_history = {}
                        j = 0
                        for v in balanceAll:                              
                            try:
                                balance_history[j] = v.text.strip()

                            except:
                                pass
                                                        
                            j +=1   
                    except:
                        balance_history = {}

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

                        recent_payments = {}
                        j = 0
                        for v in pay:
                                    
                            try:
                                recent_payments[j] = v.text.strip()

                            except:
                                pass
                            j +=1   
                    except:
                        recent_payments = {}

                    try:
                        status_updated = i.find('div', attrs={
                            'class': 'val status-date'}).text.replace("\n", " ").replace("\u00a0", " ").strip()
                    except:
                        status_updated = 'none'

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
                    # print(acc_name)
                    try:
                        date_of_request = i.find('div', attrs={'class': 'val date-of-request'}).find_previous(
                            "div", attrs={"class": "grid"}).text.replace("\n", " ").strip()
                    except:
                        date_of_request = 'none'
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
                    try:
                        date_of_request = i.find('div', attrs={'class': 'val date-of-request'}).find_previous(
                            "div", attrs={"class": "grid"}).text.replace("\n", " ").strip()
                    except:
                        date_of_request = 'none'

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

            # print("personal_statement",personal_statement)
            # Bankcrupcy Block

            #  Started Bankcrupcy-------------------------------------------------------------------------------------------------------------------------------------------------

            # End Of Bankcrupcy------------------------------------------------------------------------------------------------------------------------------


            




            finlarr.append({"personal_infomation": personal_block, "address": address_block,
                            "other_personal_information": other_personal_block,
                            "personal_statement": personal_statement,
                            "potentially_statements": negative_block,
                            'bankcrupcy_information': bankruptcy_block,
                            "goodstanding_accountsinformation": accounts_block,
                            "credit_inquiry_information": credit_inquiry_block, 'consumer_inquiryblock': consumer_block, 'medical_info': medical_records, 'public_info': public_records})

            account_name = email.split('@')[0]
            filename = str(account_name)+"_Dispute2.json"
            print("File_Name--", filename)
            print('Report Number Used->', rn)
            print('File Generated Successfully!!')
            with open(filename, "a+") as f:
                sorted = json.dumps(finlarr, indent=4)
                f.write(sorted)
            # driver.execute_script('window.print();')
            break
    except:
        import sys
        print('Continuing With The Next Report Number')
        # print('Error Occured For Report Number-->'+str(rn), sys.exc_info())
        continue

