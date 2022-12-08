from user.models import User
from user.serializers import UserSerializer
from django.http import Http404
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status

class UserList(APIView):
    def get(self, request, format=None):
        data = User.objects.all()
        seri = UserSerializer(data, many=True)
        return Response(seri.data)
    
    def post(self, request, format=None):
        seri = UserSerializer(data=request.data)
        if seri.is_valid():
            seri.save()
            return Response(seri.data, status=status.HTTP_201_CREATED)
        return Response(seri.errors, status=status.HTTP_400_BAD_REQUEST)
