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
        'teknisi_id',
        'user_id',
        // 'foto'
    ];

    /**
     * Get the teknisi that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'teknisi_id');
    }

    /**
     * Get the user that owns the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
