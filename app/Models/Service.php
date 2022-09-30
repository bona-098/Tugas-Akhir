<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = [
        'nama',
        'hari',
        'sesi',
        'no_hp',
        'pesan',
        'status',
        // 'kepengurusan_id',
        'foto'
    ];
}
