<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Berita;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->take(8)->get();

        $allBerita = Berita::latest('published_at')->get();

        // --- AWAL PERUBAHAN ---

        // 1 Berita paling baru untuk headline utama
        $beritaUtama = $allBerita->first();

        // 4 Berita terbaru setelah berita utama (untuk di bawah headline)
        $beritaTerbaru = $allBerita->skip(1)->take(4);

        // 4 Berita setelahnya (untuk di samping kanan)
        // NAMA VARIABEL DIUBAH DARI $beritaSamping MENJADI $beritaKecil
        $beritaKecil = $allBerita->skip(5)->take(6);

        $banner = Banner::first();

        // PASTIKAN VARIABEL YANG DIKIRIM KE VIEW JUGA DIAKTUALKAN
        return view('landing', compact('galleries', 'beritaUtama', 'beritaTerbaru', 'beritaKecil', 'banner'));

        // --- AKHIR PERUBAHAN ---
    }
}
