<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan SPKT - Polres Tulungagung</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            padding-top: 50px;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 20px;
            }
        }

        /* Style untuk peta */
        #map-user {
            height: 400px;
            width: 100%;
            border-radius: 0.5rem;
            /* rounded-lg */
            z-index: 10;
            /* Penting untuk interaksi peta */
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <header x-data="{ open: false }" class="bg-black text-white fixed top-0 left-0 right-0 z-30 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-2 border-b border-gray-600">
                <div class="flex items-center space-x-4 min-w-0">
                    <img src="{{ asset('assets/images/lambang.png') }}" alt="Logo Polri" class="h-12 flex-shrink-0">
                    <img src="{{ asset('assets/images/poldajatim.png') }}" alt="Logo Polda Jatim"
                        class="h-12 flex-shrink-0">
                    <div class="hidden sm:block">
                        <h1 class="text-sm font-bold uppercase">Kepolisian Negara Republik Indonesia</h1>
                        <h2 class="text-xs uppercase">Daerah Jawa Timur - Resor Tulungagung</h2>
                    </div>
                </div>
                <div class="text-right text-xs hidden md:block flex-shrink-0 ml-4">
                    <p>Jl. Ahmad Yani Timur No.9, Bago, Kec. Tulungagung,</p>
                    <p>Kabupaten Tulungagung, Jawa Timur 66212</p>
                </div>
                <div class="md:hidden flex-shrink-0 ml-4">
                    <button @click="open = !open" class="text-white focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <nav class="hidden md:flex justify-center items-center pt-3 pb-2">
                <ul class="flex space-x-6 text-sm font-semibold">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400">BERANDA</a></li>
                    <li><a href="{{ url('/#layanan-umum') }}" class="hover:text-yellow-400">LAYANAN</a></li>
                    <li><a href="{{ url('/#berita') }}" class="hover:text-yellow-400">BERITA</a></li>
                    <li><a href="{{ route('profil.publik') }}" class="hover:text-yellow-400">PROFIL</a></li>
                    <li><a href="{{ route('inovasi.index') }}" class="hover:text-yellow-400">INOVASI</a></li>
                    <li><a href="{{ route('faq.index') }}" class="hover:text-yellow-400">LAYANAN INFORMASI</a></li>
                </ul>
            </nav>
        </div>
        <div x-show="open" @click.away="open = false" class="md:hidden bg-black border-t border-gray-700" x-transition>
            <ul class="flex flex-col items-center py-4 space-y-4 text-sm font-semibold">
                <li><a href="{{ url('/') }}" class="hover:text-yellow-400">BERANDA</a></li>
                <li><a href="{{ url('/#layanan-umum') }}" class="hover:text-yellow-400">LAYANAN</a></li>
                <li><a href="{{ url('/#berita') }}" class="hover:text-yellow-400">BERITA</a></li>
                <li><a href="{{ route('profil.publik') }}" class="hover:text-yellow-400">PROFIL</a></li>
                <li><a href="{{ route('inovasi.index') }}" class="hover:text-yellow-400">INOVASI</a></li>
                <li><a href="{{ route('faq.index') }}" class="hover:text-yellow-400">LAYANAN INFORMASI</a></li>
            </ul>
        </div>
    </header>

    <main class="bg-white py-20">
        <div class="container mx-auto px-6">
            <a href="{{ url('/#layanan-umum') }}"
                class="inline-flex items-center mb-8 text-gray-600 hover:text-yellow-500 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Layanan
            </a>

            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 uppercase">Sentra Pelayanan Kepolisian Terpadu</h1>
                <p class="text-gray-500 mt-2">Pusat Pelaporan dan Pengaduan Masyarakat Polres Tulungagung.</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>

            <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-lg shadow-lg">
                <div class="prose max-w-none text-gray-700">
                    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Apa itu SPKT?</h2>
                    <p>SPKT (Sentra Pelayanan Kepolisian Terpadu) adalah pusat pelayanan terdepan Kepolisian yang
                        bertugas memberikan pelayanan kepada masyarakat dalam bentuk penerimaan Laporan Polisi (LP),
                        Surat Tanda Terima Laporan Polisi (STTLP), dan pengaduan lainnya. SPKT merupakan gerbang utama
                        bagi masyarakat yang membutuhkan bantuan kepolisian.</p>

                    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4 mt-8">Visi dan Misi</h2>
                    <h3 class="font-bold text-lg text-gray-800">Visi</h3>
                    <p>"Terwujudnya pelayanan prima guna mendukung supremasi hukum dalam rangka menciptakan Kamtibmas
                        yang kondusif."</p>

                    <h3 class="font-bold text-lg text-gray-800 mt-4">Misi</h3>
                    <ol class="list-decimal list-inside space-y-2 mt-2">
                        <li>Memberikan pelayanan Kepolisian kepada masyarakat secara mudah, cepat, tepat, transparan,
                            dan akuntabel.</li>
                        <li>Meningkatkan kualitas sumber daya manusia SPKT yang profesional, modern, dan terpercaya.
                        </li>
                        <li>Mengoptimalkan pemanfaatan teknologi informasi dalam menunjang pelayanan Kepolisian.</li>
                        <li>Membangun kemitraan dengan masyarakat dan instansi terkait dalam rangka pemeliharaan
                            Kamtibmas.</li>
                    </ol>

                    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4 mt-8">Produk Layanan</h2>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Penerimaan Laporan Polisi (LP).</li>
                        <li>Penerimaan Laporan Kehilangan Barang/Surat.</li>
                        <li>Penerimaan Pengaduan Masyarakat.</li>
                        <li>Pemberian Surat Tanda Terima Laporan Polisi (STTLP).</li>
                        <li>Penanganan pertama Tempat Kejadian Perkara (TPTKP) untuk kasus ringan.</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4 mt-8">Persyaratan Pelayanan</h2>
                    <p>Untuk membuat laporan, masyarakat diharapkan membawa:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Identitas diri pelapor (KTP/SIM/Paspor).</li>
                        <li>Data terlapor (jika ada/diketahui).</li>
                        <li>Bukti-bukti awal yang relevan dengan perkara yang dilaporkan (jika ada).</li>
                        <li>Mengetahui kronologis singkat kejadian.</li>
                    </ul>

                    <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4 mt-8">Mekanisme Pelayanan</h2>
                    <ol class="list-decimal list-inside space-y-3">
                        <li>Pelapor datang ke ruang SPKT Polres Tulungagung.</li>
                        <li>Petugas SPKT menyambut dan menanyakan keperluan pelapor.</li>
                        <li>Pelapor menyampaikan maksud dan tujuan serta menjelaskan kronologi kejadian.</li>
                        <li>Petugas melakukan wawancara singkat untuk melengkapi informasi.</li>
                        <li>Petugas membuatkan Laporan Polisi (LP) atau Surat Tanda Terima Laporan (STTL) sesuai jenis
                            laporan.</li>
                        <li>Pelapor menandatangani laporan yang telah dibuat.</li>
                        <li>Petugas menyerahkan salinan STTLP kepada pelapor sebagai bukti lapor.</li>
                    </ol>

                    <div class="mt-8 text-center bg-blue-50 border-t-4 border-blue-500 p-6 rounded-b-lg">
                        <p class="font-bold text-blue-800">Seluruh proses pelayanan di SPKT tidak dipungut biaya
                            (GRATIS).</p>
                    </div>
                </div>

                <div id="form-aduan" class="mt-16 pt-8 border-t-2 border-gray-200">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 uppercase">Form Aduan Online</h2>
                        <p class="text-gray-500 mt-2">Sampaikan kritik, saran, atau laporan Anda secara online.</p>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 p-4 text-sm text-green-800 bg-green-100 rounded-lg text-center" role="alert">
                            <span class="font-medium">Berhasil!</span> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('layanan.aduan.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        <div>
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama
                                Pelapor</label>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                                required>
                            @error('nama')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenis_aduan" class="block mb-2 text-sm font-medium text-gray-700">Jenis
                                Aduan</label>
                            <input type="text" id="jenis_aduan" name="jenis_aduan"
                                value="{{ old('jenis_aduan') }}"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                                placeholder="Contoh: Kehilangan Barang, Tindak Kriminal, dll." required>
                            @error('jenis_aduan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="waktu_kejadian" class="block mb-2 text-sm font-medium text-gray-700">Waktu
                                    Kejadian</label>
                                <input type="datetime-local" id="waktu_kejadian" name="waktu_kejadian"
                                    value="{{ old('waktu_kejadian') }}"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                                    required>
                                @error('waktu_kejadian')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="isi_laporan" class="block mb-2 text-sm font-medium text-gray-700">Isi Laporan
                                / Kronologi</label>
                            <textarea id="isi_laporan" name="isi_laporan" rows="5"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
                                required>{{ old('isi_laporan') }}</textarea>
                            @error('isi_laporan')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="lokasi_kejadian_text"
                                    class="block mb-2 text-sm font-medium text-gray-700">Lokasi
                                    Kejadian</label>
                                <input type="text" id="lokasi_kejadian_text"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-default"
                                    placeholder="Gunakan Lokasi Saya atau klik pada peta..."
                                    value="{{ old('lokasi_kejadian') }}" readonly required>
                                <input type="hidden" id="lokasi_kejadian" name="lokasi_kejadian"
                                    value="{{ old('lokasi_kejadian') }}" required>
                                <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}"
                                    required>
                                <input type="hidden" id="longitude" name="longitude"
                                    value="{{ old('longitude') }}" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" id="use-my-location"
                                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors shadow-md mb-4">
                                <i class="fas fa-crosshairs mr-2"></i> Gunakan Lokasi Saya Sekarang
                            </button>
                            <div id="map-user"></div>
                            <p class="mt-2 text-xs text-gray-500">
                                <i class="fas fa-info-circle mr-1"></i> Klik pada peta atau seret marker untuk menandai
                                lokasi kejadian.
                            </p>
                            @error('latitude')
                                <p class="mt-1 text-xs text-red-500">Lokasi kejadian wajib ditandai pada peta.</p>
                            @enderror
                        </div>

                        <div>
                            <label for="bukti" class="block mb-2 text-sm font-medium text-gray-700">Upload Bukti
                                (Opsional)</label>
                            <input type="file" id="bukti" name="bukti"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, PDF. Maksimal 2MB.</p>
                            @error('bukti')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit"
                                class="bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg hover:bg-yellow-600 transition-colors shadow-lg">
                                Kirim Laporan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- PENAMBAHAN BAGIAN CALL CENTER --}}
                <div class="mt-12 text-center bg-red-50 border-t-4 border-red-500 p-6 rounded-lg">
                    <p class="font-bold text-red-800">UNTUK KEADAAN DARURAT, SEGERA HUBUNGI:</p>
                    <p class="text-4xl font-bold text-red-700 mt-2">CALL CENTER POLRI 110</p>
                    <p class="text-red-700 mt-1">Layanan 24 Jam Bebas Pulsa</p>
                </div>

            </div>
        </div>
    </main>

    <footer class="bg-black text-gray-300 pt-10 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-gray-700 pb-6 mb-6" data-aos="fade-up">
                <div>
                    <h4 class="text-white text-md font-bold mb-3">POLRES TULUNGAGUNG</h4>
                    <p class="text-xs text-gray-400 leading-relaxed">Website resmi Kepolisian Resor Tulungagung.
                        Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat.</p>
                </div>
                <div>
                    <h4 class="text-white text-md font-bold mb-3">TAUTAN CEPAT</h4>
                    <ul class="space-y-1 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-yellow-400">Beranda</a></li>
                        <li><a href="{{ route('profil.publik') }}" class="hover:text-yellow-400">Profil</a></li>
                        <li><a href="{{ route('inovasi.index') }}" class="hover:text-yellow-400">Inovasi</a></li>
                        <li><a href="{{ route('faq.index') }}" class="hover:text-yellow-400">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white text-md font-bold mb-3">HUBUNGI KAMI</h4>
                    <ul class="space-y-2 text-xs">
                        <li>
                            <a href="https://maps.google.com/?q=Jl.+Ahmad+Yani+Timur+No.9,+Bago,+Kec.+Tulungagung,+Kabupaten+Tulungagung,+Jawa+Timur+66212"
                                target="_blank" rel="noopener noreferrer" class="flex items-start group">
                                <i class="fas fa-map-marker-alt mt-1 mr-3 text-yellow-400 w-3 text-center"></i>
                                <span class="text-gray-400 group-hover:text-yellow-400 transition-colors">Jl. Ahmad
                                    Yani Timur No.9, Bago, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur
                                    66212</span>
                            </a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-yellow-400 w-3 text-center"></i>
                            <span class="text-gray-400">110</span>
                        </li>
                    </ul>
                    <div class="flex space-x-3 mt-4">
                        <a href="https://www.facebook.com/humastulungagung?mibextid=LQQJ4d" aria-label="Facebook"
                            class="text-gray-300 hover:text-yellow-400"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/Res1Tulungagung?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                            aria-label="Twitter" class="text-gray-300 hover:text-yellow-400"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/polrestulungagung?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                            aria-label="Instagram" class="text-gray-300 hover:text-yellow-400"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@humaspolrestulungagung2604" aria-label="Youtube"
                            class="text-gray-300 hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center text-xs text-gray-500">
                © 2025 Kepolisian Resor Tulungagung. Semua Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- SCRIPT LEAFLET UNTUK FORM PENGADUAN --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let map;
            let marker;
            const defaultPos = [-8.0673, 111.9004]; // Default: Polres Tulungagung

            // Inisialisasi peta
            map = L.map('map-user').setView(defaultPos, 13);
            var satelitLayer = L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    maxZoom: 20,
                    maxNativeZoom: 17,
                    attribution: 'Satelit © Esri'
                });
            var labelOSMLayer = L.tileLayer(
                'https://{s}.basemaps.cartocdn.com/rastertiles/voyager_only_labels/{z}/{x}/{y}{r}.png', {
                    maxZoom: 20,
                    attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                });

            satelitLayer.addTo(map);
            labelOSMLayer.addTo(map);

            const oldLat = document.getElementById('latitude').value;
            const oldLng = document.getElementById('longitude').value;

            if (oldLat && oldLng) {
                const oldPos = [parseFloat(oldLat), parseFloat(oldLng)];
                map.setView(oldPos, 15);
                placeMarker(oldPos, map);
            }

            function reverseGeocode(latLng) {
                const url =
                    `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latLng.lat}&lon=${latLng.lng}&zoom=18&addressdetails=1`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Gunakan nama tampilan lengkap atau fallback ke koordinat
                        const address = data.display_name ||
                            `Koordinat: ${latLng.lat.toFixed(6)}, ${latLng.lng.toFixed(6)}`;
                        document.getElementById('lokasi_kejadian_text').value = address;
                        document.getElementById('lokasi_kejadian').value = address;
                    })
                    .catch(error => {
                        console.error('Error fetching geocode:', error);
                        const fallbackAddress = `Koordinat: ${latLng.lat.toFixed(6)}, ${latLng.lng.toFixed(6)}`;
                        document.getElementById('lokasi_kejadian_text').value = fallbackAddress;
                        document.getElementById('lokasi_kejadian').value = fallbackAddress;
                    });
            }

            // Fungsi untuk menempatkan marker dan memperbarui field
            function placeMarker(latLng, map) {
                if (marker) {
                    marker.setLatLng(latLng); // Pindahkan marker yang sudah ada
                } else {
                    marker = L.marker(latLng, {
                        draggable: true
                    }).addTo(map);
                    marker.on('dragend', function(e) {
                        updateLocationFields(e.target.getLatLng());
                    });
                }
                updateLocationFields(latLng);
            }

            // Fungsi untuk memperbarui field hidden dan input teks
            function updateLocationFields(latLng) {
                document.getElementById('latitude').value = latLng.lat;
                document.getElementById('longitude').value = latLng.lng;
                reverseGeocode(latLng);
            }

            // Event listener klik pada peta
            map.on('click', function(e) {
                placeMarker(e.latlng, map);
                map.setView(e.latlng, 15);
            });

            // Listener untuk tombol "Gunakan Lokasi Saya"
            document.getElementById('use-my-location').addEventListener('click', () => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const latLng = L.latLng(position.coords.latitude, position.coords
                                .longitude);
                            placeMarker(latLng, map);
                            map.setView(latLng, 16);
                        },
                        () => {
                            alert(
                                "Error: Layanan geolokasi gagal atau ditolak. Silakan klik pada peta untuk memilih lokasi."
                            );
                        }
                    );
                } else {
                    alert(
                        "Browser Anda tidak mendukung layanan geolokasi. Silakan klik pada peta untuk memilih lokasi."
                    );
                }
            });
        });
    </script>
</body>

</html>
