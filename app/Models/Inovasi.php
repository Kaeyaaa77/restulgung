<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovasi extends Model
{
    use HasFactory;

    /** Batas maksimal inovasi unggulan yang bisa ditambahkan admin */
    public const MAX_ITEMS = 15;

    protected $table = 'inovasis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'file_pdf',
        'urutan',
    ];

    public function getGambarUrlAttribute(): ?string
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : null;
    }

    public function getPdfUrlAttribute(): ?string
    {
        return $this->file_pdf ? asset('storage/' . $this->file_pdf) : null;
    }

    public static function isFull(): bool
    {
        return static::count() >= self::MAX_ITEMS;
    }
}
