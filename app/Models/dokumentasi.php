<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumentasi extends Model
{
    use HasFactory;
    public $table = 'dokumentasis';
    protected $fillable = [
        'nama',
        'waktu',
        'deskripsi',
        'media'
    ];
}
