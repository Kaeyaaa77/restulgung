<?php

namespace App\Http\Controllers;

use App\Models\Inovasi;
use Illuminate\Http\Request;

class InovasiController extends Controller
{
    /**
     * Menampilkan halaman utama inovasi (inovasi.blade.php).
     */
    public function index()
    {
        $inovasisDinamis = Inovasi::orderBy('urutan')->orderBy('id')->get();

        return view('inovasi', compact('inovasisDinamis'));
    }

    /**
     * Detail inovasi unggulan yang ditambahkan lewat admin.
     */
    public function show(Inovasi $inovasi)
    {
        return view('inovasi.show', compact('inovasi'));
    }
}
