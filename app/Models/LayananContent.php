<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananContent extends Model
{
    use HasFactory;

    protected $table = 'layanan_contents';

    protected $fillable = [
        'layanan_slug',
        'title',
        'file_path',
        'urutan',
    ];

    /**
     * Daftar semua layanan yang tersedia (label untuk dropdown admin)
     */
    public static function daftarLayanan(): array
    {
        return [
            'bpkb_stnk'      => 'BPKB & STNK',
            'izin_keramaian' => 'Izin Keramaian',
            'pengawalan'     => 'Pengawalan',
            'sim'            => 'Layanan SIM',
            'skck'           => 'Layanan SKCK',
            'besuk_tahanan'  => 'Besuk Tahanan',
            'spkt'           => 'SPKT',
            'sidik_jari'     => 'Sidik Jari',
            'sp2hp'          => 'SP2HP',
            'pengaduan'      => 'Pengaduan',
        ];
    }
}
