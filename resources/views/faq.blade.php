<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Informasi - Polres Tulungagung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/images/lambang.png') }}" type="image/x-icon">
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

        .ai-profile-img {
            width: 32px;
            height: 32px;
            object-fit: cover;
            border-radius: 9999px;
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

    <main class="relative -mt-[116px]">
        <div class="relative min-h-screen md:h-screen flex items-center justify-center hero-bg bg-cover bg-center">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="relative z-10 container mx-auto px-4 text-center text-white" data-aos="fade-in">
                <h1 class="text-4xl lg:text-5xl font-bold uppercase">LAYANAN INFORMASI</h1>
                {{-- UBAH: Mengganti nama Chatbot di hero section --}}
                <p class="mt-4 text-lg lg:text-xl max-w-3xl mx-auto">Tanyakan segala hal tentang Polres Tulungagung
                    melalui GAYATRI AI</p>
            </div>
        </div>
    </main>


    <section id="chatbot-section" class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 uppercase tracking-wide">GAYATRI AI POLRES
                    Tulungagung</h2>
                <p class="text-gray-500 mt-2">Layanan chat real-time untuk menjawab pertanyaan Anda secara instan.</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>
            <div x-data="chatBot()" x-init="initChat()"
                class="max-w-3xl mx-auto bg-white rounded-lg shadow-2xl flex flex-col h-[600px] border border-gray-200">

                <div class="bg-black text-white p-4 rounded-t-lg flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                        <h3 class="font-bold">GAYATRI AI</h3>
                    </div>
                    <button @click="clearChat()" class="text-sm text-gray-400 hover:text-yellow-400">
                        <i class="fas fa-sync-alt mr-1"></i> Mulai Baru
                    </button>
                </div>

                <div id="chat-box" class="flex-1 overflow-y-auto p-4 space-y-4 flex flex-col-reverse"
                    x-ref="messagesContainer">
                    <div x-show="isLoading" class="flex justify-start items-start space-x-3">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('assets/images/gayatriai.png') }}" alt="GAYATRI AI"
                                class="ai-profile-img">
                        </div>
                        <div
                            class="bg-gray-100 text-gray-500 rounded-br-lg rounded-tr-lg rounded-tl-md p-3 max-w-[85%]">
                            <span class="inline-flex items-center">
                                <span class="animate-bounce">.</span><span class="animate-bounce"
                                    style="animation-delay: 100ms">.</span><span class="animate-bounce"
                                    style="animation-delay: 200ms">.</span>
                        </div>
                    </div>
                    <template x-for="message in messages.slice().reverse()" :key="message.id">
                        <div
                            :class="{
                                'flex justify-end': message.role === 'user',
                                'flex justify-start space-x-3 items-start': message.role === 'model'
                            }">
                            <template x-if="message.role === 'model'">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/images/gayatriai.png') }}" alt="GAYATRI AI"
                                        class="ai-profile-img">
                                </div>
                            </template>

                            <div
                                :class="{
                                    'bg-yellow-400 text-gray-900 rounded-bl-lg rounded-tl-lg rounded-br-md p-3 max-w-[85%] shadow': message
                                        .role === 'user',
                                    'bg-gray-300 text-gray-800 rounded-br-lg rounded-tr-lg rounded-tl-md p-3 max-w-[85%] shadow whitespace-pre-wrap': message
                                        .role === 'model'
                                }">
                                <p x-html="message.text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <form @submit.prevent="sendMessage()" class="p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <input type="text" x-model="newMessage" :disabled="isLoading"
                            placeholder="Ketik pesan Anda..."
                            class="flex-1 border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-l-md shadow-sm disabled:opacity-50">
                        <button type="submit" :disabled="!newMessage.trim() || isLoading"
                            class="bg-yellow-500 text-black font-semibold py-2 px-4 rounded-r-md hover:bg-yellow-600 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                    <p x-show="error" x-text="error" class="text-red-500 text-sm mt-2"></p>
                </form>
            </div>
        </div>
    </section>

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
            once: false,
        });
    </script>
</body>

</html>
