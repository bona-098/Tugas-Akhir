<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programkerja extends Model
{
    use HasFactory;
    public $table = 'programkerja';
    protected $fillable = [
        'id',
        'nama',
        'waktu',
        'tampat',
        'deskripsi',
        'gambar',
        'created_at',
        'update_at',
        'user_id'
    ];
}
