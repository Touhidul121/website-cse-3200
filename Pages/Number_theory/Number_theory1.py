from bs4 import BeautifulSoup
import requests
import mysql.connector
mydb = mysql.connector.connect(host='localhost',user='root',passwd='',database='website')
mycursor = mydb.cursor()
url = 'https://codeforces.com/problemset?tags=number%20theory'
r = requests.get(url)
a = r.content
soup = BeautifulSoup(a, 'html.parser')

obj = soup.find_all('tr')

ex = 0
l = 0
for i in obj:

    obj1 = i.find_all('a')
    
    prob_name = ""
    if ex>0:
        k=0
        for j in obj1:
            if k%2==1:
                prob_name=j.text

            k=k+1
            if k>=2:break
    if l>=10:break
    link = 'https://codeforces.com'
    link += i.find('a')['href']
    print(prob_name, link)
    if l>0:
        mycursor.execute("INSERT INTO Number_theory(Name, Link) VALUES(%s,%s)", (prob_name, link))
        mydb.commit()
    #print("Problem_link",link)
    ex=ex+1
    l+=1





