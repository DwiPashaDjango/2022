from django.db import models

# Create your models here.
class CategoryBook(models.Model):
    kelompok_book = models.CharField(max_length=100)

    def __str__(self) -> str:
        return self.kelompok_book

class Book(models.Model):
    judul = models.CharField(max_length=100)
    penulis = models.CharField(max_length=100)
    penerbit = models.CharField(max_length=100)
    tgl_upload = models.DateField(auto_now_add=True)
    image = models.ImageField(upload_to="book/")
    kelompok_id = models.ForeignKey(CategoryBook, on_delete=models.CASCADE, null=True)
    file = models.FileField(upload_to='file_book/', null=True)

    def __str__(self) -> str:
        return self.judul