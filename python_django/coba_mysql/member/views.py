from django.shortcuts import render
from member.forms import UserForm

# Create your views here.
def index(request):
    form = UserForm()
    return render(request, 'index.html', {'form' : form})

def checkUser(request):
    form = UserForm(request.POST or None)
