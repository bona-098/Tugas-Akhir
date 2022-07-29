<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    public $table = 'pengumuman';
    protected $fillable = [
        'judul',
        'deskripsi',
        'waktu',
        'media',
    ];
}
