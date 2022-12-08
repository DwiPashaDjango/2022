from rest_framework import serializers
from user.models import User

class UserSerializer(serializers.Serializer):
    class Meta:
        model = User
        fields = '__all_-'