<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    // Menyebutkan primary key jika menggunakan kolom selain 'id'
    protected $primaryKey = 'gejala_id'; // Menggunakan 'gejala_id' sebagai primary key

    // Kolom yang bisa diisi
    protected $fillable = ['kode', 'gejala'];
}


