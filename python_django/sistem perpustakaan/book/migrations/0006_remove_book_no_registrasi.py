# Generated by Django 3.2.15 on 2022-08-29 04:16

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0005_book'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='book',
            name='no_registrasi',
        ),
    ]
