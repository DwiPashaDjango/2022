from rest_framework import serializers
from artikels_api.models import Artikels

class ArtikelsSerializer(serializers.ModelSerializer):
    class Meta:
        model = Artikels
        fields = [
            'judul', 'article', 'image', 'sub_image', 'sub_image_2', 'sub_image_3'
        ]