from django.urls import path
from ayat import views

urlpatterns = [
    path('doa/', views.DoaList.as_view()),
    path('doa/<int:pk>/', views.DoaDetail.as_view()),
]