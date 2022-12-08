from django.urls import path
from guru import views

urlpatterns = [
    path('GTK/', views.index, name='guru.index'),
]