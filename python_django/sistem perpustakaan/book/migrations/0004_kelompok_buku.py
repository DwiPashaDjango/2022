# Generated by Django 3.2.15 on 2022-08-29 04:04

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0003_tema'),
    ]

    operations = [
        migrations.CreateModel(
            name='kelompok_Buku',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('kelompok', models.CharField(max_length=100)),
            ],
        ),
    ]
