<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    use HasFactory;
    public $table = 'prestasis';
    protected $fillable = [
        'nama',
        'nim',
        'pencapaian',
        'dospem',
        'kategori',
        'nama_kegiatan',
        'penyelenggara',
        'waktu',
        'tempat',
        'foto',
        'kepengurusan_id',
    ];
}
