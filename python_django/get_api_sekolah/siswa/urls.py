from django.urls import path
from siswa import views

urlpatterns =[
    path('siswa/', views.index, name='siswa.index'),
    path('siswa/add', views.addSiswa, name='add.index'),
]