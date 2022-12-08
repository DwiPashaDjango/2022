from django.urls import path
from django.contrib.auth.views import LogoutView
from login import views

urlpatterns = [
    path('', views.login, name='login'),
    path('logout', LogoutView.as_view(next_page='login'), name='logout'),
]