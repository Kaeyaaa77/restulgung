@php $isEdit = isset($inovasi); @endphp
<div class="space-y-6">
    <div>
        <label for="judul" class="block mb-2 text-sm font-medium text-gray-300">
            Judul Inovasi <span class="text-red-400">*</span>
        </label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $inovasi->judul ?? '') }}" required
            maxlength="150" placeholder="Contoh: Aplikasi SIM Ceria"
            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
        @error('judul')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-300">Deskripsi Singkat</label>
        <textarea id="deskripsi" name="deskripsi" rows="5" maxlength="2000"
            placeholder="Jelaskan inovasi ini secara singkat (opsional)"
            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">{{ old('deskripsi', $inovasi->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div x-data="{ preview: null }">
        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-300">Gambar Inovasi</label>

        @if ($isEdit && $inovasi->gambar)
            <div class="mb-3 p-3 bg-gray-800 rounded-lg border border-gray-700" x-show="!preview">
                <img src="{{ $inovasi->gambar_url }}" alt="{{ $inovasi->judul }}"
                    class="max-h-48 w-auto rounded-md object-contain">
                <label class="mt-3 inline-flex items-center text-xs text-red-400 cursor-pointer">
                    <input type="checkbox" name="hapus_gambar" value="1"
                        class="mr-2 rounded bg-gray-700 border-gray-600 text-red-500">
                    Hapus gambar ini
                </label>
            </div>
        @endif

        <template x-if="preview">
            <img :src="preview" alt="Preview"
                class="mb-3 max-h-48 w-auto rounded-md object-contain border border-gray-700 p-1 bg-gray-800">
        </template>

        <input id="gambar" type="file" name="gambar" accept=".jpg,.jpeg,.png,.webp"
            @change="const f = $event.target.files[0]; preview = f ? URL.createObjectURL(f) : null"
            class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none file:bg-yellow-500 file:border-0 file:text-black file:font-semibold file:px-4 file:py-2 file:mr-4 hover:file:bg-yellow-400">
        <p class="mt-1 text-xs text-gray-400">JPG, PNG, atau WEBP. Maksimal 4MB.
            @if ($isEdit)
                Kosongkan jika tidak ingin mengganti.
            @endif
        </p>
        @error('gambar')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="file_pdf" class="block mb-2 text-sm font-medium text-gray-300">File PDF</label>

        @if ($isEdit && $inovasi->file_pdf)
            <div class="mb-3 p-3 bg-gray-800 rounded-lg border border-gray-700 flex flex-wrap items-center gap-4">
                <a href="{{ $inovasi->pdf_url }}" target="_blank" class="text-blue-400 hover:underline text-sm">
                    Lihat PDF saat ini
                </a>
                <label class="inline-flex items-center text-xs text-red-400 cursor-pointer">
                    <input type="checkbox" name="hapus_pdf" value="1"
                        class="mr-2 rounded bg-gray-700 border-gray-600 text-red-500">
                    Hapus PDF ini
                </label>
            </div>
        @endif

        <input id="file_pdf" type="file" name="file_pdf" accept=".pdf"
            class="block w-full text-sm text-gray-400 border border-gray-600 rounded-lg cursor-pointer bg-gray-700 focus:outline-none file:bg-yellow-500 file:border-0 file:text-black file:font-semibold file:px-4 file:py-2 file:mr-4 hover:file:bg-yellow-400">
        <p class="mt-1 text-xs text-gray-400">Format PDF. Maksimal 10MB. Isi gambar, PDF, atau keduanya (minimal salah
            satu).</p>
        @error('file_pdf')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="urutan" class="block mb-2 text-sm font-medium text-gray-300">Urutan Tampil</label>
        <input type="number" id="urutan" name="urutan" min="0"
            value="{{ old('urutan', $inovasi->urutan ?? '') }}" placeholder="Otomatis di urutan terakhir"
            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5">
        <p class="mt-1 text-xs text-gray-400">Angka lebih kecil tampil lebih dulu. Kosongkan untuk otomatis.</p>
        @error('urutan')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
        <a href="{{ route('admin.inovasi.index') }}"
            class="inline-flex justify-center items-center px-6 py-2 bg-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 transition">
            Batal
        </a>
        <button type="submit"
            class="inline-flex justify-center items-center px-6 py-2 bg-yellow-500 rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-400 transition">
            {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Inovasi' }}
        </button>
    </div>
</div>
