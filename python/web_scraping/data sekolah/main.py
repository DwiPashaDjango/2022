import requests
from bs4 import BeautifulSoup
import csv

url = 'https://sp.datadik.kemdikbud.go.id/ref/wilayah/021700?_s=3cc2bdad587e4275bf5773b673268702'

headers = {
    'User-Agent' : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36'
}

req = requests.get(url, headers=headers)
soup = BeautifulSoup(req.text, 'html.parser')
item = soup.find_all('select', 'select form-control')

for it in item:
    skl = it.find('option', 'value')
    print(skl)