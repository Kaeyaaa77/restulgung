@extends('admin.layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit Konten Layanan</h1>
            <p class="text-gray-400 mt-1">Perbarui konten PDF layanan.</p>
        </div>
        <a href="{{ route('admin.layanan-content.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-gray-900/50 rounded-lg shadow-lg p-6 lg:p-8 max-w-2xl">
        <form action="{{ route('admin.layanan-content.update', $layananContent->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6">

                <div>
                    <label for="layanan_slug" class="block mb-2 text-sm font-medium text-gray-300">
                        Pilih Layanan <span class="text-red-400">*</span>
                    </label>
                    <select id="layanan_slug" name="layanan_slug" required
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                        @foreach ($daftarLayanan as $slug => $label)
                            <option value="{{ $slug }}"
                                {{ old('layanan_slug', $layananContent->layanan_slug) == $slug ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('layanan_slug')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-300">
                        Judul Konten <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title', $layananContent->title) }}"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                        required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="urutan" class="block mb-2 text-sm font-medium text-gray-300">
                        Urutan Tampil
                    </label>
                    <input type="number" id="urutan" name="urutan" value="{{ old('urutan', $layananContent->urutan) }}"
                        min="0"
                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-300">File PDF Saat Ini</label>
                    <a href="{{ asset('storage/' . $layananContent->file_path) }}" target="_blank"
                        class="text-blue-400 hover:underline text-sm">
                        Lihat / Unduh PDF Saat Ini
                    </a>
                </div>

                <div>
                    <label for="file_pdf" class="block mb-2 text-sm font-medium text-gray-300">
                        Ganti File PDF (Opsional)
                    </label>
                    <input id="file_pdf" type="file" name="file_pdf" accept=".pdf"
                        class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none file:bg-yellow-500 file:border-0 file:text-black file:font-semibold file:px-4 file:py-2 file:mr-4 hover:file:bg-yellow-400">
                    <p class="mt-1 text-xs text-gray-400">Kosongkan jika tidak ingin mengganti file.</p>
                    @error('file_pdf')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-yellow-500 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-400 transition">
                        Perbarui Konten
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
