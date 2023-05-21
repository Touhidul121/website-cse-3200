import mysql.connector

from bs4 import BeautifulSoup
import requests


#mydb = mysql.connector.connect(host='localhost',user='root',passwd='',database='website')
#mycursor = mydb.cursor()

#mycursor.execute("create table Number_theory (Name varchar(100),Link varchar(200))")


from bs4 import BeautifulSoup
import requests

url = 'https://www.hackerearth.com/practice/math/number-theory/basic-number-theory-1/practice-problems/'
r = requests.get(url)
a = r.content
soup = BeautifulSoup(a, 'html.parser')

obj = soup.find_all('li',class_ = 'prob')
cnt=0
for i in obj:
    j = i.find('a')
    print(j.text)
    print(j['href'])
    #print(i['a'])
    print("----------")
    if cnt>=10:break
   # mycursor.execute("INSERT INTO Number_theory(Name, Link) VALUES(%s,%s)", (j.text, j['href']))
    #mydb.commit()
    cnt+=1

print(obj)