<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    public $table = 'anggotas';
    protected $fillable = [
        'nama',
        'nim',
        'pilihan_satu',
        'alasan_satu',
        'pilihan_dua',
        'alasan_dua',
        'pindah_divisi',
        'motivasi',
        'komitmen',
        'cv',
        'porto',
        'status',
        'user_id'
        // 'kepengurusan_id'
    ];
}
