from django.db import models

# Create your models here.
class Kota(models.Model):
    kota = models.CharField(max_length=100)

class JadwalSholat(models.Model):
    kota_id = models.ForeignKey(Kota, on_delete=models.CASCADE, related_name='jadwal')
    shubuh = models.TimeField()
    terbit = models.TimeField()
    dhuha = models.TimeField()
    dzuhur = models.TimeField()
    ashr = models.TimeField()
    magrib = models.TimeField()
    isya = models.TimeField()
    imsak = models.TimeField()
    tanggal = models.DateField()

    class Meta:
        unique_together = ['kota_id']
        ordering = ['kota_id']

    def __str__(self):
        return '%d: %s' % (self.kota_id)