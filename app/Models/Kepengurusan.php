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
        // 'bph',
        // 'pengurus_lain',
        // 'anggota',
        // 'program_kerja'
        // 'created_at',
        // 'update_at',
        // 'user_id'
    ];
}
