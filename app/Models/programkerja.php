<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programkerja extends Model
{
    use HasFactory;
    public $table = 'programkerjas';
    protected $fillable = [
        'id',
        'nama',
        'penanggung_jawab',
        'pengurus',
        'landasan_kegiatan',
        'tujuan_kegiatan',
        'objek_segmentasi',
        'deskripsi',
        'parameter_keberhasilan',
        'kebutuhan_dana',
        'sumber_dana',
        'jumlah_sdm',
        'kebutuhan_lain',
        'created_at',
        'update_at',
        'user_id',
        'divisi_id',
        'kepengurusan_id'
    ];
}
