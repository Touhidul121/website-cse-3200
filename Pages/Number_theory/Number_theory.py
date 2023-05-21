import mysql.connector

from bs4 import BeautifulSoup
import requests


mydb = mysql.connector.connect(host='localhost',user='root',passwd='',database='website')
mycursor = mydb.cursor()

#mycursor.execute("create table Number_theory (Name varchar(100),Link varchar(200))")


from bs4 import BeautifulSoup
import requests

url = 'https://lightoj.com/problems/category/number-theory'
r = requests.get(url)
a = r.content
soup = BeautifulSoup(a, 'html.parser')

obj = soup.find_all('div', class_ = 'page-block transition-block has-hover-shadow')

j=0
for i in obj:
    if j>=10:break
    prob_name = i.find('a').span.text
    print(prob_name)
    prob_link = 'https://lightoj.com';
    prob_link+= i.find('a')['href']
    print(prob_link)
    print("----------")
    mycursor.execute("INSERT INTO Number_theory(Name, Link) VALUES(%s,%s)", (prob_name, prob_link))
    mydb.commit()
    j+=1






