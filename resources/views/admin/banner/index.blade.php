@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="mb-6 flex justify-between items-center">
            <h2 class="text-2xl font-bold text-white">Kelola Banner Beranda</h2>
        </div>

        <!-- Alert Success -->
        @if (session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-300 p-4 rounded-lg mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Alert Error -->
        @error('image')
            <div class="bg-red-500/20 border border-red-500 text-red-300 p-4 rounded-lg mb-6 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
                {{ $message }}
            </div>
        @enderror

        <!-- Card: Preview Banner -->
        <div class="bg-[#1f2128] border border-gray-700 rounded-xl shadow-md mb-8 overflow-hidden">
            <div class="p-5 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-gray-200">Preview Banner Saat Ini</h3>
            </div>
            <div class="p-5">
                @if (isset($banner) && $banner->image_path)
                    <div class="rounded-lg overflow-hidden border border-gray-700 mb-5 shadow-sm">
                        <img src="{{ asset('storage/' . $banner->image_path) }}" alt="Banner" class="w-full object-cover">
                    </div>
                    <form action="{{ route('admin.banner.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center px-4 py-2 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white border border-red-500 hover:border-transparent rounded-lg transition-colors duration-200"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus banner ini?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Hapus Banner
                        </button>
                    </form>
                @else
                    <!-- Tampilan Placeholder jika kosong -->
                    <div class="w-full bg-gray-800/50 flex flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-600"
                        style="min-height: 300px;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-gray-500 mb-3" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-400 font-medium">Belum ada banner yang diunggah</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Card: Form Upload -->
        <div class="bg-[#1f2128] border border-gray-700 rounded-xl shadow-md">
            <div class="p-5 border-b border-gray-700">
                <h3 class="text-lg font-semibold text-gray-200">Unggah Banner Baru</h3>
            </div>
            <div class="p-5">
                <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block mb-3 text-sm font-medium text-gray-400">Pilih File Gambar (Hanya format: JPEG,
                            PNG, JPG)</label>
                        <input type="file" name="image" required
                            class="block w-full text-sm text-gray-400
                               file:mr-4 file:py-2.5 file:px-5
                               file:rounded-lg file:border-0
                               file:text-sm file:font-semibold
                               file:bg-[#FFC107] file:text-gray-900
                               hover:file:bg-yellow-500
                               bg-gray-800 border border-gray-600 rounded-lg cursor-pointer focus:outline-none transition-all">
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 bg-[#FFC107] hover:bg-yellow-500 text-gray-900 font-bold rounded-lg transition-colors duration-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Simpan Banner
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
