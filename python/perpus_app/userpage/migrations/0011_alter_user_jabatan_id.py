# Generated by Django 3.2.14 on 2022-07-31 13:36

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        ('userpage', '0010_alter_user_jabatan_id'),
    ]

    operations = [
        migrations.AlterField(
            model_name='user',
            name='jabatan_id',
            field=models.ForeignKey(default='4', null=True, on_delete=django.db.models.deletion.CASCADE, to='userpage.jabatan'),
        ),
    ]
