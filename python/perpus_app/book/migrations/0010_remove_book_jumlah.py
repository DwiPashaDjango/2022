# Generated by Django 3.2.14 on 2022-08-01 03:37

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0009_book_file'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='book',
            name='jumlah',
        ),
    ]
