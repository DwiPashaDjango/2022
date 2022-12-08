# Generated by Django 3.2.15 on 2022-08-20 15:15

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Kota',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('kota', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='JadwalSholat',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('shubuh', models.TimeField()),
                ('terbit', models.TimeField()),
                ('dhuha', models.TimeField()),
                ('dzuhur', models.TimeField()),
                ('ashr', models.TimeField()),
                ('magrib', models.TimeField()),
                ('isya', models.TimeField()),
                ('imsak', models.TimeField()),
                ('tanggal', models.DateField()),
                ('kota_id', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='sholat.kota')),
            ],
        ),
    ]
