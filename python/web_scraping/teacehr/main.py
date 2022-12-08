import requests
from bs4 import BeautifulSoup

url = requests.get('https://sp.datadik.kemdikbud.go.id/app/')
# print(url.content)
page = BeautifulSoup(url.content, 'html.parser')
print(page.prettify())