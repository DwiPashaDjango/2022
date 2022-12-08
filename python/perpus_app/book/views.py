from django.shortcuts import redirect, render
from book.forms import BookStoreForm, CategoryBookForm
from book.models import Book
from django.http import HttpResponse, JsonResponse
from django.contrib import messages

from book.resource import BookResource

# Create your views here.

def databuku(request):
    data = Book.objects.all()
    form = BookStoreForm()
    form_category = CategoryBookForm()
    context = {
        'jdl' : 'Data Buku',
        'data' : data,
        'form' : form,
        'form_category' : form_category
    }
    return render(request, 'admin/databuku.html', context)

def storeBook(request):
    if request.method == 'POST':
        form = BookStoreForm(request.POST, request.FILES)
        if form.is_valid():
            form.save()
            return JsonResponse({'error': False, 'message': 'Berhasil Mengupload Buku'})
        else:
            return JsonResponse({'error': True, 'errors': form.errors})
    else:
        form = BookStoreForm()

def showBook(request, pk):
    data = Book.objects.get(id=pk)
    context = {
        'jdl' : 'Detail Buku',
        'data' : data
    }
    return render(request, 'admin/show_buku.html', context)

def exportBook(request):
    book = BookResource()
    data = book.export()
    response = HttpResponse(data.xls, content_type='application/vnd.ms-excel')
    response['Content-Disposition'] = 'attachment; filename="Laporan DataBuku.xls"'
    return response

def hapusBuku(request, pk):
    data = Book.objects.get(id=pk)
    data.delete()
    
    messages.success(request, 'Berhasil Menghapus Buku')
    return redirect('databuku')