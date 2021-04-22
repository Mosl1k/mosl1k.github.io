from bs4 import BeautifulSoup
import requests,os,time

url = 'http://3k.mail.ru/effect_info.php?nick=%C4%E6%E0 4-20'
#url = 'http://3k.mail.ru/effect_info.php?nick=%D1%81%D0%B0%D0%BD%D1%81%D0%B0%D0%BD'


while 1:
    page = requests.get(url)
#print(page.status_code)
    news = []
    soup = BeautifulSoup(page.text, "html.parser")
    news = soup.findAll('a', style="color: #666666")
 #   print(news)
    if news == []:
        print("no")
        time.sleep(30)
    else:
        print("yes")
        os.system("tow.cms")
        time.sleep(30)
