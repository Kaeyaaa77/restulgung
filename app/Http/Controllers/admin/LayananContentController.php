<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LayananContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananContentController extends Controller
{
    public function index()
    {
        $contents = LayananContent::orderBy('layanan_slug')
            ->orderBy('urutan')
            ->get()
            ->groupBy('layanan_slug');

        $daftarLayanan = LayananContent::daftarLayanan();

        return view('admin.layanan_content.index', compact('contents', 'daftarLayanan'));
    }

    public function create()
    {
        $daftarLayanan = LayananContent::daftarLayanan();
        return view('admin.layanan_content.create', compact('daftarLayanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_slug' => 'required|string',
            'title'        => 'required|string|max:255',
            'file_pdf'     => 'required|file|mimes:pdf|max:10240',
            'urutan'       => 'nullable|integer',
        ]);

        $path = $request->file('file_pdf')->store('layanan_pdf', 'public');

        LayananContent::create([
            'layanan_slug' => $request->layanan_slug,
            'title'        => $request->title,
            'file_path'    => $path,
            'urutan'       => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.layanan-content.index')
            ->with('success', 'Konten layanan berhasil ditambahkan.');
    }

    public function edit(LayananContent $layananContent)
    {
        $daftarLayanan = LayananContent::daftarLayanan();
        return view('admin.layanan_content.edit', compact('layananContent', 'daftarLayanan'));
    }

    public function update(Request $request, LayananContent $layananContent)
    {
        $request->validate([
            'layanan_slug' => 'required|string',
            'title'        => 'required|string|max:255',
            'file_pdf'     => 'nullable|file|mimes:pdf|max:10240',
            'urutan'       => 'nullable|integer',
        ]);

        $path = $layananContent->file_path;

        if ($request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($path);
            $path = $request->file('file_pdf')->store('layanan_pdf', 'public');
        }

        $layananContent->update([
            'layanan_slug' => $request->layanan_slug,
            'title'        => $request->title,
            'file_path'    => $path,
            'urutan'       => $request->urutan ?? 0,
        ]);

        return redirect()->route('admin.layanan-content.index')
            ->with('success', 'Konten layanan berhasil diperbarui.');
    }

    public function destroy(LayananContent $layananContent)
    {
        Storage::disk('public')->delete($layananContent->file_path);
        $layananContent->delete();

        return redirect()->route('admin.layanan-content.index')
            ->with('success', 'Konten layanan berhasil dihapus.');
    }
}
