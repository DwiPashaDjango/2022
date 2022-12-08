<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluarBarangModel extends Model
{
    use HasFactory;
    protected $table = 'keluar';
    protected $fillable = [
        'nama_admin', 'barang_id', 'jumlah', 'status'
    ];
    protected $hidden = [];
}
