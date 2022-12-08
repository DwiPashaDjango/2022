from rest_framework.views import APIView
from django.contrib.auth.models import User
from rest_framework.response import Response
from rest_framework import status
from django.http import Http404
from django.utils.decorators import method_decorator
from django.views.decorators.cache import cache_page
from django.views.decorators.vary import vary_on_cookie, vary_on_headers
from rest_framework.permissions import IsAuthenticated

from ayat.models import Doa
from ayat.serializers import DoaSerializer

class DoaList(APIView):
    # permission_classes = [IsAuthenticated]
    @method_decorator(cache_page(60*60*2))
    @method_decorator(vary_on_cookie)
    def get(self, request, format=None):
        qrst = Doa.objects.all()
        serialzer = DoaSerializer(qrst, many=True)
        return Response(serialzer.data, status=status.HTTP_200_OK)
    
    def post(self, request, format=None):
        qrst = DoaSerializer(data=request.data)
        if qrst.is_valid():
            qrst.save()
            return Response(qrst.data, status=status.HTTP_200_OK)
        return Response(qrst.errors, status=status.HTTP_400_BAD_REQUEST)

class DoaDetail(APIView):
    def get_object(self, pk):
        try:
            return Doa.objects.get(id=pk)
        except Doa.DoesNotExist:
            raise Http404

    def get(self, request, pk, format=None):
        qrst = self.get_object(pk)
        serializer = DoaSerializer(qrst)
        return Response(serializer.data)

    def put(self, request, pk, format=None):
        qrst = self.get_object(pk)
        serializer = DoaSerializer(qrst, data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

    def delete(self, request, pk, format=None):
        qrst = self.get_object(pk)
        qrst.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)