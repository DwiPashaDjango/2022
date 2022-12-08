<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id', 'nama_kasir', 'nama_pelanggan', 'id_makanan', 'id_minuman', 'qty_makanan', 'qty_minuman'
    ];

    protected $hidden = [];
}
