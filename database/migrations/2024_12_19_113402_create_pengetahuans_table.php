<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengetahuans', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->unsignedBigInteger('penyakit_id'); // Kolom foreign key untuk penyakit
            $table->unsignedBigInteger('gejala_id');   // Kolom foreign key untuk gejala
            $table->float('densitas');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('penyakit_id')->references('penyakit_id')->on('penyakits')->onDelete('cascade');
            $table->foreign('gejala_id')->references('gejala_id')->on('gejalas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengetahuans');
    }
};

