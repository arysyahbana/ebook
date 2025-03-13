<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawabanMahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','materi','jawaban','nilai','total_mengerjakan'];

    protected $casts = [
        'jawaban' => 'array',
    ];
}
