# Generated by Django 3.2.14 on 2022-07-31 13:31

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('userpage', '0006_user_kelas_id'),
    ]

    operations = [
        migrations.CreateModel(
            name='Jabatan',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('jabatan', models.CharField(max_length=100)),
            ],
        ),
    ]
