<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    public $table = 'teknisi';
    protected $fillable = [
        
        'nim',
        'hari',
        'no_hp',
        'user_id',
        'foto'
    ];
    /**
     * Get the user that owns the Teknisi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
