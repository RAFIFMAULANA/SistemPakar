<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->bigIncrements('penyakit_id'); // Primary key dengan nama 'penyakit_id'
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->string('solusi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyakits');
    }
};
