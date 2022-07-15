<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_divisi extends Model
{
    use HasFactory;
    public $table = 'task_divisi';
    protected $fillable = [
        'id',
        'nama',
        'created_at',
        'update_at',
        'divisi_id'
    ];
}
