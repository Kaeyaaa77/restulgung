@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white">Manajemen Konten Layanan</h1>
            <p class="text-gray-400 mt-1">Kelola konten PDF untuk setiap halaman layanan umum.</p>
        </div>
        <a href="{{ route('admin.layanan-content.create') }}"
            class="inline-flex items-center px-4 py-2 bg-yellow-400 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-500 transition">
            <span class="material-symbols-outlined text-base mr-2">add</span>
            Tambah Konten
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">Sukses!</span> {{ session('success') }}
        </div>
    @endif

    @forelse ($daftarLayanan as $slug => $label)
        <div class="mb-8 bg-gray-900/50 rounded-lg shadow-lg overflow-hidden">
            <div class="bg-gray-900/70 px-6 py-3 flex justify-between items-center">
                <h2 class="font-bold text-yellow-400 uppercase tracking-wider">{{ $label }}</h2>
                <span class="text-xs text-gray-400">{{ isset($contents[$slug]) ? $contents[$slug]->count() : 0 }}
                    file</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-400">
                    <thead class="text-xs text-gray-300 uppercase bg-gray-900/40">
                        <tr>
                            <th class="px-6 py-3">Urutan</th>
                            <th class="px-6 py-3">Judul</th>
                            <th class="px-6 py-3">File PDF</th>
                            <th class="px-6 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($contents[$slug]) && $contents[$slug]->count() > 0)
                            @foreach ($contents[$slug] as $item)
                                <tr class="border-b border-gray-800 hover:bg-gray-800/50">
                                    <td class="px-6 py-4">{{ $item->urutan }}</td>
                                    <td class="px-6 py-4 font-medium text-white">{{ $item->title }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank"
                                            class="text-blue-400 hover:underline text-xs">
                                            Lihat PDF
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-4">
                                            <a href="{{ route('admin.layanan-content.edit', $item->id) }}"
                                                class="font-medium text-yellow-400 hover:underline">Edit</a>
                                            <form action="{{ route('admin.layanan-content.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus konten ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-500 hover:underline">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-600">
                                    Belum ada konten untuk layanan ini.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <p class="text-gray-400">Tidak ada layanan.</p>
    @endforelse
@endsection
