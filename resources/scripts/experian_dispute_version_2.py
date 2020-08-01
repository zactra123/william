from bs4 import BeautifulSoup
import xlwt,json
import random
import time,sys
from selenium import webdriver

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
driver = webdriver.Firefox(executable_path='/home/nvdeep/Projects/Fiver/Drivers/geckodriver', options=options)

soup=BeautifulSoup(driver.page_source,u'html.parser')

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

print('Waiting Time IS Around 60 seconds')

for rn in Reportarr:
    try:
        driver.get('https://www.experian.com/ncaconline/dispute')
        

        time.sleep(20)

        print('Trying with-',rn)
        print('--'*80)
        report_numberxpath = driver.find_element_by_id('reg-capid-rn-txt-reportNumber')
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
        conemailxpath = driver.find_element_by_id('reg-capid-rn-txt-emailAddressConfirm')
        conemailxpath.send_keys(email)
        time.sleep(1)
        
        # Submitting 
        driver.find_element_by_id('reg-capid-rn-chk-agreeTermsConditions').click()
        time.sleep(1)
        driver.find_element_by_id('reg-capid-rn-btn-submit').click()
    except:
        pass
       
    # Loading The Soup to see Response
    time.sleep(12)
    ressoup = BeautifulSoup(driver.page_source,u'html.parser')
    try:
        title = ressoup.find('div', attrs={'id': 'section-titles'}).text.strip()
        print('Title',title)
        if 'Your credit report' in title:
            time.sleep(5)
            try:
                try:
                    driver.find_element_by_id('expand-submit').click()
                    print('Clicked on Expandall Try 1')
                    time.sleep(2)  
                except:
                    driver.find_element_by_id('expand-submit').click()
                    print('Clicked on Expandall Try 2')  
                # print('Clicked on Expandall')            
            except:
                pass
            
            print('---'*40)
            time.sleep(5)

            soup = BeautifulSoup(driver.page_source, u'html.parser')
            personal_block = []
            address_block = []
            other_personal_block = []
            negative_block = []
            accounts_block = []
            credit_inquiry_block = []

            block1 = soup.find_all('div', attrs={'class': 'val name'})
            # print(block1)
            for i in block1:
                try:
                    try:
                        name = i.text.strip()
                    except:
                        name = 'none'

                    try:
                        identity = i.find_next("div").text.strip()
                    except:
                        identity = 'none'
                except:
                    pass

                personal_block.append({"name":name, "name_identification_number": identity})
            # print("personal_block",personal_block)

            block2 = soup.find('div', attrs={'id': 'report-group-addresses'}).find_all('div', attrs={'class':"val address"})
            # print('Block2',block2)
            for i in block2:
                try:
                    try:
                        address = i.text.strip()
                    except:
                        address = 'none'

                    try:
                        address_identity = i.find_next("div").text.strip()
                    except:
                        address_identity = 'none'

                    try:
                        residence_type = i.find_next("div", attrs={"class":"val residence-type"}).text.strip()
                    except:
                        residence_type = 'none'

                    try:
                        geographical_code = i.find_next("div", attrs={"class":"val geo-code"}).text.strip()
                    except:
                        geographical_code = 'none'

                    address_block.append({"address": address, "address_identification_number": address_identity,
                                         "residence_type": residence_type, "geographical_code":geographical_code})
                except:
                    pass

            # print("address_block", address_block)

            
            try:
                yob = soup.find('div', attrs={'class': 'val yob'}).text.strip()
            except:
                yob = 'none'
                
            try:
                spouse = soup.find('div', attrs={'class': 'val coapplicant'}).text.strip()
            except:
                spouse = 'none'
            
            try:
                ssn_val = soup.find('div', attrs={'class': 'val ssn'}).text.strip()
            except:
                ssn_val = 'none'
            
            
            other_personal_block.append({"year of birth": yob,"spouse_coapplicant":spouse,"ssn_variation":ssn_val})
            # print("other_info",other_personal_block)

            block3 = soup.find_all('div', attrs={'class': 'val telephone'})
            for i in block3:
                try:
                    try:
                        telephone = i.text.strip()
                    except:
                        telephone = 'none'

                    try:
                        telephone_type = i.find_next("div").text.strip()
                    except:
                        telephone_type = 'none'

                    # print("telephone", telephone, telephone_type)

                    other_personal_block.append({"telephone_number": telephone, "telephone_type": telephone_type})
                except:
                    pass

            block4 = soup.find('div', attrs={'id': 'report-group-other-personal-info'}).find_all('div', attrs={
                'class': "val employer"})

            for i in block4:
                try:
                    try:
                        employer = i.text.strip()
                    except:
                        employer = 'none'

                    try:
                        address = i.find_next("div").text.strip()
                    except:
                        address = 'none'

                    # print("employer", employer, address)

                    other_personal_block.append({"employer": employer, "address": address})
                except:
                    pass

            block5 = soup.find_all('div', attrs={'class': 'val fraudnotice'})
            for i in block5:
                try:
                    try:
                        notice = i.text.strip()
                    except:
                        notice = 'none'

                    # print("notice", notice)

                    other_personal_block.append({"notice": notice})
                except:
                    pass

            # print("other_personal_block",other_personal_block)
            try:
                personal_statement = soup.find('div', attrs={'id': 'report-box-personal-statements'}).text.replace("\n"," ").replace("\t"," ").replace("  ","").strip()
            except:
                personal_statement = "none"

            # print("personal_statement",personal_statement)
            block6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "val account-name"})
            
            
            try:
                address_block6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "col-info-1"})
                # print(address_block6)
                add_arr = []
                for a in address_block6:
                    try:
                        address6 = a.find('div',attrs={'class':'val type'}).text.strip()
                    except:
                        address6 = 'none'
                        
                    try:
                        ad_iden = a.find('div',attrs={'class':'val address-id'}).text.strip()
                    except:
                        ad_iden = 'none'
                        
                        add_arr.append({'address':addess6,'identity':ad_iden})
                        
            except:
                pass
                    
                
            try:
                type_block6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "col-info-2"})
                type_arr = []
                for a in type_block6:
                    try:
                        types = a.find('div',attrs={'class':'val type'}).text.strip()
                    except:
                        types = 'none'
                        
                    try:
                        terms = a.find('div',attrs={'class':'val terms'}).text.strip()
                    except:
                        terms = 'none'
                        
                    type_arr.append({'type':types,'terms':terms})
                    
            except:
                pass
                  
                    
            try:
                credit_block6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "col-info-3"})
                credit_arr = []
                for a in credit_block6:
                    try:
                        credit_limit = a.find('div',attrs={'class':'val credit-limit'}).text.strip()
                    except:
                        credit_limit = 'none'
                        
                    try:
                        high_limit = a.find('div',attrs={'class':'val high-balance'}).text.strip()
                    except:
                        high_limit = 'none'
                        
                    try:
                        month_limit = a.find('div',attrs={'class':'val monthly-payment'}).text.strip()
                    except:
                        month_limit = 'none'
                        
                    try:
                        recent_limit = a.find('div',attrs={'class':'val recent-payment'}).text.strip()
                    except:
                        recent_limit = 'none'
                        
                    credit_arr.append({'credit_limit':credit_limit,'high_limit':high_limit,'monthly_limit':month_limit,'recent_limit':recent_limit})
            except:
                pass
                    
                    
            try:
                dates_block = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "col-info-4"})
                dates_arr = []
                for a in dates_block:
                    try:
                        date_status = a.find('div',attrs={'class':'val status-date'})
                    except:
                        date_status = 'none'
                        
                    try:
                        first_reported = a.find('div',attrs={'class':'val report-started-date'}).text.strip()
                    except:
                        first_reported = 'none'
                        
                    try:
                        responsibility = a.find('div',attrs={'class':'val responsibility'}).text.strip()
                    except:
                        responsibility = 'none'
                        
                    dates_arr.append({'date_status':date_status,'first_reported':first_reported,'responsibility':responsibility})
            except:
                pass
                    
            accounts = 'none'
            try:
                account_hisblock6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "row-account-history grid"})
                for ah in account_hisblock6:
                    try:
                        accounts = ah.text.strip()
                    except:
                        accounts = 'none'
                        import sys
                        print(sys.exc_info())
                        
                pays = 'none'
                pay_hisblock6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "row-payment-history grid"})
                for ah in pay_hisblock6:
                    try:
                        pays = ah.text.strip()
                    except:
                        pays = 'none'
                    
                bals = 'none'
                bal_hisblock6 = soup.find('div', attrs={'id': 'report-box-potentially-negative'}).find_all("div", attrs={"class": "row-balance-history grid"})
                for ah in bal_hisblock6:
                    try:
                        bals = ah.text.strip()
                    except:
                        bals = 'none'
            except:
                pass
                        
            
                # ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                
            # Negative Items
            negative_block.append({'address_negative':add_arr,'types_block':type_arr,'credit':credit_arr,'dates':dates_arr,'accounts_info':accounts,'payments':pays,'balance':bals})
            
            for i in block6:
                try:
                    acc_name = i.text.strip()
                except:
                    acc_name = 'none'

                try:
                    acc_no = i.find_next('div', attrs={'class': 'val account-number'}).text.strip()
                except:
                    acc_no = 'none'

                try:
                    recent_bal = i.find_next('div', attrs={'class': 'val recent-balance'}).text.strip()
                except:
                    recent_bal = 'none'

                try:
                    date_opened = i.find_next('div', attrs={'class': 'val date-opened'}).text.strip()
                except:
                    date_opened = 'none'

                try:
                    val_status = i.find_next('div', attrs={'class': 'val status'}).text.strip()
                except:
                    val_status = 'none'

                negative_block.append({"account_name": acc_name, "account_number": acc_no, "recent_balance": recent_bal,
                                       "date_opened": date_opened, "value_status": val_status})

            # print("negative_block", negative_block)
            block7 = soup.find('div', attrs={'id': 'report-group-good-standing'}).find_all("div", attrs={"class": "val account-name"})

            for i in block7:
                try:
                    acc_name = i.text.strip()
                except:
                    acc_name = 'none'

                try:
                    acc_no = i.find_next('div', attrs={'class': 'val account-number'}).text.strip()
                except:
                    acc_no = 'none'

                try:
                    recent_bal = i.find_next('div', attrs={'class': 'val recent-balance'}).text.strip()
                except:
                    recent_bal = 'none'

                try:
                    date_opened = i.find_next('div', attrs={'class': 'val date-opened'}).text.strip()
                except:
                    date_opened = 'none'

                try:
                    val_status = i.find_next('div', attrs={'class': 'val status'}).text.strip()
                except:
                    val_status = 'none'

                try:
                    address = i.find_next('div', attrs={'class': 'val address'}).find_previous("div").text.strip()
                except:
                    address = 'none'

                try:
                    types = i.find_next('div', attrs={'class': 'val type'}).text.strip()
                except:
                    types = 'none'

                try:
                    term = i.find_next('div', attrs={'class': 'val terms'}).text.strip()
                except:
                    term = 'none'

                try:
                    on_record_until = i.find_next('div', attrs={'class': 'val on-record-until'}).text.strip()
                except:
                    on_record_until = 'none'

                try:
                    credit_limit = i.find_next('div', attrs={'class': 'val credit-limit'}).text.strip()
                except:
                    credit_limit = 'none'

                try:
                    high_bal = i.find_next('div', attrs={'class': 'val high-balance'}).text.strip()
                except:
                    high_bal = 'none'

                try:
                    monthly_payment = i.find_next('div', attrs={'class': 'val monthly-payment'}).text.strip()
                except:
                    monthly_payment = 'none'

                try:
                    recent_payment = i.find_next('div', attrs={'class': 'val recent-payment'}).text.strip()
                except:
                    recent_payment = 'none'

                try:
                    date_of_status = i.find_next('div', attrs={'class': 'val status-date'}).text.strip()
                except:
                    date_of_status = 'none'

                try:
                    first_reported = i.find_next('div', attrs={'class': 'val report-started-date'}).text.strip()
                except:
                    first_reported = 'none'

                try:
                    responsibilty = i.find_next('div', attrs={'class': 'val responsibility'}).text.strip()
                except:
                    responsibilty = 'none'

                try:
                    comment = i.find_next('div', attrs={'class': 'val comment'}).text.strip()
                except:
                    comment = 'none'

                try:
                    account_history = i.find_next('div', attrs={'class': 'row-account-history grid'}).text.replace("\n"," ").replace("\u00a0"," ").strip()
                except:
                    account_history = 'none'

                try:
                    balance_history = i.find_next('div', attrs={'class': 'row-balance-history grid'}).text.replace("\n"," ").replace("\u00a0"," ").replace("\t"," ").strip()
                except:
                    balance_history = 'none'


                accounts_block.append({"account_name":acc_name, "account_number":acc_no, "recent_balance":recent_bal,
                                 "date_opened":date_opened, "value_status":val_status, "address": address, "type": types,
                                       "term": term, "on_record_until": on_record_until, "credit_limit": credit_limit,
                                       "high_balance":high_bal, "monthly_payment":monthly_payment,
                                       "recent_payment":recent_payment, "date_of_status": date_of_status,
                                       "first_reported":first_reported, "responsibilty": responsibilty,
                                       "comment":comment, "account_history":account_history,'balance_history':balance_history})

            # print("accounts_block", accounts_block)
            try:
                block8 = soup.find('div', attrs={'id': 'report-group-credit-inquiries-others'}).find_all("div", attrs={"class": "val account-name"})
                print("Going To Get The Report")
                for i in block8:
                    try:
                        acc_name = i.text.strip()
                    except:
                        acc_name = 'none'
                    # print(acc_name)
                    try:
                        date_of_request = i.find_next('div', attrs={'class': 'val date-of-request'}).find_previous("div",attrs={"class":"grid"}).text.replace("\n"," ").strip()
                    except:
                        date_of_request = 'none'
                    # print(date_of_request)
                    try:
                        address = i.find_next('div', attrs={'class': 'val address'}).find_previous("div").text.strip()
                    except:
                        address = 'none'
                    # print(address)
                    try:
                        comments = i.find_next('div', attrs={'class': 'val comments'}).text.strip()
                    except:
                        comments = 'none'
                    # print(comments)
                    credit_inquiry_block.append({"account_name": acc_name, "date_of_request": date_of_request, "address": address, "comments": comments})
            except:
                pass
            
            
            consumer_block = []
            try:
                block9 = soup.find('div', attrs={'id': 'report-group-credit-inquiries-only-you'}).find_all("div", attrs={"class": "val account-name"})
                
                for i in block9:
                    try:
                        acc_name = i.text.strip()
                    except:
                        acc_name = 'none'
                    # print(acc_name)
                    try:
                        date_of_request = i.find_next('div', attrs={'class': 'val date-of-request'}).find_previous("div",attrs={"class":"grid"}).text.replace("\n"," ").strip()
                    except:
                        date_of_request = 'none'
                        
                    # print(date_of_request)
                    try:
                        address = i.find_next('div', attrs={'class': 'val address'}).find_previous("div").text.strip()
                    except:
                        address = 'none'
                    # print(address)
                    try:
                        comments = i.find_next('div', attrs={'class': 'val comments'}).text.strip()
                    except:
                        comments = 'none'
                    # print(comments)
                    consumer_block.append({"account_name": acc_name, "date_of_request": date_of_request, "address": address})
            except:
                pass
            
            
            try:
                public_records = soup.find('div', attrs={'id': 'report-group-important-messages'}).find_all('p')[1].text.replace("\n"," ").strip()
                public_records = public_records.replace("\u00A0"," ")
            except:
                public_records = 'none'    
                
            try:
                medical_records = soup.find('div', attrs={'id': 'report-group-important-messages'}).find_all('p')[0].text.replace("\n"," ").strip()
                medical_records = medical_records.replace("\u00A0"," ")
            except:
                medical_records = 'none'


            finlarr.append({"personal_infomation": personal_block, "address": address_block,
                            "other_personal_information": other_personal_block,
                            "personal_statement": personal_statement,
                            "potentially_statements": negative_block,
                            "accounts_information":accounts_block,
                            "credit_inquiry_information": credit_inquiry_block,'consumer_inquiryblock':consumer_block,'medical_info':medical_records,'public_info':public_records})

            filename = "Transunion_DiS2.json"
            print("File_Name--", filename)
            print('File Generated Successfully!!')
            with open(filename, "a+") as f:
                sorted = json.dumps(finlarr, indent=4)
                f.write(sorted)
            driver.execute_script('window.print();')
            break
    except:
        import sys
        print('Continuing With The Next Report Number')
        # print(sys.exc_info())
        continue
