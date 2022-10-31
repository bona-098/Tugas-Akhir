<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    use HasFactory;
    public $table = 'divisis';
    protected $fillable = [
        'id',
        'nama',
        'kadiv',
        'staffahli',
        'staff',
        'visi',
        'misi',
        'programkerja_id',
        'created_at',
        'update_at'
    ];
    /**
     * Get the Programkerja that owns the divisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programkerja()
    {
        return $this->belongsTo(Programkerja::class, 'programkerja_id');
    }
}
