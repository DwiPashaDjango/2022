# Generated by Django 3.2.14 on 2022-07-31 13:38

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('userpage', '0011_alter_user_jabatan_id'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='user',
            name='jabatan_id',
        ),
        migrations.DeleteModel(
            name='Jabatan',
        ),
    ]