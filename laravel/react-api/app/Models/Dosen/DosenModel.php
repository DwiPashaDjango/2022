<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'name',
        'tgl_lahir',
        'tempat_lahir',
        'umur',
        'lulusan_id',
        'alamat',
        'mapel_id',
        'profile',
        'created_at'
    ];
}
