<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan SKCK - Polres Tulungagung</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            padding-top: 50px;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 20px;
            }
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
                <h1 class="text-4xl font-bold text-gray-800 uppercase">Layanan SKCK</h1>
                <p class="text-gray-500 mt-2">Informasi lengkap seputar penerbitan Surat Keterangan Catatan Kepolisian.
                </p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>

            <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-lg shadow-lg">

                {{-- Penambahan Visi dan Misi --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Visi & Misi Pelayanan</h2>
                <div class="space-y-4 text-gray-700 mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">Visi</h3>
                        <p class="mt-1">Mewujudkan Kepuasan Masyarakat dengan pelayanan yang santun, cepat, tepat dan
                            adil sesuai prosedur.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">Misi</h3>
                        <ol class="list-decimal list-inside space-y-1 mt-2">
                            <li>Pelayanan dengan 3S (Senyum Salam Sapa).</li>
                            <li>Menciptakan suasana pelayanan yang nyaman.</li>
                            <li>Menciptakan Pelayanan yang Efisien.</li>
                            <li>Menerima saran dan masukan yang membangun.</li>
                        </ol>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Dasar Hukum</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700 mb-8">
                    <li>UU RI No. 20 Tahun 1997 tentang Penerimaan Negara Bukan Pajak (PNBP).</li>
                    <li>UU RI No. 2 Tahun 2002 tentang Kepolisian Negara Republik Indonesia.</li>
                    <li>PP RI No. 76 Tahun 2020 tentang Jenis dan Tarif atas jenis Penerimaan Negara Bukan Pajak yang
                        berlaku pada Kepolisian Negara Republik Indonesia.</li>
                    <li>Perkap No. 18 Tahun 2014 tentang Tata Cara Penerbitan SKCK.</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Persyaratan SKCK</h2>
                <div class="space-y-6 text-gray-700 mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SKCK Baru</h3>
                        <ul class="list-disc list-inside space-y-2 mt-2">
                            <li>Fotokopi KTP (1 lembar).</li>
                            <li>Fotokopi Kartu Keluarga (1 lembar).</li>
                            <li>Fotokopi Akta Kelahiran / Ijazah Terakhir (1 lembar).</li>
                            <li>Pas Foto berwarna latar MERAH ukuran 4x6 (4 lembar).</li>
                            <li>Fotokopi Paspor (bagi yang ke luar negeri).</li>
                            <li>Mengisi daftar pertanyaan dan kartu TIK yang disediakan.</li>
                            <li>Pengambilan Sidik Jari oleh fungsi Reskrim (di Satreskrim Polres Tulungagung).</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">Perpanjangan SKCK</h3>
                        <ul class="list-disc list-inside space-y-2 mt-2">
                            <li>Fotokopi KTP (1 lembar).</li>
                            <li>Fotokopi SKCK lama (1 lembar).</li>
                            <li>Pas Foto berwarna latar MERAH ukuran 4x6 (4 lembar).</li>
                            <li>Mengisi formulir perpanjangan SKCK.</li>
                        </ul>
                        <p class="text-sm text-gray-600 mt-2">*Perpanjangan SKCK dapat dilakukan apabila masa berlaku
                            SKCK tidak lebih dari 1 (satu) tahun.</p>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Mekanisme Penerbitan SKCK (Manual)
                </h2>
                <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-8">
                    <li>Pemohon datang ke loket pelayanan SKCK dengan membawa berkas persyaratan.</li>
                    <li>Petugas loket memeriksa kelengkapan berkas. Jika tidak lengkap, berkas dikembalikan untuk
                        dilengkapi.</li>
                    <li>Jika berkas lengkap, pemohon mengisi daftar pertanyaan.</li>
                    <li>Berkas diproses melalui loket 2, 3, dan 4 untuk penelitian, registrasi, dan pencetakan.</li>
                    <li>SKCK diterbitkan dan diserahkan kepada pemohon di loket 5.</li>
                </ol>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Mekanisme Penerbitan SKCK (Online)
                </h2>
                <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-8">
                    <li>Unduh aplikasi **POLRI Super App** di Google Play Store atau App Store.</li>
                    <li>Registrasi akun dan pilih layanan "SKCK".</li>
                    <li>Isi formulir pendaftaran secara online dan unggah dokumen persyaratan yang diperlukan.</li>
                    <li>Lakukan pembayaran PNBP secara online melalui metode yang tersedia.</li>
                    <li>Setelah pendaftaran online selesai, datang ke loket pelayanan SKCK Polres Tulungagung untuk
                        verifikasi data dan pengambilan SKCK fisik.</li>
                </ol>

                <div class="text-center my-10">
                    <a href="https://play.google.com/store/apps/details?id=superapps.polri.presisi.presisi"
                        target="_blank"
                        class="inline-block bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg hover:bg-yellow-600 transition-colors shadow-lg">
                        <i class="fab fa-google-play mr-2"></i>
                        Download Aplikasi POLRI Super App
                    </a>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Biaya dan Waktu Pelayanan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <h3 class="font-semibold text-lg mb-2">Biaya Penerbitan</h3>
                        <p class="text-gray-700">Sesuai PP No. 76 Tahun 2020, biaya penerbitan SKCK adalah <span
                                class="font-bold">Rp 30.000,-</span>.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2">Waktu Pelayanan</h3>
                        <p class="text-gray-700">Proses penerbitan SKCK dilayani dalam waktu <span
                                class="font-bold">maksimal 15 menit</span> setelah berkas dinyatakan lengkap.</p>
                    </div>
                </div>

                {{-- Penambahan Peringatan --}}
                <div class="mt-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                    <p class="font-bold">PERINGATAN</p>
                    <p class="mt-1">"Sesuai Perkap No. 18 Tahun 2014 Pasal. 18, Masa berlaku SKCK yang telah
                        diterbitkan
                        akan dicabut dan dinyatakan tidak berlaku apabila : Pemohon melakukan tindak pidana, Ditemukan
                        data tindak pidana yang diduga dilakukan oleh pemohon."</p>
                </div>

                <div class="mt-10 pt-6 border-t">
                    <h3 class="text-center text-xl font-semibold text-gray-800 mb-6">Informasi & Pengaduan</h3>
                    <p class="text-center text-gray-700 mb-6">Untuk informasi lebih lanjut atau jika Anda memiliki
                        keluhan terkait pelayanan, silakan hubungi kami melalui media sosial atau datang langsung ke
                        lokasi Polres Tulungagung.</p>
                    <div class="flex justify-center items-center space-x-6">
                        <a href="https://wa.me/6285133041918" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-whatsapp fa-3x"></i></a>
                        <a href="https://www.instagram.com/skckpolrestulungagung/" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-instagram fa-3x"></i></a>
                        <a href="https://www.facebook.com/share/1Bqai5CohC/?mibextid=wwXIfr" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-facebook fa-3x"></i></a>
                    </div>
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
</body>

</html>
