from django.urls import path
from book import views

urlpatterns = [
    path('', views.dashboard, name='dsb'),
    path('buku/', views.book, name='book'),
    path('buku/post/', views.checkBook, name='post.book'),
    path('buku/reg/', views.checkReg, name='post.reg'),
    path('buku/update/<int:pk>', views.updateBook, name='post.update'),
    path('buku/destroy/<int:pk>', views.deleteBook, name='post.destroy'),
    path('laporan/', views.laporan, name='laporan.petugas'),
    path('laporan/excel/', views.exportBuku, name='laporan.excel'),
]