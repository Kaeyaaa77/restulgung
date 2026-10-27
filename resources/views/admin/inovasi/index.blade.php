@extends('admin.layouts.app')

@section('content')
    @php $full = $inovasis->count() >= $max; @endphp

    <div class="flex flex-wrap gap-4 justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white">Inovasi Unggulan</h1>
            <p class="text-gray-400 mt-1">Kelola daftar inovasi yang tampil di halaman Inovasi.</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm {{ $full ? 'text-red-400' : 'text-gray-300' }}">
                <span class="font-bold text-yellow-400">{{ $inovasis->count() }}</span> / {{ $max }} terisi
            </span>
            @if ($full)
                <span
                    class="inline-flex items-center px-4 py-2 bg-gray-700 rounded-md font-semibold text-xs text-gray-400 uppercase tracking-widest cursor-not-allowed">
                    Batas Tercapai
                </span>
            @else
                <a href="{{ route('admin.inovasi.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-400 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-500 transition">
                    <span class="material-symbols-outlined text-base mr-2">add</span>
                    Tambah Inovasi
                </a>
            @endif
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <span class="font-medium">Sukses!</span> {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="font-medium">Gagal!</span> {{ session('error') }}
        </div>
    @endif

    <div class="mb-6 h-2 bg-gray-700 rounded-full overflow-hidden">
        <div class="h-full bg-yellow-400 transition-all" style="width: {{ ($inovasis->count() / $max) * 100 }}%"></div>
    </div>

    @if ($inovasis->isEmpty())
        <div class="bg-gray-900/50 rounded-lg p-10 text-center text-gray-400">
            <span class="material-symbols-outlined text-5xl text-gray-600">lightbulb</span>
            <p class="mt-3">Belum ada inovasi unggulan yang ditambahkan.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($inovasis as $item)
                <div class="bg-gray-900/50 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <div class="relative h-44 bg-gray-800 flex items-center justify-center">
                        @if ($item->gambar)
                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="w-full h-full object-cover">
                        @else
                            <span class="material-symbols-outlined text-6xl text-gray-600">picture_as_pdf</span>
                        @endif
                        <span class="absolute top-2 left-2 bg-yellow-400 text-black text-xs font-bold px-2 py-1 rounded">
                            #{{ $item->urutan }}
                        </span>
                        @if ($item->file_pdf)
                            <span class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">
                                PDF
                            </span>
                        @endif
                    </div>
                    <div class="p-4 flex-1 flex flex-col">
                        <h3 class="font-bold text-white break-words">{{ $item->judul }}</h3>
                        <p class="text-sm text-gray-400 mt-1">
                            {{ $item->deskripsi ? \Illuminate\Support\Str::limit($item->deskripsi, 110) : 'Tanpa deskripsi.' }}
                        </p>
                        <div class="mt-auto pt-4 flex items-center justify-between text-sm">
                            <a href="{{ route('inovasi.show', $item) }}" target="_blank"
                                class="text-blue-400 hover:underline">Lihat</a>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('admin.inovasi.edit', $item) }}"
                                    class="font-medium text-yellow-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.inovasi.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus inovasi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-500 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
