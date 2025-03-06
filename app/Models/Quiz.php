<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizzes';

    protected $fillable = ['tipe_soal', 'materi', 'file', 'soal', 'skor', 'pilihan', 'jawaban_benar'];

    protected $casts = [
        'pilihan' => 'array',
    ];    

    public function rMateri(){
        return $this->belongsTo(Materi::class,'materi','id');
    }
}
