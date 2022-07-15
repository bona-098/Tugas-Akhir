<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    public $table = 'pengumuman';
    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'waktu',
        'created_at',
        'update_at',
    ];
}
