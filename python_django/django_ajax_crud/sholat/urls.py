from django.urls import path
from sholat import views

urlpatterns = [
    path('kota/', views.kotaList.as_view()),
    path('kota/<int:pk>/', views.KotaDetail.as_view()),
]