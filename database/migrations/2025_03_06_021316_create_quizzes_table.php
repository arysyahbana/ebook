<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe_soal', ['Objektif','Objektif Bergambar','Uraian','Uraian Bergambar'])->default('Objektif');
            $table->string('materi');
            $table->string('file')->nullable();
            $table->string('soal');
            $table->integer('skor');
            $table->json('pilihan')->nullable();
            $table->string('jawaban_benar',1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
