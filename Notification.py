from bs4 import BeautifulSoup
import requests

url = 'https://codeforces.com/contests'
r = requests.get(url)
a = r.content
soup = BeautifulSoup(a, 'html.parser')

obj = soup.find_all('tr')

ex = 0
for i in obj:

    obj1 = i.find_all('td')
    cnt=0
    for j in obj1:
        if(cnt==0):
            print("Contest: ",j.text)
        elif(cnt==2):
            print("Contest Date and Time: ",j.text)
        elif(cnt==3):
            print("Duration: ",j.text)  
        cnt+=1
    print("----------------------")

    if(ex>=4):break
    ex+=1
            




