from django import forms
from django.contrib.auth.forms import UserCreationForm
from userpage.models import Kelas, User

class TambahSiswaForm(UserCreationForm):
    username = forms.CharField(
        required=True, disabled=False,
        widget= forms.NumberInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    email = forms.CharField(
        required=True, 
        widget= forms.EmailInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    full_name = forms.CharField(
        required=True,
        widget= forms.TextInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    password1 = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    password2 = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )

    class Meta:
        model = User
        fields = ('username', 'full_name', 'email', 'password1', 'password2', 'kelas_id' ,'role')

class TambahKelasForm(forms.ModelForm):
    kelas = forms.CharField(
        widget= forms.TextInput(
            attrs={
                'class' : 'form-control'
            }
        )
    )
    class Meta:
        model = Kelas
        fields = ('kelas',)

class TambahGuruForm(UserCreationForm):
    username = forms.CharField(
        required=True, disabled=False,
        widget= forms.NumberInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    email = forms.CharField(
        required=True, 
        widget= forms.EmailInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    full_name = forms.CharField(
        required=True,
        widget= forms.TextInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    jabatan = forms.CharField(
        required=True,
        widget= forms.TextInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    password1 = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )
    password2 = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                'class' : 'form-control', 'autocomplete' : 'off'
            }
        )
    )

    class Meta:
        model = User
        fields = ('username', 'full_name', 'email', 'password1', 'password2', 'kelas_id' ,'role', 'jabatan')