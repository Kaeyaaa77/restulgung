<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        return view('admin.banner.index', compact('banner'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validasi tanpa batasan dimensi ukuran
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $banner = Banner::first();

        // Hapus gambar lama jika ada
        if ($banner && $banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }

        // Simpan gambar baru
        $path = $request->file('image')->store('banners', 'public');

        if ($banner) {
            $banner->update(['image_path' => $path]);
        } else {
            Banner::create(['image_path' => $path]);
        }

        return redirect()->back()->with('success', 'Banner berhasil diperbarui!');
    }

    public function destroy()
    {
        $banner = Banner::first();
        if ($banner) {
            Storage::disk('public')->delete($banner->image_path);
            $banner->delete();
        }

        return redirect()->back()->with('success', 'Banner berhasil dihapus!');
    }
}
