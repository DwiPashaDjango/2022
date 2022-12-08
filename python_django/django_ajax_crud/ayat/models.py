from django.db import models

# Create your models here.
class Doa(models.Model):
    doa = models.CharField(max_length=100)
    ayat = models.CharField(max_length=100)
    latin = models.CharField(max_length=100, null=True)
    artinya = models.CharField(max_length=1000)