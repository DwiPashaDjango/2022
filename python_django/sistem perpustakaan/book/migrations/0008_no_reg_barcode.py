# Generated by Django 3.2.15 on 2022-08-31 15:32

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0007_no_reg_book'),
    ]

    operations = [
        migrations.AddField(
            model_name='no_reg',
            name='barcode',
            field=models.ImageField(null=True, upload_to='barcode_books/'),
        ),
    ]
