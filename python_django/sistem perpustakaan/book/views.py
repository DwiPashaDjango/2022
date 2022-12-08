from importlib.resources import contents
from django.shortcuts import render, redirect
from book.models import Book, No_Reg, Penerbit, Penulis, Rak_Book, Tema, kelompok_Buku
from book.forms import AddBook, RegForm
from django.contrib import messages
from django.http import JsonResponse, HttpResponse

from book.resource import BukuResource

# Create your views here.
def dashboard(request):
    contex = {
        'jdl' : 'Dashboard',
        'sub' : 'Dashboard'
    }
    return render(request, 'petugas/dashboard.html', contex)


def book(request):
    contex = {
        'jdl' : 'Buku',
        'sub' : 'Buku',
        'data' : No_Reg.objects.all(),
        'form_book' : AddBook(),
        'form_reg' : RegForm(),
    }
    return render(request, 'petugas/buku.html', contex)

def checkBook(request):
    if request.method == 'POST':
        form = AddBook(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            messages.success(request, 'Succesfully adding book')
            return redirect('book')
        else:
            messages.error(request, 'Error adding book')
            return redirect('book')
    else:
        form = AddBook()

def checkReg(request):
    if request.method == 'POST':
        form = RegForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Berhasil registrasi buku')
            return redirect('book')
        else:
            messages.error(request, 'Gagal registrasi buku')
            return redirect('book')
    else:
        form = RegForm()

def updateBook(request, pk):
    data = Book.objects.get(id=pk)
    form = AddBook(instance=data)
    if request.method == 'POST':
        form = AddBook(request.POST, request.FILES, instance=data)
        if form.is_valid():
            form.save()
            return redirect('post.update', pk=pk)
        else:
            return redirect('post.update', pk=pk)
    else:
        contex = {
            'jdl' : 'Update Buku',
            'sub' : 'Update Buku',
            'data' : data,
            'form' : form
        }
    return render(request, 'petugas/ubah.html', contex)

def deleteBook(request, pk):
    data = No_Reg.objects.get(id=pk)
    data.delete()
    messages.success(request, 'Berhasil Menghapus Buku')
    return redirect('book')

def laporan(request):
    contex = {
        'jdl' : 'Laporan',
        'sub' : 'Unduh Laporan'
    }
    return render(request, 'petugas/laporan.html', contex)

def exportBuku(request):
    buku = BukuResource()
    data = buku.export()
    response = HttpResponse(data.xls, content_type='application/vnd.ms-excel')
    response['Content-Disposition'] = 'attachment; filename="laporan data buku.xls"'
    return response
