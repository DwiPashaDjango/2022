# Generated by Django 3.2.14 on 2022-07-27 13:48

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0002_categorybook'),
    ]

    operations = [
        migrations.AddField(
            model_name='book',
            name='kelompok_id',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='book.categorybook'),
        ),
    ]
