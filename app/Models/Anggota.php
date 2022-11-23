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
        'divisi_id',
        'alasan_satu',
        'pilihan_dua',
        'alasan_dua',
        'pindah_divisi',
        'motivasi',
        'komitmen',
        'cv',
        'porto',
        'status',
        'user_id',
        'kepengurusan_id'
    ];
    public function divisi()
    {
        return $this->belongsTo(divisi::class, 'divisi_id');
    }

    public function kepengurusan()
    {
        return $this->belongsTo(kepengurusan::class, 'kepengurusan_id');
    }
}
