from django.urls import path
from userpage import views

urlpatterns = [
   path('dashboard/', views.dashboard, name='dsbrd'),
   path('profile/', views.profile, name='profile'),
   path('datasiswa/', views.datasiswa, name='dtsw'),
   path('storeUser/', views.storeSiswa, name='strS'),
   path('show_siswa/<str:pk>', views.show_siswa, name='show_siswa'),
   path('destroySiswa/<str:pk>', views.deleteSiswa, name='dltS'),
   path('storeKelas/', views.storeKelas, name='strK'),
   path('exportUser/', views.exportUser, name='exprtU'),
   path('print', views.print, name='print'),
   path('dataguru/', views.dataGuru, name='dtgru'),
   path('exportGuru', views.exportGuru, name='exprtGuru'),
   path('showGuru/<str:pk>', views.show_guru, name='showGuru'),
   path('printGuru', views.printGuru, name='printGuru'),
   path('storeGuru', views.storeGuru, name='storeGuru')
]
