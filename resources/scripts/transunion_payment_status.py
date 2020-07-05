import requests
from bs4 import BeautifulSoup
import xlwt
import xlrd, json
import time,sys
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import os
from os import path
import datetime

options = webdriver.FirefoxOptions()
options.add_argument("--disable-gpu")
fp = webdriver.FirefoxProfile()
# 0 means to download to the desktop, 1 means to download to the default "Downloads" directory, 2 means to use the directory
fp.set_preference("browser.download.folderList", 1)
fp.set_preference("browser.helperApps.alwaysAsk.force", False)
fp.set_preference("print.always_print_silent", True)
fp.set_preference("Save as PDF", True)
fp.set_preference("print save as pdf", True)
fp.set_preference("browser.download.manager.showWhenStarting", False)

username = sys.argv[1]
password = sys.argv[2]
db_id = sys.argv[3]
# Save All json files in following directory with user specific folder
json_directory = '../storage/reports/' + db_id + '/transunion_payments'

# create directory if not exist
if not os.path.exists(json_directory):
    os.makedirs(json_directory)

account_arr = []
payments_arr = []
# options.add_argument('--headless')
driver = webdriver.Firefox(
    executable_path="/home/collab015/Documents/bcf/final_version/geckodriver", options=options, firefox_profile=fp
)
driver.get("https://membership.tui.transunion.com/tucm/login.page")

username_field = driver.find_element_by_xpath(
    '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/div[1]/input'
)
username_field.send_keys(username)
time.sleep(1)
password_field = driver.find_element_by_xpath(
    '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/div[2]/input'
)
password_field.send_keys(password)
time.sleep(1)
driver.find_element_by_xpath(
    '//*[@id="c1354063416773"]/form/div/div/section[3]/div/div[1]/div/button'
).click()
time.sleep(5)

# Clicked The Continue Button
try:
    driver.find_element_by_xpath(
        '//*[@id="bodyContent"]/div/div[2]/div/div/div[2]/div[1]/button'
    ).click()
    time.sleep(25)
    driver.find_element_by_xpath('/html/body/div[6]/form/div[2]/div/div[2]/div/a').click()
    time.sleep(3)
except:
    pass

try:
    driver.find_elements_by_class_name('dontShow floaterLink modal-action-alt').click()
    time.sleep(3)
except:
    pass

# Refresh Now Button Click
try:
    driver.find_element_by_xpath('//*[@id="dashboard-tools"]/div[2]/div[1]/div/a[1]').click()
    time.sleep(15)
    driver.find_element_by_id('confirmRefreshconfirmRefresh').click()
    time.sleep(1)

    driver.find_element_by_id('confirmRefreshButton').click()
    time.sleep(60)
except:
    print(sys.exc_info())
    pass

try:
    driver.find_element_by_xpath('/html/body/div[1]/div[2]/form/div/div/section[3]/div/div/button').click()
    time.sleep(15)
except:
    passf




# Hitting Credit Report Page
driver.get("https://membership.tui.transunion.com/tucm/creditReport_TUCM.page?")

# Clicking on Each Report to Expand
# Real Estate
try:
    driver.find_element_by_xpath(
        '//*[@id="CR-Accounts-RealEstate"]/div/div[2]/div[1]/div[1]'
    ).click()
    time.sleep(2)
except:
    pass

# Credit Revolving Reports
for e in range(30):
    try:
        element = (
            '//*[@id="CR-Accounts-CreditRevolving"]/div/div[2]/div['
            + str(e)
            + "]/div[1]/div"
        )
        # print(element)
        driver.find_element_by_xpath(element).click()
        time.sleep(2)
    except:
        pass

# Cr Installments
for e in range(30):
    try:
        element = (
            '//*[@id="CR-Accounts-Installment"]/div/div[2]/div['
            + str(e)
            + "]/div[1]/div"
        )
        # print(element)
        driver.find_element_by_xpath(element).click()
        time.sleep(2)
        print("--" * 30)

    except:
        pass


driver.execute_script('window.print();')
# Waiting for pdf Saving
time.sleep(60)

# --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# Clicking For Payment Status
# ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

# Loading For Payments
driver.get("https://membership.tui.transunion.com/tucm/creditReport_TUCM.page?")
time.sleep(5)
print('Reload Done For Payments')
try:
    driver.find_element_by_xpath(
        '//*[@id="CR-Accounts-RealEstate"]/div/div[2]/div[1]'
    ).click()
    time.sleep(2)

    # Payment Status Click
    driver.find_element_by_xpath('//*[@id="CR-Accounts-RealEstate"]/div/div[2]/div[2]/div/div/div[1]/div[2]').click()
    # driver.find_elements_by_xpath('//*[@id="CR-Accounts-RealEstate"]/div/div[2]/div[2]/div/div/div[3]/div[2]/a').click()
    driver.find_element_by_link_text("Expand All").click()
    print('Clicked Expand')
except:
    pass

# Credit Revolving Reports
for e in range(30):
    try:
        # //*[@id="CR-Accounts-CreditRevolving"]/div/div[2]/div[4]/div/div/div[1]/div[2]
        element = (
            '//*[@id="CR-Accounts-CreditRevolving"]/div/div[2]/div['
            + str(e)
            + "]"
        )
        # print(element)
        driver.find_element_by_xpath(element).click()
        time.sleep(2)
        # Expand Button

        ps_button = '//*[@id="CR-Accounts-CreditRevolving"]/div/div[2]/div['+str(e)+']/div/div/div[1]/div[2]'
        driver.find_element_by_xpath(ps_button).click()
        driver.find_element_by_link_text("Expand All").click()
        print('Clicked Expand')
    except:
        pass

# Cr Installments
for e in range(30):
    try:
        element = (
            '//*[@id="CR-Accounts-Installment"]/div/div[2]/div['
            + str(e)
            + "]"
        )
        # print(element)
        driver.find_element_by_xpath(element).click()
        time.sleep(2)

        ps_button = '//*[@id="CR-Accounts-Installment"]/div/div[2]/div['+str(e)+']/div/div/div[1]/div[2]'
        driver.find_element_by_xpath(ps_button).click()
        # driver.find_element_by_link_text("Payment Status").click()
        driver.find_element_by_link_text("Expand All").click()
        print('Clicked Expand')
    except:
        pass

print("--" * 50)
time.sleep(3)
soup = BeautifulSoup(driver.page_source, u"html.parser")
# divs = soup.findAll("div", attrs={"class": "report-account-table"})
# print(divs)

# for d in divs:
#     try:
#         report_name = d["data-selenium"]
#         report_name = str(report_name).split("-")[-1].strip()
#         # a_dict.update({"report_name": report_name})
#     except:
#         report_name = "None"

#     print("Rep-->", report_name)
#     cells = d.find_next("div", attrs={"class": "tbody"}).findAll(
#         "div", attrs={"class": "frow report-row"}
#     )

#     for row in cells:
#         try:
#             keys = row.find("div", attrs={"class": "fhcell"}).text.strip()
#         except:
#             keys = "None"

#         try:
#             values = row.find(
#                 "div", attrs={"class": "tu-cell fcell dispute-cell"}
#             ).text.strip()
#         except:
#             values = "None"


#         p_dict = {"report": report_name, keys: values}

#         print(p_dict)
#         payments_arr.append(p_dict)


all_scripts = soup.find('script',attrs={'id':'UserData'})
all_scripts = str(all_scripts).split(' var ud = ')[1].split('</script>')[0].strip().replace('/n','')
all_scripts = all_scripts.replace('/','').strip()

jsondata = json.loads(all_scripts)


filename = datetime.datetime.now().strftime('%Y_%m_%d_%H_%M_%S') + '.json'
print("File_Name--", filename)
with open(json_directory + '/'+ filename, "a+") as f:
    sorted = json.dumps(jsondata, indent=4)
    f.write(sorted)
    print("Json Generated")

driver.execute_script('window.print();')
