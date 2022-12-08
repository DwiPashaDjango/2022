from django import forms
from user.models import User

class LoginForm(forms.Form):
    username = forms.CharField(
        widget= forms.TextInput(
            attrs={
                'class': 'input'
            }
        )
    )
    password = forms.CharField(
        widget= forms.PasswordInput(
            attrs={
                'class': 'input'
            }
        )
    )

    class Meta:
        model = User
        fields = '__all__'