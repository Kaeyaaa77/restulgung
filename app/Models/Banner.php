<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar kolom image_path bisa diisi
    protected $fillable = [
        'image_path',
    ];
}
