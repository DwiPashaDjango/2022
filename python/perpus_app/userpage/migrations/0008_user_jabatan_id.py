# Generated by Django 3.2.14 on 2022-07-31 13:34

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('userpage', '0007_jabatan'),
    ]

    operations = [
        migrations.AddField(
            model_name='user',
            name='jabatan_id',
            field=models.ForeignKey(null=True, on_delete=django.db.models.deletion.CASCADE, to='userpage.jabatan'),
        ),
    ]