from django.urls import path
from artikels_api import views
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('artikels/', views.ArtikelsList.as_view()),
    path('artikels/<int:pk>', views.ArtikelsDetails.as_view()),
] 
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL,
                          document_root=settings.MEDIA_ROOT)