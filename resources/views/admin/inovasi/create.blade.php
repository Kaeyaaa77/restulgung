@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-wrap gap-3 justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white">Tambah Inovasi Unggulan</h1>
            <p class="text-gray-400 mt-1">Akan tampil di halaman Inovasi pada bagian Daftar Inovasi Unggulan.</p>
        </div>
        <a href="{{ route('admin.inovasi.index') }}"
            class="inline-flex items-center px-4 py-2 bg-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 transition">
            &larr; Kembali
        </a>
    </div>

    <div class="bg-gray-900/50 rounded-lg shadow-lg p-6 lg:p-8 max-w-2xl">
        <form action="{{ route('admin.inovasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.inovasi._form')
        </form>
    </div>
@endsection
