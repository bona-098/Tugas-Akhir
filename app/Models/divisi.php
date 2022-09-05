<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divisi extends Model
{
    use HasFactory;
    public $table = 'divisi';
    protected $fillable = [
        'id',
        'nama',
        'kadiv',
        'staffahli',
        'staff',
        'visi',
        'misi',
        'created_at',
        'update_at',
        'programkerja_id'
    ];
}
