from django.db import models

# Create your models here.
class Artikels(models.Model):
    judul = models.CharField(max_length=1000000)
    article = models.CharField(max_length=100000000)
    image = models.ImageField(upload_to='img_article/')
    sub_image = models.ImageField(upload_to='img_article/sub_img_article/', default='0')
    sub_image_2 = models.ImageField(upload_to='img_article/sub_img_article/', default='0')
    sub_image_3 = models.ImageField(upload_to='img_article/sub_img_article/', default='0')
    sub_image_4 = models.ImageField(upload_to='img_article/sub_img_article/', default='0')
    date = models.DateField(auto_now_add=True)

    def __str__(self) -> str:
        return self.judul
