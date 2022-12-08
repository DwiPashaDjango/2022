<?php

namespace App\Models\Mhs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsModel extends Model
{
    use HasFactory;
    protected $table = 'mhs';
    protected $fillable = [
        'name',
        'tgl_lahir',
        'tempat_lahir',
        'alamat',
        'asal_sekolah',
        'umur',
        'profile',
        'created_at'
    ];
}
