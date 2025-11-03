<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi Pos Digital Astuti - Polres Tulungagung</title>
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

    {{-- MAIN CONTENT --}}
    <main class="bg-white py-20">
        <div class="container mx-auto px-6">
            <a href="{{ route('inovasi.index') }}"
                class="inline-flex items-center mb-8 text-gray-600 hover:text-yellow-500 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Inovasi
            </a>

            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 uppercase">Pos Digital Astuti</h1>
                <p class="text-gray-500 mt-2">Pos Polisi Digital dengan Layanan Terpadu</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>

            <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-lg shadow-lg text-gray-700">
                <p class="mb-6 leading-relaxed">
                    <strong>Pos Digital Astuti</strong> adalah sebuah terobosan dari Polres Tulungagung yang mengubah
                    fungsi pos polisi konvensional menjadi pusat layanan digital. Terletak di simpang empat TT, pos ini
                    dirancang untuk memberikan berbagai kemudahan bagi masyarakat.
                </p>

                {{-- GAMBAR INOVASI --}}
                <div class="my-8 text-center">
                    <img src="{{ asset('assets/images/POSDIGITAL.jpeg') }}" alt="Pos Digital Astuti"
                        class="mx-auto rounded-lg shadow-lg max-w-full h-auto">
                </div>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Layanan Unggulan</h2>
                <ul class="list-disc pl-5 space-y-2 mb-6">
                    <li><strong>Laporan Kehilangan:</strong> Masyarakat dapat membuat laporan kehilangan surat-surat
                        berharga dengan cepat.</li>
                    <li><strong>Informasi Kepolisian:</strong> Pusat informasi mengenai layanan kepolisian dan jadwal
                        penting.</li>
                    <li><strong>Perpanjangan SIM dan SKCK:</strong> Bekerja sama dengan layanan keliling untuk
                        memudahkan
                        proses perpanjangan.</li>
                    <li><strong>Fasilitas Digital:</strong> Dilengkapi dengan Wi-Fi gratis, area pengisian daya, dan
                        tempat istirahat.</li>
                </ul>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Konsep dan Desain</h2>
                <p class="mb-6">
                    Pos ini didesain modern dan nyaman, dengan petugas yang siap memberikan pelayanan humanis. Tujuannya
                    adalah untuk menghilangkan kesan "angker" dari pos polisi dan menjadikannya lebih dekat dengan
                    masyarakat.
                </p>

                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Tujuan Pembangunan</h2>
                <p>
                    <strong>Pos Digital Astuti</strong> diharapkan menjadi model bagi pos polisi lainnya,
                    mengintegrasikan teknologi dan pelayanan publik untuk menciptakan rasa aman dan nyaman bagi seluruh
                    warga Tulungagung.
                </p>
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
                            <a href="https://maps.google.com/?q=Jalan+Ahmad+Yani+Timur+No.9,+Bago,+Kec.+Tulungagung,+Kabupaten+Tulungagung,+Jawa+Timur+66212"
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
            once: true
        });
    </script>
</body>

</html>
