<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    public $table = 'teknisi';
    protected $fillable = [
        'id',
        'nama',
        'nim',
        'jadwal',
        'no_hp'
    ];
}
