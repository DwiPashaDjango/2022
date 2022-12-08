from typing_extensions import Required
from rest_framework import serializers
from sholat.models import JadwalSholat, Kota

class jadwalSerializer(serializers.ModelSerializer):
    class Meta:
        model = JadwalSholat
        fileds = '__all__'

class KotaSerializer(serializers.ModelSerializer):
    jadwal = serializers.PrimaryKeyRelatedField(
        many=True, read_only=True
    )

    class Meta:
        model = Kota
        fields = ['id', 'kota', 'jadwal']