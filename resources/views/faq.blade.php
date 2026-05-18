<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            flex-shrink: 0;
        }

        /* Bubble pesan AI */
        .chat-bubble-ai {
            background-color: #f3f4f6;
            color: #111827;
            border-radius: 0 12px 12px 12px;
            padding: 12px 16px;
            max-width: 85%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* Bubble pesan User */
        .chat-bubble-user {
            background-color: #fbbf24;
            color: #111827;
            border-radius: 12px 0 12px 12px;
            padding: 10px 14px;
            max-width: 80%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            font-size: 0.875rem;
            line-height: 1.5;
            font-weight: 500;
        }

        .chat-bubble-ai p {
            margin-bottom: 0.5rem;
        }

        .chat-bubble-ai p:last-child {
            margin-bottom: 0;
        }

        /* Ordered list (1. 2. 3.) */
        .chat-bubble-ai ol {
            list-style: decimal;
            padding-left: 1.4rem;
            margin: 0.5rem 0;
        }

        .chat-bubble-ai ol li {
            margin-bottom: 0.5rem;
            padding-left: 0.25rem;
        }

        /* Unordered list (* - •) */
        .chat-bubble-ai ul {
            list-style: disc;
            padding-left: 1.4rem;
            margin: 0.25rem 0;
        }

        .chat-bubble-ai ul li {
            margin-bottom: 0.25rem;
            padding-left: 0.25rem;
        }

        .chat-bubble-ai li>ul {
            margin-top: 0.25rem;
            list-style: circle;
        }

        .chat-bubble-ai strong {
            font-weight: 700;
            color: #1f2937;
        }

        .chat-bubble-ai hr {
            border: none;
            border-top: 1px solid #d1d5db;
            margin: 0.75rem 0;
        }

        .chat-bubble-ai code {
            background: #e5e7eb;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-family: monospace;
        }

        .chat-bubble-ai .hotline {
            display: inline-block;
            background: #fef3c7;
            border: 1px solid #fbbf24;
            color: #92400e;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        @keyframes bounce {

            0%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-6px);
            }
        }

        .dot-1 {
            animation: bounce 1.2s infinite 0s;
        }

        .dot-2 {
            animation: bounce 1.2s infinite 0.2s;
        }

        .dot-3 {
            animation: bounce 1.2s infinite 0.4s;
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
                <p class="mt-4 text-lg lg:text-xl max-w-3xl mx-auto">
                    Tanyakan segala hal tentang Polres Tulungagung melalui <strong>GAYATRI AI</strong>
                </p>
            </div>
        </div>
    </main>

    <section id="chatbot-section" class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">

            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 uppercase tracking-wide">
                    GAYATRI AI POLRES Tulungagung
                </h2>
                <p class="text-gray-500 mt-2">Layanan chat real-time untuk menjawab pertanyaan Anda secara instan.</p>
                <div class="w-24 h-1 bg-yellow-400 mx-auto mt-4"></div>
            </div>
            <div x-data="chatBot()" x-init="initChat()"
                class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl flex flex-col border border-gray-200 overflow-hidden"
                style="height: 620px;">
                <div class="bg-black text-white px-5 py-4 flex justify-between items-center flex-shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <img src="{{ asset('assets/images/Gayatriai.png') }}" alt="Gayatri AI"
                                class="w-9 h-9 rounded-full object-cover border-2 border-yellow-400">
                            <span
                                class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-400 rounded-full border border-black"></span>
                        </div>
                        <div>
                            <p class="font-bold text-sm tracking-wide">GAYATRI AI</p>
                            <p class="text-xs text-gray-400">Asisten Virtual Polres Tulungagung</p>
                        </div>
                    </div>
                    <button @click="clearChat()"
                        class="flex items-center gap-1 text-xs text-gray-400 hover:text-yellow-400 transition-colors">
                        <i class="fas fa-rotate-right text-xs"></i>
                        <span>Mulai Baru</span>
                    </button>
                </div>

                <div id="chat-messages" class="flex-1 overflow-y-auto px-4 py-5 space-y-4 bg-gray-50"
                    x-ref="messagesContainer">
                    <template x-for="message in messages" :key="message.id">

                        <div class="w-full">
                            <div x-show="message.role === 'model'" class="flex items-start gap-2">
                                <img src="{{ asset('assets/images/Gayatriai.png') }}" alt="AI"
                                    class="ai-profile-img mt-1">
                                <div class="chat-bubble-ai" x-html="parseMarkdown(message.text)"></div>
                            </div>
                            <div x-show="message.role === 'user'" class="flex justify-end">
                                <div class="chat-bubble-user" x-text="message.text"></div>
                            </div>

                        </div>
                    </template>

                    <div x-show="isLoading" class="flex items-start gap-2">
                        <img src="{{ asset('assets/images/Gayatriai.png') }}" alt="AI"
                            class="ai-profile-img mt-1">
                        <div class="chat-bubble-ai flex items-center gap-1 px-4 py-3">
                            <span class="dot-1 inline-block w-2 h-2 bg-gray-400 rounded-full"></span>
                            <span class="dot-2 inline-block w-2 h-2 bg-gray-400 rounded-full"></span>
                            <span class="dot-3 inline-block w-2 h-2 bg-gray-400 rounded-full"></span>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 border-t border-gray-200 bg-white flex-shrink-0">
                    <form @submit.prevent="sendMessage()" class="flex items-center gap-2">
                        <input type="text" x-model="newMessage" :disabled="isLoading"
                            placeholder="Ketik pertanyaan Anda di sini..."
                            class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm
                                   focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-100
                                   disabled:opacity-50 disabled:cursor-not-allowed transition">
                        <button type="submit" :disabled="!newMessage.trim() || isLoading"
                            class="w-10 h-10 flex items-center justify-center rounded-full
                                   bg-yellow-400 hover:bg-yellow-500 text-black
                                   disabled:bg-gray-300 disabled:cursor-not-allowed
                                   transition-colors flex-shrink-0">
                            <i class="fas fa-paper-plane text-sm"></i>
                        </button>
                    </form>
                </div>
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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false
        });
    </script>

    <script>
        function parseMarkdown(text) {
            if (!text) return '';

            let html = text;

            html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

            html = html.replace(/(?<!\*)\*(?!\*)(.*?)(?<!\*)\*(?!\*)/g, '<em>$1</em>');

            html = html.replace(/^[-=]{3,}\s*$/gm, '<hr>');

            const lines = html.split('\n');
            const result = [];
            let inOl = false;
            let inUl = false;
            let inSubUl = false;

            for (let i = 0; i < lines.length; i++) {
                const line = lines[i];
                const subListMatch = line.match(/^[ \t]{2,}[\*\-•]\s+(.*)/);
                const olMatch = line.match(/^(\d+)\.\s+(.*)/);
                const ulMatch = line.match(/^[\*\-•]\s+(.*)/);

                if (subListMatch) {
                    if (!inSubUl) {
                        if (result.length > 0) {
                            const last = result[result.length - 1];
                            if (last.endsWith('</li>')) {
                                result[result.length - 1] = last.slice(0, -5) + '<ul>';
                                inSubUl = true;
                            }
                        }
                    }
                    result.push(`<li>${subListMatch[1]}</li>`);

                } else if (olMatch) {
                    if (inSubUl) {
                        result.push('</ul></li>');
                        inSubUl = false;
                    }
                    if (inUl) {
                        result.push('</ul>');
                        inUl = false;
                    }
                    if (!inOl) {
                        result.push('<ol>');
                        inOl = true;
                    }
                    result.push(`<li>${olMatch[2]}</li>`);

                } else if (ulMatch) {
                    if (inSubUl) {
                        result.push('</ul></li>');
                        inSubUl = false;
                    }
                    if (inOl) {
                        result.push('</ol>');
                        inOl = false;
                    }
                    if (!inUl) {
                        result.push('<ul>');
                        inUl = true;
                    }
                    result.push(`<li>${ulMatch[1]}</li>`);

                } else {
                    if (inSubUl) {
                        result.push('</ul></li>');
                        inSubUl = false;
                    }
                    if (inOl) {
                        result.push('</ol>');
                        inOl = false;
                    }
                    if (inUl) {
                        result.push('</ul>');
                        inUl = false;
                    }

                    if (line.trim() === '') {
                        result.push('<br>');
                    } else if (line.match(/^<hr>/)) {
                        result.push(line);
                    } else {
                        result.push(`<p>${line}</p>`);
                    }
                }
            }

            if (inSubUl) result.push('</ul></li>');
            if (inOl) result.push('</ol>');
            if (inUl) result.push('</ul>');


            html = result.join('');

            html = html.replace(/(<br>\s*){3,}/g, '<br><br>');

            html = html.replace(/<br>\s*(<\/?(?:ol|ul|li|p|hr)[^>]*>)/g, '$1');
            html = html.replace(/(<\/?(?:ol|ul|li|p|hr)[^>]*>)\s*<br>/g, '$1');

            return html;
        }

        function chatBot() {
            return {
                messages: [],
                newMessage: '',
                isLoading: false,
                error: '',

                initChat() {
                    this.messages = [{
                        id: 1,
                        role: 'model',
                        text: 'Halo! 👋 Saya **GAYATRI AI**, asisten virtual resmi Polres Tulungagung.\n\nSaya siap membantu Anda dengan informasi seputar:\n* Layanan SIM, SKCK, BPKB/STNK\n* Prosedur pelaporan & pengaduan\n* Tindakan darurat & keamanan\n* Lalu lintas & berkendara\n\nSilakan ketik pertanyaan Anda! 🙏',
                    }];
                    this.newMessage = '';
                    this.isLoading = false;
                    this.error = '';
                    this.$nextTick(() => this.scrollToBottom());
                },

                clearChat() {
                    this.initChat();
                },

                async sendMessage() {
                    if (!this.newMessage.trim() || this.isLoading) return;

                    const userText = this.newMessage.trim();
                    this.newMessage = '';
                    this.error = '';
                    this.isLoading = true;

                    this.messages.push({
                        id: Date.now(),
                        role: 'user',
                        text: userText
                    });
                    this.$nextTick(() => this.scrollToBottom());

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    const chatHistory = this.messages
                        .slice(1, -1)
                        .map(m => ({
                            role: m.role,
                            text: m.text
                        }));

                    try {
                        const response = await fetch("{{ route('chatbot.generate') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                message: userText,
                                history: chatHistory
                            }),
                        });

                        const data = await response.json();

                        if (!response.ok) throw new Error(data.reply || 'Terjadi kesalahan server.');

                        this.messages.push({
                            id: Date.now() + 1,
                            role: 'model',
                            text: data.reply
                        });

                    } catch (err) {
                        const errMsg =
                            'Maaf, GAYATRI AI sedang tidak dapat dijangkau. Silakan coba beberapa saat lagi atau hubungi **110** untuk bantuan darurat.';
                        this.messages.push({
                            id: Date.now() + 1,
                            role: 'model',
                            text: errMsg
                        });
                    } finally {
                        this.isLoading = false;
                        this.$nextTick(() => this.scrollToBottom());
                    }
                },

                scrollToBottom() {
                    const el = this.$refs.messagesContainer;
                    if (el) setTimeout(() => {
                        el.scrollTop = el.scrollHeight;
                    }, 60);
                },
            };
        }
    </script>

</body>

</html>
