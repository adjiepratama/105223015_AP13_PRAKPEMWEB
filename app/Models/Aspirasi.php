<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    
    // Mengizinkan semua kolom diisi (atau kamu bisa pakai $fillable)
    protected $guarded = ['id'];
}