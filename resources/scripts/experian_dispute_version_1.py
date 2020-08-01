import json
from selenium import webdriver
import requests
from bs4 import BeautifulSoup
import xlwt
import sys
import xlrd
import time
from selenium.webdriver.common.keys import Keys
import requests
from requests.auth import HTTPBasicAuth
from pprint import pprint
session = requests.Session()
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
link = "https://usa.experian.com/api/dispute/cdis"
# auth = HTTPBasicAuth('Bearer', 'M2EwMzAzZjYtODc4YS00ZjgwLTlhMmItZjEzYTgwMDI1OWY0.G8D2mO5or3+kbymfS1mC+gBiwQCyzMUGGe58WQ+O+rerVHpv4vqcLmrDES03eifm2355TIZ9+bDKJevl+z1RE/g893cnb6+xQQ6ecVu+prMR2yRyACJS+/ET39JoHCRF0pErtekG5UjJX2EKzpKSG7s9+GfhV4fktUXaqv47P6CR36guKDLrMEhGZS+yyTEPck7lKZClhLEp36iq6nd+6rYwDivwpiFeQzlYF0fxMesx4GBXG9SzMpUWhe/ZRTCyVXNa2JNw5scyPbPhmfcE5tGx6mPazwhS8Yb+eifT6Vr75l0cfb9asCyJzwgEHexh4fzbO4pIvoE6SWRlR+9Hfw==')


# Thse inputs are required
username = sys.argv[1]
userpassword = sys.argv[2]
question = sys.argv[3]
pinn = sys.argv[4]
date_OB = sys.argv[5]
sec_pin = sys.argv[6]
# ------------------------------------------------------------------------------------

# username = 'Muppbvi617'
# userpassword = 'Abeeku1993'

time.sleep(3)

#

data = '{"username":"'+username+'","password":"' + \
    userpassword+'","clientId": "experian"}'
pprint(data)
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
s1 = session.get('https://usa.experian.com/login/index')

ress = session.post(
    'https://usa.experian.com/api/securelogin/oauth/token', data=data, headers=headers)
print(ress.status_code)

headd = json.loads(ress.content)
try:
    msg = headd['errors']
    print(msg)
except:
    print('')
    pass

tokken = str(headd['token']['accessToken'])
tid = str(headd['trustId'])
# pprint(tokken)
pprint(tid)

print("___"*10)
headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0',
    'Accept': 'application/json',
    'Accept-Language': 'en-US,en;q=0.5',
    'Referer': 'https://usa.experian.com/',
    'Authorization': tokken,
    'Content-Type': 'application/json',
    'ADRUM': 'isAjax:true',
    'Origin': 'https://usa.experian.com',
    'DNT': '1',
    'Connection': 'keep-alive',
    'TE': 'Trailers',
}

data = '{"answer":"'+str(question)+'","pin":"'+str(pinn)+'","trustDevice":true,"trustId":"' + \
    str(tid)+'"}'
print(data)
response = session.post('https://usa.experian.com/api/securelogin/submitquestion',
                        headers=headers, data=data)

print(response.status_code)
# print(response)

try:
    msg = headd['errors']
    print(msg)
except:
    pass
main = json.loads(response.content)
# print(tokken)

try:
    m_token = str(main['token']['accessToken'])
except:
    m_token = tokken
try:
    qdata = '{"dob": "1983-03-07","ssn": "618252314","trustDevice": true,"trustId": "' + \
        str(tid)+'"}'
    # Uncomment for testing purpose
    print(qdata)
    # print(type(qdata))
    # print(m_token)
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
        'https://usa.experian.com/api/securelogin/submitdob', data=qdata, headers=qheaders)
    # print(qress.status_code)
    # print(qress)

    qheadd = json.loads(qress.content)
    q_token = str(qheadd['token']['accessToken'])
    # pprint(q_token)
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
# print(headers)

resp = session.get(link, headers=headers)
# print(resp)
p_main = json.loads(resp.content)

filename = "Data.json"
print("File_Name--", filename)
with open(filename, "a+") as f:
    sorted = json.dumps(p_main, indent=4)
    f.write(sorted)
    print("Json Generated")

# grep = session.get(
#     'https://usa.experian.com/member/disputeCenter/reportSummary', headers=headers)
# print(grep.status_code)

# with open('metadata.text', 'wb') as f:
#     f.write(grep.content)

try:
    options = webdriver.ChromeOptions()
    # options.add_argument('--disable-gpu')
    # options.add_argument("disable-infobars")
    options.add_experimental_option("useAutomationExtension", False)
    options.add_experimental_option(
        "excludeSwitches", ["enable-automation"])
    options.add_experimental_option('prefs', profile)
    options.add_argument('--kiosk-printing')
    # options.add_argument('--headless')
    driver = webdriver.Chrome(
        executable_path='/usr/bin/chromedriver', options=options)

# soup=BeautifulSoup(driver.page_source,u'html.parser')
except:
    options = webdriver.FirefoxOptions()
    options.add_argument('--disable-gpu')
    # options.add_argument('print.always_print_silent')
    fp = webdriver.FirefoxProfile()
# 0 means to download to the desktop, 1 means to download to the default "Downloads" directory, 2 means to use the directory
    fp.set_preference("browser.download.folderList", 1)
    fp.set_preference("browser.helperApps.alwaysAsk.force", False)
    fp.set_preference("print.always_print_silent", True)
    fp.set_preference("Save as PDF", True)
    fp.set_preference("print save as pdf", True)
    fp.set_preference("browser.download.manager.showWhenStarting", False)

    # driver = webdriver.Firefox(
    #     capabilities=firefox_capabilities, firefox_binary=binary, firefox_profile=fp)
    driver = webdriver.Firefox(
        executable_path='C:/Users/Front Desk/Desktop/design/python/17062020/Ex_TransUnion/Transunion_Regsiter/geckodriver.exe', options=options, firefox_profile=fp)

driver.get('https://usa.experian.com/login/index')
time.sleep(10)
uname = driver.find_element_by_xpath(
    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/ecs-input/div/div[2]/input')
uname.click()

uname.send_keys(username)

upass = driver.find_element_by_xpath(
    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/div[2]/ecs-input/div/div[2]/input')
upass.click()
upass.send_keys(userpassword)

driver.find_element_by_xpath(
    '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-signin/ecs-card/section[2]/div/ecs-form/form/div[4]/button').click()
time.sleep(5)
print(driver.current_url)
soup = BeautifulSoup(driver.page_source, 'html.parser')

if 'Billing Information Update' in soup.text.strip():
    from rest_framework import status
    response = {
        'status': 'Billing Information Update require',
        'code': status.HTTP_422_UNPROCESSABLE_ENTITY,
        'message': 'Please Enter Credit Card Number',
    }
    print(response)

else:
    print('else part')

    try:
        driver.get('https://usa.experian.com/login/ato/question')

        teacher = driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[1]/div/div[2]/input')

        teacher.click()

        teacher.send_keys(question)

        pin = driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/ecs-input[2]/div/div[2]/input')

        pin.click()
        pin.send_keys(pinn)

        driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-question/ecs-card/section[2]/div/app-security-question-page/ecs-form/form/button').click()
        time.sleep(10)

        DOB = driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-dob-input/div/ecs-input/div/div[2]/input')

        DOB.click()

        DOB.send_keys(date_OB)

        ssn = driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/ecs-ssn-input/label/div[2]/input')
        ssn.click()
        ssn.send_keys(sec_pin)

        driver.find_element_by_xpath(
            '/html/body/app-root/app-public/ecs-public-template/div/div/div/div/div/app-email/ecs-card/section[2]/div/app-dob-ssn-page/ecs-form/form/div/button').click()

    except:
        print('Sec chck pass')
        pass

    time.sleep(8)

    try:
        driver.find_element_by_xpath(
            '/html/body/app-root/div[2]/div/div[1]/main/div/div/form/div/div[2]/div/div[2]/div/div[5]/button').click()
    except:
        print('Moving On.........')
        pass

    time.sleep(6)

    soup = BeautifulSoup(driver.page_source, 'html.parser')

    if 'Billing Information Update' in soup.text.strip():
        from rest_framework import status
        response = {
            'status': 'Billing Information Update require',
            'code': status.HTTP_422_UNPROCESSABLE_ENTITY,
            'message': 'Please Enter Credit Card Number',
        }
        print(response)

    else:
        print('else part')
        driver.get(
            'https://usa.experian.com/member/disputeCenter/reportSummary')
        time.sleep(5)

        try:
            print('in disputConsent')
            driver.find_element_by_xpath(
                    '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/form/label').click()

            #driver.find_element_by_name('disputeConsent').click()
        except:
            pass
        try:
            driver.find_element_by_xpath(
                ('/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/form/label[2]/span[1]')).click()
        except:
            pass

        time.sleep(5)
        try:
            # driver.find_element_by_xpath(
            #     '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/form/label').click()
            driver.find_element_by_xpath(
                '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/button').click()
        except:
            print("move ....")
            pass
        try:
            driver.find_element_by_xpath(
                '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div[2]/div[2]/div[1]/div/div[2]/div/a').click()
        except:
            pass

        driver.get(
            'https://usa.experian.com/member/disputeCenter/reportSummary')
        time.sleep(5)
        try:
            error = driver.find_element_by_class_name(
                'dispute-header').text
            if "Dispute Can't Be Processed Online" in error:
                driver.get(
                    'https://usa.experian.com/member/reports/experian/now?scroll=false')
            time.sleep(10)
            driver.find_element_by_xpath(
                '/html/body/app-root/div[2]/div/div[1]/main/div/div[2]/div/div/div/div[2]/div[1]/button').click()
            time.sleep(5)
            # else:
            #     driver.find_element_by_xpath('/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div/div/div[2]/div[2]/a/span').click()
        except:
            time.sleep(10)
            driver.find_element_by_xpath(
                '/html/body/app-root/div[2]/div/div[1]/main/div/div/div/div/div/div[2]/div[2]/a/span').click()

        time.sleep(5)
        # driver.switch_to.active_element
        driver.switch_to_window(driver.window_handles[1])
        driver.switch_to.default_content
        driver.switch_to.window
        # driver.find_element_by_tag_name('body').send_keys(Keys.CONTROL + Keys.TAB)
        # driver.find_element_by_tag_name('button').click()

        # time.sleep(5)

        # print(driver.current_url)
        time.sleep(3)
        # print(driver.current_window_handle)
        driver.execute_script('window.print();')
        time.sleep(5)
        driver.switch_to_window(driver.window_handles[0])
        driver.switch_to.default_content
        driver.switch_to.window
        driver.get('https://usa.experian.com/member/disputeCenter')
        # reqqqq = session.get('https://usa.experian.com/member/disputeCenter')
        # driver.find_element_by_css_selector(
        #     '#siteContent > div > div > div > div.row.dispute-center--spacing > div.col-sm-3 > div.ng-scope > ul > li.clickable.ng-scope.active').click()
        time.sleep(4)
        soup = BeautifulSoup(driver.page_source, 'html.parser')
        a_main = []
        repn = []

        all_rep = soup.findAll(
            'div', attrs={'data-tms': 'dispute-completed-view-results'})
        if len(all_rep) != 0:
            for rep in all_rep:
                rep_links = 'https://usa.experian.com' + str(rep.get('href'))
                print(rep_links)
                driver.get(rep_links)
                time.sleep(3)
                rsoup = BeautifulSoup(driver.page_source, 'html.parser')
                rnum = rsoup.find(
                    'span', attrs={'ng-bind': '::cdfItem.reportNumber'}).text.strip().replace('-', '')
                print(rnum)
                rdate = rsoup.find('span', attrs={
                    'ng-bind': 'getFormattedDate(cdfItem.cdfDateCreated)'}).text.strip()
                print(rdate)
                aa = {

                    'Report Number': rnum,
                    'Date Generated': rdate
                }

                a_main.append(aa)

            repn = {
                'Username': username,
                'SSN': int(sec_pin.replace('-', '').replace('\u200e', '')),
                'Report Numbers': a_main,
            }
            filename = "ReportNumberss.json"
            print("File_Name--", filename)
            with open(filename, "a+") as f:
                sorted = json.dumps(repn, indent=4)
                f.write(sorted)
                print("Json Generated")
        else:
            print('New disput')
            driver.get(
                'https://usa.experian.com/member/disputeCenter/reportSummary')
            repn = []
            time.sleep(4)
            ssoup = BeautifulSoup(driver.page_source, 'html.parser')

            repnum = ssoup.find(
                'span', attrs={"ng-bind": "modifiedCdiId || 'N/A'"}).text.strip().replace('-', '')
            rddate = ssoup.find(
                'span', attrs={"ng-bind": "(modifiedConsumerDate | date:'MMM d, yyyy') || 'N/A'"}).text.strip()
            print(rddate)
            repn = {
                'Username': username,
                'SSN': int(sec_pin.replace('-', '').replace('\u200e', '')),
                'Report Numbers': repnum,
                'Date Generated': rddate
            }
            filename = "ReportNumbers.json"
            print("File_Name--", filename)
            with open(filename, "a+") as f:
                sorted = json.dumps(repn, indent=4)
                f.write(sorted)
                print("Json Generated")
        # soup = BeautifulSoup(driver.page_source, u'html.parser')

        # p_main = []

        # personal = soup.find('div', attrs={'class': 'personal-info-section'})

        # pps = personal.find_all('div', attrs={'class': 'report-item--container'})
        # for p in pps:
        #     pp = {
        #         p.find('h3').text.strip(): p.text.strip().split(p.find('h3').text.strip())[1]
        #     }
        #     p_main.append(pp)

        # a_main1 = []
        # a_main = []
        # try:
        #     account = soup.find('div', attrs={'class': 'accounts-section'})
        #     accounts = account.find_all(
        #         'div', attrs={"class": "report-item--container"})

        #     for ac in accounts:
        #         ac = {
        #             ac.find('h3').text.strip(): ac.text.strip()
        #         }
        #         a_main1.append(ac)
        #     aa = {
        #         "Account": a_main1
        #     }
        # except:
        #     pass
        # a_main.append(aa)

        # filename = "Accounts.json"
        # print("File_Name--", filename)
        # with open(filename, "a+") as f:
        #     sorted = json.dumps(a_main, indent=4)
        #     f.write(sorted)
        #     print("Json Generated")
