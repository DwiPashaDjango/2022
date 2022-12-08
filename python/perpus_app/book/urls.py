from django.urls import path
from book import views

urlpatterns = [
    path('databuku/', views.databuku, name='databuku'),
    path('storeBook/', views.storeBook, name='storeBook'),
    path('showBook/<str:pk>', views.showBook, name='showbook'),
    path('exportBook', views.exportBook, name='exportBook'),
    path('deleteBook/<str:pk>', views.hapusBuku, name='deleteBook')
]