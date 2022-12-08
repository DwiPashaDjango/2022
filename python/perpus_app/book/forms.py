from django import forms
from book.models import Book, CategoryBook

class BookStoreForm(forms.ModelForm):
    class Meta:
        model = Book
        fields = ('judul', 'penulis', 'penerbit', 'kelompok_id', 'image', 'file')

        widgets = {
            'judul' : forms.TextInput({
                'class' : 'form-control', 'autocomplete' : 'off', 
            }),
            'penulis' : forms.TextInput({
                'class' : 'form-control', 'autocomplete' : 'off'
            }),
            'penerbit' : forms.TextInput({
                'class' : 'form-control', 'autocomplete' : 'off'
            }),
            'kelompok_id' : forms.Select({
                'class' : 'form-control'
            }),
            'file' : forms.ClearableFileInput({
                'class' : 'form-control'
            }),
            'image' : forms.ClearableFileInput({
                'class' : 'form-control'
            })
        }

class CategoryBookForm(forms.ModelForm):
    class Meta:
        model = CategoryBook
        fields = ('kelompok_book',)

        widgets = {
            'kelompok_book' : forms.TextInput({
                'class' : 'form-control', 'autocomplete' : 'off'
            })
        }

