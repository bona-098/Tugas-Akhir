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
        'prodi',
        'no_telp',
        'resume',
        'transkip',
        'surat_rekomendasi',
        'sertifikat',
        'status',
        'user_id'
        // 'kepengurusan_id'
    ];
}
