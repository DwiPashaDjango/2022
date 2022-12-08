from django.db import models
from django.contrib.auth.models import AbstractUser
# Create your models here.

class Kelas_Siswa(models.Model):
    kelas = models.CharField(max_length=100)
    def __str__(self) -> str:
        return self.kelas

class User(AbstractUser):
    role = models.CharField(max_length=20)
    kelas = models.ForeignKey(Kelas_Siswa, on_delete=models.CASCADE, null=True)