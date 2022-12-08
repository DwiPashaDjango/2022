<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Minuman extends Model
{
    use SoftDeletes;
    protected $table = 'minuman';
    protected $fillable = [
        'nama_minuman', 'harga_minuman'
    ];
}
