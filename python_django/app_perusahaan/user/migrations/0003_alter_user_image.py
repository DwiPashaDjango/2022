# Generated by Django 3.2.13 on 2022-10-05 15:20

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('user', '0002_auto_20221005_2128'),
    ]

    operations = [
        migrations.AlterField(
            model_name='user',
            name='image',
            field=models.ImageField(default='default.png', null=True, upload_to='media/user_pics/'),
        ),
    ]
