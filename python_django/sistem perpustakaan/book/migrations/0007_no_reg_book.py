# Generated by Django 3.2.15 on 2022-08-29 04:18

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('book', '0006_remove_book_no_registrasi'),
    ]

    operations = [
        migrations.AddField(
            model_name='no_reg',
            name='book',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='book.book'),
        ),
    ]
