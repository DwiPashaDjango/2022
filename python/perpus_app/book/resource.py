from import_export import resources
from import_export.fields import Field
from book.models import Book

class BookResource(resources.ModelResource):
    judul = Field(attribute='judul',
        column_name='Judul Buku'
    )
    penulis = Field(attribute='penulis', 
        column_name='Penulis Buku'
    )
    penerbit = Field(attribute='penerbit', 
        column_name='Penerbit Buku'
    )
    kelompok_id__kelompok_book = Field(attribute='kelompok_id__kelompok_book',
        column_name='Kelompok Buku'
    )
    jumlah = Field(attribute='jumlah', 
        column_name='Jumlah Buku'
    )
    tgl_upload = Field(attribute='tgl_upload', 
        column_name='Tanggal Uploa Buku'
    )

    class Meta:
        model = Book
        fields = [
            'judul', 'penulis', 'penerbit', 'kelompok_id__kelompok_book', 'jumlah', 'tgl_upload', 
        ]