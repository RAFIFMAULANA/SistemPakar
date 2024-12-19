<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    // Menyebutkan primary key jika menggunakan kolom selain 'id'
    protected $primaryKey = 'penyakit_id'; // Menggunakan 'penyakit_id' sebagai primary key

    // Kolom yang bisa diisi
    protected $fillable = ['kode', 'nama', 'solusi'];

    // Relasi dengan Gejala melalui Pengetahuan (contoh relasi)
    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'pengetahuans', 'penyakit_id', 'gejala_id')
                    ->withPivot('densitas');
    }
}

