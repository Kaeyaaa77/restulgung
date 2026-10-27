<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inovasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasis = Inovasi::orderBy('urutan')->orderBy('id')->get();

        return view('admin.inovasi.index', [
            'inovasis' => $inovasis,
            'max'      => Inovasi::MAX_ITEMS,
        ]);
    }

    public function create()
    {
        if (Inovasi::isFull()) {
            return redirect()->route('admin.inovasi.index')
                ->with('error', 'Batas maksimal ' . Inovasi::MAX_ITEMS . ' inovasi unggulan sudah tercapai. Hapus salah satu untuk menambah yang baru.');
        }

        return view('admin.inovasi.create');
    }

    public function store(Request $request)
    {
        if (Inovasi::isFull()) {
            return redirect()->route('admin.inovasi.index')
                ->with('error', 'Batas maksimal ' . Inovasi::MAX_ITEMS . ' inovasi unggulan sudah tercapai.');
        }

        $data = $request->validate($this->rules(), $this->messages());

        if (!$request->hasFile('gambar') && !$request->hasFile('file_pdf')) {
            return back()->withInput()
                ->withErrors(['gambar' => 'Minimal upload satu gambar atau satu file PDF.']);
        }

        $data['urutan'] = $data['urutan'] ?? ((int) Inovasi::max('urutan') + 1);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('inovasi/gambar', 'public');
        }
        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('inovasi/pdf', 'public');
        }

        Inovasi::create($data);

        return redirect()->route('admin.inovasi.index')
            ->with('success', 'Inovasi unggulan berhasil ditambahkan.');
    }

    public function edit(Inovasi $inovasi)
    {
        return view('admin.inovasi.edit', compact('inovasi'));
    }

    public function update(Request $request, Inovasi $inovasi)
    {
        $data = $request->validate($this->rules(), $this->messages());

        $data['urutan'] = $data['urutan'] ?? $inovasi->urutan;

        // Gambar
        if ($request->boolean('hapus_gambar') && $inovasi->gambar && !$request->hasFile('gambar')) {
            Storage::disk('public')->delete($inovasi->gambar);
            $data['gambar'] = null;
        }
        if ($request->hasFile('gambar')) {
            if ($inovasi->gambar) {
                Storage::disk('public')->delete($inovasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('inovasi/gambar', 'public');
        }

        // PDF
        if ($request->boolean('hapus_pdf') && $inovasi->file_pdf && !$request->hasFile('file_pdf')) {
            Storage::disk('public')->delete($inovasi->file_pdf);
            $data['file_pdf'] = null;
        }
        if ($request->hasFile('file_pdf')) {
            if ($inovasi->file_pdf) {
                Storage::disk('public')->delete($inovasi->file_pdf);
            }
            $data['file_pdf'] = $request->file('file_pdf')->store('inovasi/pdf', 'public');
        }

        // Minimal harus ada salah satu: gambar atau PDF
        $gambarAkhir = array_key_exists('gambar', $data) ? $data['gambar'] : $inovasi->gambar;
        $pdfAkhir    = array_key_exists('file_pdf', $data) ? $data['file_pdf'] : $inovasi->file_pdf;
        if (!$gambarAkhir && !$pdfAkhir) {
            return back()->withInput()
                ->withErrors(['gambar' => 'Minimal harus ada satu gambar atau satu file PDF.']);
        }

        unset($data['hapus_gambar'], $data['hapus_pdf']);
        $inovasi->update($data);

        return redirect()->route('admin.inovasi.index')
            ->with('success', 'Inovasi unggulan berhasil diperbarui.');
    }

    public function destroy(Inovasi $inovasi)
    {
        if ($inovasi->gambar) {
            Storage::disk('public')->delete($inovasi->gambar);
        }
        if ($inovasi->file_pdf) {
            Storage::disk('public')->delete($inovasi->file_pdf);
        }
        $inovasi->delete();

        return redirect()->route('admin.inovasi.index')
            ->with('success', 'Inovasi unggulan berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'judul'        => 'required|string|max:150',
            'deskripsi'    => 'nullable|string|max:2000',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'file_pdf'     => 'nullable|file|mimes:pdf|max:10240',
            'urutan'       => 'nullable|integer|min:0',
            'hapus_gambar' => 'nullable|boolean',
            'hapus_pdf'    => 'nullable|boolean',
        ];
    }

    private function messages(): array
    {
        return [
            'judul.required' => 'Judul inovasi wajib diisi.',
            'gambar.image'   => 'File gambar harus berupa JPG, PNG, atau WEBP.',
            'gambar.max'     => 'Ukuran gambar maksimal 4MB.',
            'file_pdf.mimes' => 'File harus berformat PDF.',
            'file_pdf.max'   => 'Ukuran PDF maksimal 10MB.',
        ];
    }
}
