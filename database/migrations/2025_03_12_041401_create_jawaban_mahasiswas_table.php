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
        Schema::create('jawaban_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('materi');
            $table->json('jawaban');
            $table->integer('nilai');
            $table->integer('total_mengerjakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_mahasiswas');
    }
};
