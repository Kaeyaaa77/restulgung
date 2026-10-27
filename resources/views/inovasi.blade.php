<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi - Polres Tulungagung</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/images/lambang.png') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .hero-bg {
            background-image: url("{{ asset('assets/images/Background.png') }}");
        }

        html,
        body {
            width: 100%;
            overflow-x: hidden;
        }

        body {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        body {
            padding-top: 116px;
        }

        @media (max-width: 768px) {
            body {
                padding-top: 80px;
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

    <div>
        <main class="relative -mt-[116px]">
            <div class="relative min-h-screen md:h-screen flex items-center justify-center hero-bg bg-cover bg-center">
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div class="relative z-10 container mx-auto px-4 text-center text-white" data-aos="fade-in">
                    <h1 class="text-4xl lg:text-5xl font-bold uppercase">Inovasi Polres Tulungagung</h1>
                    <p class="mt-4 text-lg lg:text-xl max-w-3xl mx-auto">Berbagai inovasi layanan publik untuk kemudahan
                        dan kenyamanan masyarakat Kabupaten Tulungagung.</p>
                </div>
            </div>
        </main>

        <section id="daftar-inovasi" class="bg-white py-20">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-bold text-gray-800 uppercase">Daftar Inovasi Unggulan</h2>
                    <div class="w-24 h-1 bg-yellow-400 mx-auto mt-2"></div>
                </div>
                {{-- INOVASI DINAMIS (dikelola lewat halaman admin), nomor mulai 1 --}}
                @foreach ($inovasisDinamis as $i => $item)
                    @php
                        $nomor = 1 + $i;
                        $reverse = $nomor % 2 === 0;
                    @endphp
                    <div class="flex flex-col {{ $reverse ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-8 md:gap-16 {{ $i > 0 ? 'mt-20' : '' }}"
                        data-aos="{{ $reverse ? 'fade-left' : 'fade-right' }}">
                        <div class="w-full md:w-1/2 min-w-0">
                            <div class="text-7xl lg:text-8xl font-bold text-yellow-400 mb-2">
                                {{ str_pad($nomor, 2, '0', STR_PAD_LEFT) }}</div>
                            <h3
                                class="text-3xl md:text-4xl font-bold text-gray-800 tracking-wider mb-4 uppercase break-words">
                                {{ $item->judul }}</h3>
                            @if ($item->deskripsi)
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi, 400) }}
                                </p>
                            @endif
                            <div class="mt-8 flex flex-wrap gap-3">
                                <a href="{{ route('inovasi.show', $item) }}"
                                    class="inline-block bg-yellow-400 text-black font-bold py-3 px-8 rounded-lg shadow-md hover:bg-yellow-500 transition-colors duration-300">
                                    LIHAT SELENGKAPNYA
                                </a>
                                @if ($item->file_pdf)
                                    <a href="{{ $item->pdf_url }}" target="_blank" rel="noopener"
                                        class="inline-flex items-center gap-2 border-2 border-gray-800 text-gray-800 font-bold py-3 px-6 rounded-lg hover:bg-gray-800 hover:text-white transition-colors duration-300">
                                        <i class="fas fa-file-pdf"></i> PDF
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 flex justify-center">
                            @if ($item->gambar)
                                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" loading="lazy"
                                    class="w-full h-auto max-h-[28rem] object-contain rounded-lg">
                            @else
                                <a href="{{ route('inovasi.show', $item) }}"
                                    class="w-full aspect-video rounded-lg bg-gradient-to-br from-gray-900 to-gray-700 flex flex-col items-center justify-center text-yellow-400 shadow-lg hover:scale-[1.02] transition-transform">
                                    <i class="fas fa-file-pdf text-6xl"></i>
                                    <span class="mt-3 text-sm font-semibold text-white">Dokumen PDF</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                @if ($inovasisDinamis->isEmpty())
                    <div class="text-center py-16 text-gray-500">
                        <i class="fas fa-lightbulb text-5xl text-yellow-400 mb-4"></i>
                        <p>Belum ada inovasi unggulan yang ditampilkan.</p>
                    </div>
                @endif
            </div>
        </section>

        <footer class="bg-black text-gray-300 pt-10 pb-6">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-gray-700 pb-6 mb-6"
                    data-aos="fade-up">
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
                            <li><a href="{{ route('faq.index') }}" class="hover:text-yellow-400">Layanan
                                    Informasi</a></li>
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
                    © 2026 Kepolisian Resor Tulungagung. Semua Hak Cipta Dilindungi.
                </div>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
        });
    </script>
</body>

</html>
