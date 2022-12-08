from django.shortcuts import render
from rest_framework.decorators import api_view
from rest_framework.response import Response
from rest_framework import serializers

from api_book.serializers import BookSerializers
from rest_framework import status

from book.models import Book

# Create your views here.
@api_view(['GET'])
def ApiOverview(request):
    api_url = {
        'All Book' : 'api/book'
    }
    return Response(api_url)


@api_view(['POST'])
def post_book_api(request):
    serializer = BookSerializers(data=request.data)

    if serializer.is_valid():
        serializer.save()
        return Response(serializer.data, status=status.HTTP_201_CREATED)
    else:
        return Response(status=status.HTTP_400_BAD_REQUEST)


@api_view(['GET'])
def view_book_api(request):
    book = Book.objects.all()
    serializer = BookSerializers(book, many=True)

    if book:
        return Response(serializer.data)
    else:
        return Response(status=status.HTTP_404_NOT_FOUND)


@api_view(['POST'])
def update_api_book(request, pk):
    book = Book.objects.get(id=pk)
    data = BookSerializers(instance=book, data=request.data)

    if data.is_valid():
        data.save()
        return Response(data.data, status=status.HTTP_202_ACCEPTED)
    else:
        return Response(status=status.HTTP_400_BAD_REQUEST)