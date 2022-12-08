from django.db import models
import barcode
from barcode.writer import ImageWriter
from io import BytesIO
from django.core.files import File

# Create your models here.
class Rak_Book(models.Model):
    rak = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.rak


class Penerbit(models.Model):
    penerbit = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.penerbit

class Penulis(models.Model):
    penluis = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.penluis 

class Tema(models.Model):
    tema = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.tema

class kelompok_Buku(models.Model):
    kelompok = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.kelompok


class Book(models.Model):
    judul = models.CharField(max_length=100)
    penulis_buku = models.ForeignKey(Penulis, on_delete=models.CASCADE)
    penerbit_buku = models.ForeignKey(Penerbit, on_delete=models.CASCADE)
    tema = models.ForeignKey(Tema, on_delete=models.CASCADE)
    kelompok_buku = models.ForeignKey(kelompok_Buku, on_delete=models.CASCADE)
    Rak_buku = models.ForeignKey(Rak_Book, on_delete=models.CASCADE)  
    image = models.ImageField(upload_to='book_pics/')  
    created_at = models.DateField(auto_now_add=True)

    def __str__(self) -> str:
        return self.judul

class No_Reg(models.Model):
    no = models.CharField(max_length=100)
    book = models.ForeignKey(Book, on_delete=models.CASCADE, null=True)
    barcode = models.ImageField(upload_to='barcode_books/', null=True, blank=True)

    def __str__(self) -> str:
        return str(self.no)

    def save(self, *args, **kwargs):
        EAN = barcode.get_barcode('ean13')
        ean = EAN(f'{self.no}2452022{self.book.id}', writer=ImageWriter())
        buffer = BytesIO()
        ean.write(buffer)
        self.barcode.save(f"{self.no}.png", File(buffer), save=False)
        return super().save(*args, **kwargs)