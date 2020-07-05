from rest_framework import status
import json
from selenium import webdriver
import requests
from bs4 import BeautifulSoup
import xlwt
import xlrd
import sys
import time
from selenium.webdriver.common.keys import Keys
import re
import random
import string
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

# -------------------------------------------------------------------------------------Varibales_Used-----------------------------------------------------------------------------------------------------
username = sys.argv[1]
password = sys.argv[2]
fname = sys.argv[3]
lname = sys.argv[4]
address = str(sys.argv[5]).replace('_', ' ')
city = sys.argv[6]
if '_' in city:
    city = city.replace('_', ' ')
state = sys.argv[7]
zipcode = sys.argv[8]
# Shoud be True or False
lived_status = True

email = sys.argv[9]
dob = str(sys.argv[10]).replace('/', '')
dobmonth = dob[:2]
dobyear = dob[-4:]
dobday = dob.split(dobmonth)[1].split(dobyear)[0]
print(dobmonth, dobday, dobyear)
ssn = str(sys.argv[11]).replace('-', '')
ssn1 = str(ssn)[:3]
ssn3 = str(ssn)[-4:]
ssn2 = str(ssn).split(ssn1)[1].split(ssn3)[0]

print(ssn1, ssn2, ssn3)
last4sscnumber = ssn3
# Boolean
tips_enable = True
mobile = sys.argv[12]
secret_answer = 'TOYOTA'


driver = webdriver.Firefox(
    executable_path='/home/nvdeep/Projects/Fiver/Drivers/geckodriver', options=options, firefox_profile=fp)


def getDisputes(username, password, driver):

    import time
    import json
    from bs4 import BeautifulSoup
    from selenium import webdriver
    from selenium.webdriver.firefox.options import Options
    from rest_framework import status
    options = Options()
    # options = webdriver.ChromeOptions()
    options.add_argument('--disable-gpu')
    # options.add_argument('--headless')
    # driver = webdriver.Firefox(executable_path='/home/nvdeep/Projects/Fiver/Drivers/geckodriver',firefox_options=options)
    # driver = webdriver.Chrome(executable_path='/usr/bin/chromedriver',options=options)

    driver.get(
        'https://service.transunion.com/dss/login.page?dest=dispute')
    time.sleep(5)

    username = username
    password = password

    acc_arr = []
    acc_dict = {}
    finlarr = []

    try:
        driver.find_element_by_xpath(
            '//*[@id="c1527812999683"]/form/div/div/section[2]/div/div/div/div[1]/input').send_keys(username)
        time.sleep(1)
    except:
        pass

    try:
        driver.find_element_by_xpath(
            '//*[@id="c1527812999683"]/form/div/div/section[2]/div/div/div/div[2]/input').send_keys(password)
        time.sleep(1)
    except:
        pass

    try:
        driver.find_element_by_xpath(
            '//*[@id="c1527812999683"]/form/div/div/section[2]/div/div/div/button').click()
        time.sleep(10)
    except:
        pass

    try:
        driver.find_element_by_xpath(
            '//*[@id="bodyContent"]/div/div/div/div/div/div/button').click()
        time.sleep(20)
    except:
        pass

    soup = BeautifulSoup(driver.page_source, u'html.parser')
    # print(soup.text)
    if 'Online dispute currently' in soup.text.strip():
        response = {
            'status': 'error',
            'code': status.HTTP_404_NOT_FOUND,
            'message': 'Online dispute currently not available',
        }
        print(response)
    elif 'account has been temporarily suspended' in soup.text.strip():
        response = {
            'status': 'error',
            'code': status.HTTP_403_FORBIDDEN,
            'message': 'Your account has been temporarily suspended',
        }
        print(response)

    elif 'Unable to Verify' in soup.text.strip():
        response = {
            'status': 'error',
            'code': status.HTTP_401_UNAUTHORIZED,
            'message': 'Unable to Verify Identity',
        }

        print(response)

    else:
        try:
            driver.find_element_by_xpath(
                '//*[@id="startDispute"]/a').click()
            time.sleep(10)
        except:
            pass

        try:
            driver.find_element_by_xpath(
                '//*[@id="disputeRefresh"]/label').click()
        except:
            driver.find_element_by_xpath(
                '/html/body/div[1]/div[2]/form/div[2]/div/section/p[2]/label').click()
        time.sleep(1)

        try:
            driver.find_element_by_id(
                'confirmRefreshButton-startDispute').click()
        except:
            driver.find_element_by_id('Continue').click()

        time.sleep(30)

        soup = BeautifulSoup(driver.page_source, u'html.parser')

        try:
            personal_information = soup.find('section', attrs={'id': 'simple-dispute-pii'}).text.replace(
                '\n', ' ').replace('Delete', ' ').replace('Change', ' ').strip()
        except:
            personal_information = 'none'

        print(personal_information)

        first_dict = {'personal_information': personal_information}
        finlarr.append(first_dict)

        for i in range(50):
            try:
                driver.find_element_by_id('trade-' + str(i)).click()
                time.sleep(2)
                ele = soup.find('td', attrs={'id': 'trade-'+str(i)})

                try:
                    ac_name = ele.text.replace('\n', '')
                except:
                    ac_name = 'none'

                try:
                    ac_no = ele.find_next('td').text.strip()
                except:
                    ac_no = 'none'

                try:
                    bal = ele.find_next('td').find_next('td').text
                except:
                    bal = 'none'

                try:
                    m_pay = ele.find_next('td').find_next(
                        'td').find_next('td').text
                except:
                    m_pay = 'none'

                try:
                    info = ele.find_next('tr').text.replace('\n', ' ')
                except:
                    info = 'none'

            except:
                continue

            acc_dict.update({'Account Name': ac_name, 'Account Number': ac_no,
                             'Balance': bal, 'Monthly Payment': m_pay, 'info': info})
            acc_arr.append(acc_dict)
            acc_dict = {}

        finlarr.append({'account_information': acc_arr})

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

        # import json

        filename = "Transunion_Experion_Report.json"
        print("File_Name--", filename)
        with open(filename, "a+") as f:
            sorted = json.dumps(jsondata, indent=4)
            f.write(sorted)
            print("Json Generated")

        driver.execute_script('window.print();')


def craeteusername(email, ussn):
    usern = email.split('  ')[0]
    userf = usern[:1]
    userl = usern.split(userf)[1]
    lastussn = ussn[-4:]
    username = str(userf)+str(lastussn)+str(userl)
    # username = re.sub('[^A-Za-z0-9\.]+', '', username)
    return username.lower()


def generatepassword(stringLength=10):
    """Generate a random string of fixed length """
    letters = string.ascii_letters + '0123456789_@'
    return ''.join(random.choice(letters) for i in range(stringLength))

def fill_formfields(driver):
                driver.get(
                    'https://dispute.transunion.com/dp/dispute/order.jsp?package=DisputeDisclosureXML')

                secret_question = 'What was the make and model of your first car?'
                secret_answer = "TOYOTA"

                try:
                    driver.find_element_by_name('firstName').send_keys(fname)
                    time.sleep(2)
                except:
                    pass

                # ----------
                try:
                    driver.find_element_by_name('lastName').send_keys(lname)
                    time.sleep(2)
                except:
                    pass

                # ------------------

                try:

                    driver.find_element_by_name(
                        'mailAddress').send_keys(address)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_name('mailCity').send_keys(city)
                    time.sleep(2)
                except:
                    pass

                try:
                    select_box = driver.find_element_by_name(
                        'mailState').send_keys(state)
                    time.sleep(2)
                except:
                    import sys
                    print(sys.exc_info())
                    pass

                try:
                    driver.find_element_by_name(
                        'mailZipCode').send_keys(zipcode)
                    time.sleep(2)
                    driver.find_element_by_name('name').click()
                    time.sleep(8)
                except:
                    pass

                # # Step2 Started---------------------------------------------------------------------------------------------------------------------------------------

                try:
                    driver.find_element_by_name('username').send_keys(username)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_name(
                        'password').send_keys(password)
                    time.sleep(3)
                except:
                    pass

                try:
                    driver.find_element_by_name(
                        'confirmPassword').send_keys(password)
                    time.sleep(3)
                except:
                    pass

                try:
                    select_boxs = driver.find_element_by_name(
                        'secretQuestion').click()
                    time.sleep(5)

                    # select_box = driver.find_element_by_name('secretQuestion')
                    # print(select_box)
                    options = driver.find_elements_by_tag_name('option')
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
                        driver.find_element_by_name(
                            'secretAnswer').send_keys(secret_answer)
                        time.sleep(3)
                    except:
                        pass
                except:
                    pass

                try:
                    driver.find_element_by_name('email').send_keys(email)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_name(
                        'confirmEmail').send_keys(email)
                    time.sleep(2)
                except:
                    pass

                try:
                    dates = str(dobmonth)+'/'+str(dobday)+'/'+str(dobyear)
                    driver.find_element_by_name('yearDOB').send_keys(dates)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSN1').send_keys(ssn1)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSN2').send_keys(ssn2)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSN3').send_keys(ssn3)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSNC1').send_keys(ssn1)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSNC2').send_keys(ssn2)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('SSNC3').send_keys(ssn3)
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_id('checkbox').click()
                    time.sleep(2)
                except:
                    pass

                try:
                    driver.find_element_by_name('agreeCB1').click()
                    time.sleep(2)
                except:
                    pass

                # This is Continue Button
                try:
                    driver.find_element_by_id('continueButton').click()
                    time.sleep(20)
                except:
                    pass

                print('Going To Get Soup')
                print('--'*70)

                soup = BeautifulSoup(driver.page_source, u'html.parser')
                # print(soup.text)
                if 'You Already Have an Account' in soup.text:
                    print('Account Exists Trying To Login')
                    getDisputes(username, password, driver)

                if 'We are unable to confirm your identity' in soup.text.strip():
                    message = soup.text.split('What to do ')[1]
                    print(message)
                    response = {
                        'status': 'error',
                        'code': status.HTTP_401_UNAUTHORIZED,
                        'message': 'Unable to Verify Identity '+str(message),
                    }

                    print(response)

                elif 'account has been temporarily suspended' in soup.text.strip():
                    response = {
                        'status': 'error',
                        'code': status.HTTP_403_FORBIDDEN,
                        'message': 'Your account has been temporarily suspended',
                    }
                    print(response)

                # We are unable to complete your request

                elif 'We are experiencing technical difficulties.' in soup.text.strip():
                    print('We are experiencing technical difficulties')
                    message = 'We appreciate your patience while we resolve this issue. Please try again later or contact us at (833)-395-6940.'
                    print(message)
                    response = {
                        'status': 'error',
                        'code': status.HTTP_401_UNAUTHORIZED,
                        'message': 'We are experiencing technical difficulties. '+str(message),
                    }

                    print(response)

                    # print(soup.text)
                elif 'Online dispute currently' in soup.text.strip():
                    response = {
                        'status': 'error',
                        'code': status.HTTP_404_NOT_FOUND,
                        'message': 'Online dispute currently not available',
                    }
                    print(response)
                elif 'We are unable to complete your request' in soup.text.strip():
                    response = {
                        'status': 'error',
                        'code': status.HTTP_404_NOT_FOUND,
                        'message': 'We are unable to complete your request',
                    }
                    print(response)
            
                else:
                    print('Going To Get Dispute')
                    getDisputes(username,password,driver)
            # print('Registration part 2')


# Trying To Login 
print('Trying To Login ')
driver.get('https://service.transunion.com/dss/login.page?')

time.sleep(10)

uname = driver.find_element_by_name('tl.username')
uname.click()

uname.send_keys(username)

# upass = driver.find_element_by_xpath(
#     '/html/body/div[4]/form/div/div/section[2]/div/div/div/div[2]/input')
upass = driver.find_element_by_name('tl.password')
upass.click()

upass.send_keys(password)
time.sleep(3)
driver.find_element_by_xpath(
    '//*[@id="c1527812999683"]/form/div/div/section[2]/div/div/div/button').click()

time.sleep(30)
soup = BeautifulSoup(driver.page_source, u'html.parser')
msg = soup.find('div', attrs={'class': 'message'}).text.strip()
print(msg)
print('checking ......')
if 'Username or Password Incorrect' in msg:
    print('Username or Password Incorrect: Please Try Again')
    driver.get('https://service.transunion.com/dss/loginHelp1_form.page?')
    time.sleep(10)
    sssn1 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[1]/input')
    sssn1.click()
    sssn1.send_keys(ssn1)
    sssn2 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[2]/input')
    sssn2.click()
    sssn2.send_keys(ssn2)
    sssn3 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div[1]/div[3]/input')
    sssn3.click()
    sssn3.send_keys(ssn3)

    csss1 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[1]/input')
    csss1.click()
    csss1.send_keys(ssn1)
    csss2 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[2]/input')
    csss2.click()
    csss2.send_keys(ssn2)
    csss3 = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[2]/div[1]/div[3]/input')
    csss3.click()
    csss3.send_keys(ssn3)

    lsname = driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[3]/input')
    lsname.click()
    lsname.send_keys(lname)
    driver.find_element_by_xpath(
        '/html/body/div[1]/div[2]/form/div/div/section[2]/div/button').click()
    time.sleep(10)

    if driver.current_url == 'https://service.transunion.com/dss/incorrectInformation.page':
        print('Not A user')
        print("moving to Registration .......")
        
        driver.get('https://service.transunion.com/dss/orderStep1_form.page')
        time.sleep(10)
        soup = BeautifulSoup(driver.page_source, u'html.parser')

        
        username = craeteusername(fname, last4sscnumber)
        # password = generatepassword()
        # passwords = str('password123')

        # address = str(address).replace('_',' ').strip()
        # What was the make and model of your first car?

        secret_question = 'What was the make and model of your first car?'
        secret_answer = "TOYOTA"

        try:
            driver.find_element_by_name('tl.first-name').send_keys(fname)
            time.sleep(2)
        except:
            pass

        # ----------
        try:
            driver.find_element_by_name('tl.last-name').send_keys(lname)
            time.sleep(2)
        except:
            pass

        # ------------------

        try:

            driver.find_element_by_name('tl.curr-street').send_keys(address)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('tl.curr-city').send_keys(city)
            time.sleep(2)
        except:
            pass

        try:
            select_box = driver.find_element_by_name('tl.curr-state')
            driver.find_element_by_name('tl.curr-state').click()
            time.sleep(2)

            for option in select_box.find_elements_by_tag_name('option'):
                if option.get_attribute("value") == state:
                    option.click()  # select() in earlier versions of webdriver
                    break
                    time.sleep(5)
        except:
            import sys
            print(sys.exc_info())
            pass

        try:
            driver.find_element_by_name('tl.curr-zip-code').send_keys(zipcode)
            time.sleep(2)
        except:
            pass

        try:
            if lived_status == True:
                driver.find_element_by_id('residency-yes').click()
                time.sleep(2)
            else:
                driver.find_element_by_id('residency-no').click()
                time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('tl.phone-number').send_keys(mobile)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('tl.email-address').send_keys(email)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('dobMonth').send_keys(dobmonth)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('dobDay').send_keys(dobday)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name('dobYear').send_keys(dobyear)
            time.sleep(2)
        except:
            pass

        try:
            driver.find_element_by_name(
                'tl.last-4-ssn').send_keys(last4sscnumber)
            time.sleep(1)
        except:
            pass

        try:
            if tips_enable == True:
                driver.find_element_by_id('email-opt-in-yes').click()
                time.sleep(1)
            else:
                driver.find_element_by_id('email-opt-in-no').click()
                time.sleep(1)
        except:
            pass

        try:
            driver.find_element_by_xpath(
                '//*[@id="order-form"]/button').click()
            time.sleep(5)
        except:
            pass

        # Step2 Started

        try:
            driver.find_element_by_name('tl.username').send_keys(username)
            time.sleep(1)
        except:
            pass

        try:
            driver.find_element_by_name('tl.password').send_keys(password)
            time.sleep(3)
        except:
            pass

        try:
            driver.find_element_by_name('tl.password2').send_keys(password)
            time.sleep(3)
        except:
            pass

        try:
            select_box = driver.find_element_by_name('tl.secret-question')
            driver.find_element_by_name('tl.secret-question').click()
            time.sleep(1)
            for option in select_box.find_elements_by_tag_name('option'):
                if option.get_attribute("value") == secret_question:
                    option.click()  # select() in earlier versions of webdriver
                    break
                    time.sleep(5)
            try:
                driver.find_element_by_name(
                    'tl.secret-answer').send_keys(secret_answer)
                time.sleep(3)
            except:
                pass
        except:
            pass

        # This is Continue Button
        try:
            driver.find_element_by_xpath(
                '/html/body/div[1]/div[2]/form/div/div/section[2]/div/div[1]/div/button').click()
            time.sleep(3)
        except:
            pass
        # ---------------------------------------------------------------------------------------------------------------------------------------------------------
        print('Waiting For Continue Button You Have 50 Seconds To Click On Continue and fill Questions')

        time.sleep(50)
        
        print('Your Username And Password is')
        print(username)
        print(password)
        
        errorlink = str(driver.current_url)
        print("Current Url -- "+errorlink)
    
        if 'error.page'in errorlink:
            print('Error Occured in Transunion Normal Registration')
            print('Going To New Registrartion Page')
            fill_formfields(driver)
        else:
            print('Going To Get Dispute After Transunion Register 1')
            getDisputes(username, password, driver)
    else:
        time.sleep(10)
        print('next step')
        # step 2

        vquestion = driver.find_element_by_xpath(
            '//*[@id="question"]').get_attribute('value')
        ans = driver.find_element_by_xpath(
            '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[2]/input')
        print(vquestion)
        if 'car' in vquestion:
            ans.click()
            ans.send_keys('TOYOTA')
        elif 'city' in vquestion:
            ans.click()
            ans.send_keys('YEREVAN')
        monthh = driver.find_element_by_xpath(
            '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[1]/input')
        monthh.click()
        monthh.send_keys(dobmonth)
        dayy = driver.find_element_by_xpath(
            '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[2]/input')
        dayy.click()
        dayy.send_keys(dobday)
        yearr = driver.find_element_by_xpath(
            '/html/body/div[1]/div[3]/form/div/div/section[2]/div/div[3]/div[1]/div[3]/input')
        yearr.click()
        yearr.send_keys(dobyear)

        driver.find_element_by_xpath(
            '/html/body/div[1]/div[3]/form/div/div/section[2]/div/button').click()

        time.sleep(10)
        print("Next step")
        # step 3
        soup = BeautifulSoup(driver.page_source, 'html.parser')
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
            vpass = driver.find_element_by_name('tl.password')
            vpass.click()
            vpass.send_keys(password)
            vcpass = driver.find_element_by_name('tl.password2')
            vcpass.click()
            vcpass.send_keys(password)
            vuser = driver.find_element_by_xpath(
                '//*[@id="username"]').get_attribute('value')
            print('Username ~ '+str(vuser))
            print('Password ~ '+str(password))
      # all_script = soup.find('div', attrs={'id': 'c1547224005442'}).find(
      #     'script').text.strip()
      # import pprint
      # pprint.pprint(all_script)
            time.sleep(5)
            try:
                driver.find_element_by_class_name(
                    'form').find_element_by_tag_name('button').click()

                # driver.find_element_by_xpath(
                #     '/html/body/div[7]/form/div/div/section[2]/div/button').click()
            except:
                print('noo')

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
            else:
                print('Loging in....')
                getDisputes(vuser, password, driver)
else:
    print('Going To Get Dispute From fisrt if')
    getDisputes(username, password, driver)
    