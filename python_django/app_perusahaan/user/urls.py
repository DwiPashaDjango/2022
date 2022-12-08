from django.urls import path
from rest_framework.urlpatterns import format_suffix_patterns
from user import views
from user import api_view

urlpatterns = [
    path('hrd/', views.v_hrd, name='v.hrd'),
    path('api/user/', api_view.UserList.as_view()),
]

urlpatterns = format_suffix_patterns(urlpatterns)