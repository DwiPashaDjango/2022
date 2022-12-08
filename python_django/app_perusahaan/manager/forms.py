from django import forms
from user.models import User
from django.contrib.auth.forms import UserCreationForm

class RegisForm(UserCreationForm):
    class Meta:
        model = User
        fields = '__all__'