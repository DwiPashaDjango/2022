from import_export import resources
from book.models import *
from import_export.fields import Field

class BukuResource(resources.ModelResource):
    penulis_buku__penluis = Field(attribute='penulis_buku__penluis')
    penerbit_buku_penerbit = Field(attribute='penerbit_buku_penerbit')
    tema__tema = Field(attribute='tema__tema')
    kelompok_buku__kelompok = Field(attribute='kelompok_buku__kelompok')
    rak_buku__rak = Field(attribute='rak_buku__rak')

    class Meta:
        model = Book
        fields =[
            'judul', 'penulis_buku__penluis', 'penerbit_buku__penerbit', 'tema__tema', 'kelompok_buku__kelompok', 'rak_buku__rak'
        ]