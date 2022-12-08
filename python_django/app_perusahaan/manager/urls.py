from django.urls import path
from manager import views

urlpatterns = [
    path('dashboard/', views.v_manager, name='v.manager'),
    path('dashboard/add/', views.add_krywn, name='v.add'),
    path('dashboard/add/check/', views.add_krywn, name='v.check'),
]
