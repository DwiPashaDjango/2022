# Generated by Django 3.2.14 on 2022-07-27 13:46

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='CategoryBook',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('kelompok_book', models.CharField(max_length=100)),
            ],
        ),
    ]
