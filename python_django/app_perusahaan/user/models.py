from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here.

class Jenis(models.Model):
    jenis = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.jenis

class User(AbstractUser):
    level = models.CharField(max_length=100)
    tgl_lahir = models.DateField(null=True)
    tempat_lahir = models.CharField(max_length=100, null=True)
    umur = models.CharField(max_length=50)
    jns_krywn = models.ForeignKey(Jenis, on_delete=models.CASCADE, null=True)
    image = models.ImageField(upload_to='media/user_pics/', default='default.png', null=True)
