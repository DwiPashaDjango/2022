from django.http import Http404
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status

from artikels_api.serializers import ArtikelsSerializer
from artikels_api.models import Artikels

class ArtikelsList(APIView):
    def get(self, request, format=None):
        data = Artikels.objects.all()
        seri = ArtikelsSerializer(data, many=True)
        return Response(seri.data)

    def post(self, request, format=None):
        seri = ArtikelsSerializer(data=request.data)
        if seri.is_valid():
            seri.save()
            return Response(seri.data, status=status.HTTP_201_CREATED)
        return Response(seri.errors, status=status.HTTP_400_BAD_REQUEST)

class ArtikelsDetails(APIView):
    def get_object(self, pk):
        try:
            return Artikels.objects.get(id=pk)
        except Artikels.DoesNotExist:
            raise Http404

    def get(self, request, pk, format=None):
        data = self.get_object(pk)
        seri = ArtikelsSerializer(data)
        return Response(seri.data, status=status.HTTP_302_FOUND)

    def put(self, request, pk, format=None):
        data = self.get_object(pk)
        seri = ArtikelsSerializer(data, data=request.data)
        if seri.is_valid():
            seri.save()
            return Response(seri.data, status=status.HTTP_202_ACCEPTED)
        return Response(seri.errors, status=status.HTTP_400_BAD_REQUEST)

    def delete(self, request, pk, format=None):
        data = self.get_object(pk)
        data.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)    
    