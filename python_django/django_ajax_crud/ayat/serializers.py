from rest_framework import serializers
from ayat.models import Doa

class DoaSerializer(serializers.ModelSerializer):
    class Meta:
        model = Doa
        fields = '__all__'