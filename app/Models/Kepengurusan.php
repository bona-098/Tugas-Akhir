<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepengurusan extends Model
{
    use HasFactory;
    public $table = 'kepengurusans';
    protected $fillable = [
        'nama',
        'tahun',
        'pembina',
    ];
    /**
     * Get the prestasi t owns the Kepengurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prestasi()
    {
        return $this->hasMany(prestasi::class, 'kepengurusan_id');
    }

    /**
     * Get the programkerja that owns the Kepengurusan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programkerja()
    {
        return $this->hasMany(Programkerja::class, 'kepengurusan_id');
    }
}
