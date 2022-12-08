from django import forms
from book.models import *

class RegForm(forms.ModelForm):
    class Meta:
        model = No_Reg
        fields = ['no', 'book']

        widgets = {
            'no' : forms.NumberInput(
                attrs={
                    'class' : 'form-control'
                },
            ),
            'book' : forms.Select(
                attrs={
                    'class' : 'form-control'
                }
            )
        }

class AddBook(forms.ModelForm):
    class Meta:
        model = Book
        fields = '__all__'

        widgets = {
            'judul' : forms.TextInput(
                attrs={
                    'class' : 'form-control'
                }
            ),
            'penulis_buku' : forms.Select(
               attrs={
                    'class' : 'form-control'
               }
            ),
            'penerbit_buku' : forms.Select(
               attrs={
                    'class' : 'form-control'
               }
            ),
            'tema' : forms.Select(
               attrs={
                    'class' : 'form-control'
               }
            ),
            'kelompok_buku' : forms.Select(
               attrs={
                    'class' : 'form-control'
               }
            ),
            'Rak_buku' : forms.Select(
               attrs={
                    'class' : 'form-control'
               }
            ),
            'image' : forms.FileInput(
                attrs={
                    'class' : 'form-control'
                }
            ),
        }