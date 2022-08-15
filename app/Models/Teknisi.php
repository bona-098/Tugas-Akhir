<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $fillable = [
        'nama',
        'nim',
        'hari',
        'sesi',
        'no_hp',
        'foto'
    ];
}
