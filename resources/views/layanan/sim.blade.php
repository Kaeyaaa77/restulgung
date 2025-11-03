<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan SIM - Polres Tulungagung</title>
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
                <h1 class="text-4xl font-bold text-gray-800 uppercase">Layanan SIM</h1>
                <p class="text-gray-500 mt-2">Informasi lengkap seputar penerbitan Surat Izin Mengemudi oleh SATPAS
                    Polres Tulungagung.</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>

            <div class="max-w-4xl mx-auto bg-gray-50 p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Apa itu SATPAS?</h2>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Satuan Penyelenggara Administrasi SIM (SATPAS) Polres Tulungagung berkomitmen memberikan pelayanan
                    prima kepada masyarakat dalam proses penerbitan dan perpanjangan SIM. Kami melayani dengan motto
                    "CERIA" (Cepat, Efisien, Ramah, Ikhlas, Akuntabel) untuk memastikan kemudahan dan kenyamanan Anda.
                </p>

                {{-- Bagian Persyaratan diperbarui sesuai gambar --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Persyaratan Penerbitan SIM</h2>
                <div class="space-y-6 text-gray-700 mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SIM Baru dan Peningkatan Golongan</h3>
                        <ul class="list-disc list-inside space-y-2 mt-2">
                            <li>KTP Asli + Fotocopy 2 (dua) lembar.</li>
                            <li>Surat Keterangan Sehat.</li>
                            <li>SKUKP / Klinik Pengemudi (untuk peningkatan golongan SIM A Umum s/d BII Umum).</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SIM Perpanjangan dan SIM Rusak</h3>
                        <ul class="list-disc list-inside space-y-2 mt-2">
                            <li>KTP Asli + Fotocopy 2 (dua) lembar.</li>
                            <li>SIM Asli + Fotocopy 2 (dua) lembar.</li>
                            <li>Surat Keterangan Sehat.</li>
                            <li>SKUKP / Klinik Pengemudi (untuk SIM A Umum s/d BII Umum).</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SIM Hilang</h3>
                        <ul class="list-disc list-inside space-y-2 mt-2">
                            <li>KTP Asli + Fotocopy 2 (dua) lembar.</li>
                            <li>Surat Kehilangan dari Kepolisian.</li>
                            <li>Surat Keterangan Sehat.</li>
                            <li>SKUKP / Klinik Pengemudi (untuk SIM A Umum s/d BII Umum).</li>
                        </ul>
                    </div>
                </div>

                {{-- Bagian Alur Proses diperbarui sesuai gambar --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Alur Proses Penerbitan SIM</h2>
                <div class="space-y-6 text-gray-700 mb-8">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SIM Baru dan Peningkatan Golongan</h3>
                        <ol class="list-decimal list-inside space-y-2 mt-2">
                            <li>Menuju Loket Formulir dan melakukan Registrasi.</li>
                            <li>Melakukan pembayaran di Loket BRI.</li>
                            <li>Proses Foto SIM.</li>
                            <li>Mengikuti Ujian Teori.</li>
                            <li>Mengikuti Uji Praktek.</li>
                            <li>Menuju Loket Penyerahan SIM.</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-gray-800">SIM Perpanjangan dan SIM Rusak</h3>
                        <ol class="list-decimal list-inside space-y-2 mt-2">
                            <li>Menuju Loket Formulir.</li>
                            <li>Melakukan pembayaran di Loket BRI.</li>
                            <li>Melakukan Registrasi di Loket Registrasi.</li>
                            <li>Proses di Ruang Foto SIM.</li>
                            <li>Menuju Loket Penyerahan SIM.</li>
                        </ol>
                    </div>
                </div>

                {{-- Bagian Mekanisme diperbarui sesuai gambar --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Mekanisme Penerbitan SIM</h2>
                <ol class="list-decimal list-inside space-y-3 text-gray-700 mb-8">
                    <li><b>Pendaftaran:</b> Pemohon melakukan pengecekan persyaratan. Jika lengkap, petugas menginput
                        data dan memberikan tanda pendaftaran.</li>
                    <li><b>Pembayaran:</b> Pemohon membayar biaya PNBP di Loket BRI.</li>
                    <li><b>Identifikasi & Verifikasi:</b> Petugas melakukan pengecekan data, pengambilan sidik jari,
                        tanda tangan, dan foto pemohon.</li>
                    <li><b>Uji SIM:</b>
                        <ul class="list-disc list-inside ml-6 mt-2">
                            <li><b>Ujian Teori:</b> Pemohon mengerjakan ujian teori. Jika tidak lulus, dapat mengulang
                                setelah 7 hari.</li>
                            <li><b>Uji Keterampilan Simulator:</b> Khusus untuk SIM A Umum, BI, BII, dan BII Umum.</li>
                            <li><b>Ujian Praktik:</b> Setelah lulus ujian teori (dan simulator jika ada), pemohon
                                melanjutkan ke ujian praktek.</li>
                        </ul>
                    </li>
                    <li><b>Penerbitan SIM:</b> Jika semua ujian lulus, SIM akan dicetak dan diserahkan kepada pemohon.
                    </li>
                    <li><b>Pengarsipan:</b> Berkas pemohon diarsipkan sesuai tanggal pendaftaran.</li>
                </ol>

                {{-- Bagian Tarif diperbarui sesuai gambar --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Tarif PNBP Sesuai PP No. 76 Tahun
                    2020</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-4">
                    <div>
                        <h3 class="font-semibold text-lg mb-2">Penerbitan Baru</h3>
                        <table class="w-full text-left text-gray-700">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-2">SIM A, BI, BII, Umum</td>
                                    <td class="p-2 text-right">Rp 120.000,-</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2">SIM C, C I, C II</td>
                                    <td class="p-2 text-right">Rp 100.000,-</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2">SIM D, D I</td>
                                    <td class="p-2 text-right">Rp 50.000,-</td>
                                </tr>
                                <tr>
                                    <td class="p-2">SIM Internasional</td>
                                    <td class="p-2 text-right">Rp 250.000,-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg mb-2">Perpanjangan</h3>
                        <table class="w-full text-left text-gray-700">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-2">SIM A, BI, BII, Umum</td>
                                    <td class="p-2 text-right">Rp 80.000,-</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2">SIM C, C I, C II</td>
                                    <td class="p-2 text-right">Rp 75.000,-</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-2">SIM D, D I</td>
                                    <td class="p-2 text-right">Rp 30.000,-</td>
                                </tr>
                                <tr>
                                    <td class="p-2">SIM Internasional</td>
                                    <td class="p-2 text-right">Rp 225.000,-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                    <p class="font-bold">Biaya Tambahan: SKUKP (Klinik Pengemudi) sebesar Rp 50.000,-</p>
                </div>


                {{-- Bagian Jadwal SIM Keliling diperbarui sesuai gambar --}}
                <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4 mt-8">Jadwal SIM Keliling</h2>
                <table class="w-full text-left text-gray-700 mb-6">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3">Hari</th>
                            <th class="p-3">Lokasi/Alamat</th>
                            <th class="p-3">Jam Operasional</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3 font-medium">Senin</td>
                            <td class="p-3">Mbalong Kawuk, Ngunut</td>
                            <td class="p-3">08.00 - 11.00</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 font-medium">Selasa</td>
                            <td class="p-3">Kec. Kalidawir</td>
                            <td class="p-3">08.00 - 11.00</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 font-medium">Rabu</td>
                            <td class="p-3">Balai Desa Soko, Bandung</td>
                            <td class="p-3">08.00 - 11.00</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3 font-medium">Kamis</td>
                            <td class="p-3">MPP Tulungagung</td>
                            <td class="p-3">08.00 - 11.00</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-medium">Jum'at</td>
                            <td class="p-3">Balai Desa Pucung, Ngantru</td>
                            <td class="p-3">08.00 - 11.00</td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="font-bold text-lg text-gray-800">Persyaratan SIM Keliling:</h3>
                <ul class="list-disc list-inside space-y-2 mt-2 text-gray-700">
                    <li>Fotokopi e-KTP.</li>
                    <li>Membawa e-KTP.</li>
                    <li>Surat Test Psikologi.</li>
                    <li>Surat Keterangan Sehat.</li>
                </ul>
                <p class="text-sm text-gray-600 mt-2">*Surat keterangan sehat dan psikologi bisa dibuat di lokasi
                    (telah disiapkan).</p>
                <p class="text-sm text-gray-600">*Masa berlaku SIM H-2 hari.</p>
                <p class="text-sm text-gray-600">*Khusus untuk KTP dan SIM Tulungagung.</p>

                <div class="mt-10 pt-6 border-t">
                    <h3 class="text-center text-xl font-semibold text-gray-800 mb-6">Hubungi Kami & Informasi Lanjutan
                    </h3>
                    {{-- Ikon media sosial diubah menjadi hitam --}}
                    <div class="flex justify-center items-center space-x-6">
                        <a href="https://wa.me/6285173334960" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-whatsapp fa-3x"></i></a>
                        <a href="https://www.instagram.com/satpas_tulungagung/" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-instagram fa-3x"></i></a>
                        <a href="https://www.facebook.com/share/1CEJZxfFA2/?mibextid=wwXIfr/" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-facebook fa-3x"></i></a>
                        <a href="https://www.youtube.com/@SatlantasPolresTulungagung" target="_blank"
                            class="text-gray-800 hover:text-gray-600"><i class="fab fa-youtube fa-3x"></i></a>
                        <a href="https://x.com/SatpasTA" target="_blank" class="text-gray-800 hover:text-gray-600"><i
                                class="fab fa-twitter fa-3x"></i></a>
                    </div>

                    <div class="mt-8">
                        <div class="w-full aspect-video rounded-lg shadow-md overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15801.445800370544!2d111.908544!3d-8.064565!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e31f6c6043f1%3A0x65e5a9ad219582c0!2sSatpas%20Polres%20Tulungagung!5e0!3m2!1sid!2sus!4v1756096884238!5m2!1sid!2sus"
                                width="900" height="500" width="100%" height="500" style="border:0;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
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
