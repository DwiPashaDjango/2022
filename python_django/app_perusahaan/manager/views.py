import re
from django.shortcuts import redirect, render
from django.contrib.auth.decorators import permission_required, login_required
from django.views import View
from manager.forms import RegisForm
from user.models import User, Jenis
from django.http import HttpResponseBadRequest, JsonResponse
from user.forms import UserForm

# Create your views here.
@login_required(login_url="login")
def v_manager(request):
    return render(request, 'manager/index.html')


def add_krywn(request):
    data = Jenis.objects.all()
    return render(request, 'manager/add.html', {'data': data})

def regis(request):
    if request.method == 'POST':
        form = RegisForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('v.add')
        else:
            return redirect('v.add')
    else:
        form = RegisForm()