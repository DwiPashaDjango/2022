from django.shortcuts import render
import requests
# Create your views here.
def index(request):
    return render(request, 'siswa/index.html')

def addSiswa(request):
    return render(request, 'siswa/add.html')