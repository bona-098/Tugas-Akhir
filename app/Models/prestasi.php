<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    use HasFactory;
    public $table = 'prestasis';
    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'partisipasi',
        'deskripsi',
        'sertifikat',
        'penyelenggara',
        'waktu',
        'tempat',
        'kepengurusan_id',
    ];
    /**
     * Get the Kepengurusan that owns the prestasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kepengurusan()
    {
        return $this->belongsTo(Kepengurusan::class, 'kepengurusan_id');
    }
}
