<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public $table = 'booking';
    protected $fillable = [
        'id',
        'nama',
        'created_at',
        'update_at',
        'jadwal_servis_harian_id'
    ];
}
