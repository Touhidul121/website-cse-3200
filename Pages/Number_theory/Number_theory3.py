from bs4 import BeautifulSoup
import requests
import mysql.connector
mydb = mysql.connector.connect(host='localhost',user='root',passwd='',database='website')
mycursor = mydb.cursor()
url = 'https://onlinejudge.org/index.php?option=com_onlinejudge&Itemid=8&category=162'
r = requests.get(url)
a = r.content
soup = BeautifulSoup(a, 'html.parser')

obj = soup.find_all('tr',class_ = 'sectiontableentry1')
for i in obj:
    j = i.find('a')
    str = j.text
    lnk='https://onlinejudge.org/'
    lnk+=j['href']
    str1 = ''
    f = False
    for ch in str:
        if (ch.isupper()):
            f = True
        if f:
            str1+=ch
    print(str1)
    print(lnk)
    print("----------")
    #mycursor.execute("INSERT INTO Number_theory(Name, Link) VALUES(%s,%s)", (str1, lnk))
    #mydb.commit()
obj = soup.find_all('tr',class_ = 'sectiontableentry2')
for i in obj:
    j = i.find('a')
    str = j.text
    lnk='https://onlinejudge.org/'
    lnk+=j['href']
    str1 = ''
    f = False
    for ch in str:
        if (ch.isupper()):
            f = True
        if f:
            str1+=ch
    print(str1)
    print(lnk)
    print("----------")
    #mycursor.execute("INSERT INTO Number_theory(Name, Link) VALUES(%s,%s)", (str1, lnk))
    #mydb.commit()


