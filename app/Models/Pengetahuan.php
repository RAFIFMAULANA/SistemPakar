<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = ['penyakit_id', 'gejala_id', 'densitas'];

    // Relasi dengan model Penyakit
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id'); // Pastikan 'penyakit_id' adalah nama kolom foreign key
    }

    // Relasi dengan model Gejala
    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id'); // Pastikan 'gejala_id' adalah nama kolom foreign key
    }
}
