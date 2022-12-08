from django.urls import path
from galeri import views

urlpatterns = [
    path('slide/', views.slide, name='slde'),
]