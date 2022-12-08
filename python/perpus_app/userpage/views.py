from django.shortcuts import redirect, render
from userpage.forms import TambahKelasForm, TambahSiswaForm, TambahGuruForm
from userpage.models import User
from django.http import HttpResponse, JsonResponse
from django.contrib import messages
from userpage.resource import GuruResource, UserResource

# Create your views here.
def dashboard(request):
    context = {
        'jdl' : 'Dashboard'
    }
    return render(request, 'admin/dashboard.html', context)

def profile(request):
    context = {
        'jdl' : 'Profile',
    }
    return render(request, 'admin/profile_admin.html', context)

def datasiswa(request):
    form = TambahSiswaForm
    form_kelas = TambahKelasForm
    data = User.objects.filter(role='siswa')
    context = {
        'jdl' : 'Data Siswa',
        'form' : form,
        'data' : data,
        'form_kelas' : form_kelas
    }
    return render(request, 'admin/data_siswa.html', context)


def storeSiswa(request):
    if request.method == 'POST':
        form = TambahSiswaForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Berhasil Menambahkan User')
            return redirect('dtsw')
        else:
            messages.error(request, 'Silahkan isi form dengan benar')
            return redirect('dtsw')
    else:
        form = TambahSiswaForm()
        

def show_siswa(request, pk):
    data = User.objects.get(id=pk)
    context = {
        'data' : data,
        'jdl' : 'Detail User'
    }
    return render(request, 'admin/show_siswa.html',context)


def deleteSiswa(request, pk):
    data = User.objects.filter(id=pk)
    data.delete()

    messages.success(request, 'Berhasil Menghapus User')
    return redirect('dtsw')

def storeKelas(request):
    if request.method == 'POST':
        form = TambahKelasForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Berhasil Menambahkan Kelas')
            return redirect('dtsw')
        else:
            messages.error(request, 'Gagal Menambahkan Kelas')
            return redirect('dtsw')
    else:
        form = TambahKelasForm()

def exportUser(request):
    qrst = User.objects.filter(role='siswa')
    user = UserResource()
    data = user.export(qrst)
    response = HttpResponse(data.xls, content_type='application/vnd.ms-excel')
    response['Content-Disposition'] = 'attachment; filename="Laporan Datauser.xls"'
    return response

def print(request):
    data = User.objects.filter(role='siswa')
    context = {
        'data' : data
    }
    return render(request, 'admin/print.html', context)

def dataGuru(request):
    data = User.objects.filter(role='admin')
    data_pns = User.objects.filter(jabatan='PNS')
    data_pppk = User.objects.filter(jabatan='PPPK')
    data_honor = User.objects.filter(jabatan='Honor')
    form = TambahGuruForm()
    context = {
        'jdl' : 'Data Guru',
        'data' : data,
        'data_pns' : data_pns,
        'data_pppk' : data_pppk,
        'data_honor' : data_honor,
        'form' : form
    }
    return render(request, 'admin/data_guru.html', context)

def show_guru(request, pk):
    data = User.objects.get(id=pk)
    context = {
        'jdl' : 'Detail Guru',
        'data' : data
    }
    return render(request, 'admin/show_guru.html', context)

def exportGuru(request):
    qrst = User.objects.filter(role='admin')
    user = GuruResource()
    data = user.export(qrst)
    response = HttpResponse(data.xls, content_type='application/vnd.ms-excel')
    response['Content-Disposition'] = 'attachment; filename="Laporan Guru.xls"'
    return response

def printGuru(request):
    data = User.objects.filter(role='admin')
    context = {
        'data' : data
    }
    return render(request, 'admin/print_guru.html', context)


def storeGuru(request):
    if request.method == 'POST':
        form = TambahGuruForm(request.POST)
        if form.is_valid():
            form.save()
            return JsonResponse({'error': False, 'message': 'Berhasil Menambahkan Guru'})
        else:
            return JsonResponse({'error': True, 'errors': form.errors})
    else:
        form = TambahGuruForm()