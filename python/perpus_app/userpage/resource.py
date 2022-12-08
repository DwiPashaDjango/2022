from import_export import resources
from userpage.models import User
from import_export.fields import Field

class UserResource(resources.ModelResource):
    kelas_id__kelas = Field(attribute='kelas_id__kelas',
        column_name='Kelas'
    )
    username = Field(
        attribute='username', column_name='NISN'
    )
    full_name = Field(
        attribute='full_name', column_name='Nama Lengkap'
    )
    class Meta:
        model = User
        fields = [
            'username', 'full_name',
        ]
        export_order = [
            'username', 'full_name',
        ]


class GuruResource(resources.ModelResource):
    jabatan = Field(attribute='jabatan',
        column_name='Jabatan'
    )
    username = Field(
        attribute='username', column_name='NISN'
    )
    full_name = Field(
        attribute='full_name', column_name='Nama Lengkap'
    )
    class Meta:
        model = User
        fields = [
            'username', 'full_name', 'jabatan'
        ]
        export_order = [
            'username', 'full_name', 'jabatan'
        ]