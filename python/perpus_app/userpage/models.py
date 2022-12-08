from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here

class Kelas(models.Model):
    kelas = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.kelas

class User(AbstractUser):
    full_name = models.CharField(max_length=100)
    role = models.CharField(max_length=40)
    jabatan = models.CharField(max_length=100, default='null', null=True)
    kelas_id = models.ForeignKey(Kelas, on_delete=models.CASCADE, null=True)

    def __str__(self) -> str:
        return self.username