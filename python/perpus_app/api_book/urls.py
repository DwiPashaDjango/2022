from django.urls import path
from api_book import views

urlpatterns = [
    path('', views.ApiOverview),
    path('create', views.post_book_api),
    path('book', views.view_book_api),
    path('update/<str:pk>', views.update_api_book),
]