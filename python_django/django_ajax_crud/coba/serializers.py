from rest_framework import serializers
from coba.models import Profile
from django.contrib.auth.models import User

class UserSerializer(serializers.ModelSerializer):
    profile = serializers.StringRelatedField(many=True)

    class Meta:
        model = User
        fields = ['id', 'username', 'email', 'first_name', 'last_name', 'is_staff', 'is_superuser', 'profile']