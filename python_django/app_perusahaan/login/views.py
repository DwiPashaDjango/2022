from django.shortcuts import render, redirect
from django.contrib.auth import authenticate, login as auth_login
from django.contrib import messages
from login.forms import LoginForm

# Create your views here.
def login(request):
    form = LoginForm(request.POST or None)
    if request.method == 'POST':
        if form.is_valid():
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password')
            user = authenticate(username=username, password=password)

            if user is not None and user.level == "manager":
                auth_login(request, user)
                return redirect('v.manager')
            elif user is not None and user.level == "hrd":
                auth_login(request, user)
                return redirect('v.hrd')
            else:
                messages.error(request, 'Akun Tidak Terdaftar!')
                return redirect('login')
        else:
            messages.error(request, 'Validasi Akun Erorr')
    return render(request, 'login/index.html', {'form': form})