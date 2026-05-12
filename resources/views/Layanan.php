<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Layanan Umum - Polres Tulungagung</title>
    <!-- Memuat Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Menggunakan font Inter untuk tampilan yang lebih modern */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Gaya untuk gambar latar belakang hero */
        .hero-bg {
            /* Ganti dengan URL gambar latar belakang Anda */
            background-image: url("https://placehold.co/1920x1080/000000/FFFFFF?text=Gedung+Polres");
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header Utama -->
    <header class="bg-black bg-opacity-70 text-white absolute top-0 left-0 right-0 z-20">
        <div class="container mx-auto px-4 py-2">
            <div class="flex justify-between items-center border-b border-gray-600 pb-2">
                <div class="flex items-center space-x-3">
                    <!-- Ganti dengan URL logo Anda -->
                    <img src="https://placehold.co/100x100/ffffff/000000?text=LOGO" alt="Logo Polri" class="h-12">
                    <div>
                        <h1 class="text-sm font-bold uppercase">Kepolisian Negara Republik Indonesia</h1>
                        <h2 class="text-xs uppercase">Daerah Jawa Timur - Resor Tulungagung</h2>
                    </div>
                </div>
                <div class="text-right text-xs hidden md:block">
                    <p>Jl. Ahmad Yani Timur No.9, Bago, Kec. Tulungagung,</p>
                    <p>Kabupaten Tulungagung, Jawa Timur 66212</p>
                </div>
            </div>
            <nav class="flex justify-center items-center pt-2">
                <ul class="flex space-x-6 text-sm font-semibold">
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">BERANDA</a></li>
                    <li><a href="#" class="hover:text-yellow-400 border-b-2 border-yellow-400 pb-1">LAYANAN</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">PROFIL</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">INOVASI</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">BERITA</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition-colors">FAQ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="relative h-[50vh] min-h-[300px]">
        <div class="h-full flex items-center justify-center hero-bg bg-cover bg-center">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative z-10 container mx-auto px-4 text-center text-white">
                <h1 class="text-4xl lg:text-5xl font-bold uppercase">Informasi Layanan Umum</h1>
                <p class="mt-4 text-lg lg:text-xl max-w-3xl mx-auto">Prosedur dan informasi terkait layanan kepolisian yang tersedia untuk masyarakat di Polres Tulungagung.</p>
            </div>
        </div>
    </main>

    <!-- Konten Layanan Umum -->
    <section id="layanan-umum" class="py-20 bg-white">
        <div class="container mx-auto px-4">

            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-wider">Layanan Kepolisian</h2>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-2"></div>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami berkomitmen untuk memberikan pelayanan terbaik. Temukan informasi yang Anda butuhkan di bawah ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                <!-- Card 1: BPKB & STNK -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">BPKB & STNK</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Informasi lengkap mengenai prosedur pengurusan BPKB dan STNK kendaraan bermotor.</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

                <!-- Card 2: Layanan SIM -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12.75a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.863 20.425a18.02 18.02 0 0 1 16.274 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12c0-5.03 4.48-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.48 9-9.75 9s-9.75-3.97-9.75-9Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Layanan SIM</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Prosedur pembuatan baru dan perpanjangan Surat Izin Mengemudi (SIM).</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

                <!-- Card 3: Layanan SKCK -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Layanan SKCK</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Syarat dan alur pembuatan Surat Keterangan Catatan Kepolisian (SKCK).</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

                <!-- Card 4: Pengawalan -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Pengawalan</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Prosedur untuk mengajukan permohonan pengawalan jalan raya oleh petugas.</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

                <!-- Card 5: Izin Keramaian -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m-7.5-2.962A3.75 3.75 0 0 1 9 10.5V9A4.5 4.5 0 0 1 13.5 4.5v.75m-6.75 6.75a3.75 3.75 0 0 0-3.75-3.75V9a4.5 4.5 0 0 0 4.5-4.5v.75m10.5 6.75a3.75 3.75 0 0 0-3.75-3.75V9a4.5 4.5 0 0 0 4.5-4.5v.75M9 12.75a3.75 3.75 0 0 0-3.75 3.75v.75m3.75-4.5a3.75 3.75 0 0 1 3.75 3.75v.75m-3.75-4.5a3.75 3.75 0 0 0 3.75 3.75v.75M9 15v.75A3.75 3.75 0 0 0 12.75 19.5h.75" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Izin Keramaian</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Informasi dan prosedur untuk mendapatkan izin penyelenggaraan acara keramaian.</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

                <!-- Card 6: Besuk Tahanan -->
                <div class="bg-gray-50 p-8 rounded-lg text-center shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    <div class="w-24 h-24 bg-yellow-100 rounded-full mx-auto flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Besuk Tahanan</h3>
                    <p class="text-gray-500 mt-2 flex-grow">Jadwal dan tata tertib serta prosedur untuk melakukan kunjungan besuk tahanan.</p>
                    <a href="#" class="bg-yellow-400 text-gray-900 font-semibold py-2 px-5 rounded-lg mt-6 hover:bg-yellow-500 transition-colors">Selengkapnya</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2026 Kepolisian Resor Tulungagung. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>

</html>