<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_servis_harian extends Model
{
    use HasFactory;
    public $table = 'jadwal_servis_harian';
    protected $fillable = [
        'id',
        'jadwal',
        'created_at',
        'update_at',
        'user_id'
    ];
}
