<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Polres Tulungagung</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/images/lambang.png') }}" type="image/x-icon">
    {{-- Link untuk ikon Material Symbols --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">
    <div class="relative flex flex-col justify-center items-center min-h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('assets/images/bglogin.png') }}');">

        <header class="absolute top-0 left-0 p-6 z-10 flex items-center space-x-4">
            <img src="{{ asset('assets/images/lambang.png') }}" alt="Logo Polres Tulungagung" class="w-20 md:w-24">
            <img src="{{ asset('assets/images/poldajatim.png') }}" alt="Logo Polda Jatim" class="w-20 md:w-24">
        </header>

        <div class="relative z-10 w-full max-w-sm m-4">
            <div class="bg-black backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-700">
                <div class="relative p-8">
                    <h2 class="text-2xl font-bold text-center text-yellow-400 mb-6">Buat Password Baru</h2>

                    <form action="{{ route('admin.password.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                            <input type="email" id="email" name="email"
                                value="{{ $request->email ?? old('email') }}" required readonly
                                class="w-full bg-gray-600 text-gray-300 border border-gray-500 rounded-lg p-2.5 cursor-not-allowed">
                            @error('email')
                                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div x-data="{ showPassword: false }">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password
                                Baru</label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password"
                                    required autofocus
                                    class="w-full bg-gray-200 text-gray-900 border border-gray-500 rounded-lg p-2.5 focus:ring-yellow-500 focus:border-yellow-500 transition">
                                <button type="button" @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600">
                                    <span x-show="!showPassword" class="material-symbols-outlined">visibility</span>
                                    <span x-show="showPassword" class="material-symbols-outlined">visibility_off</span>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div x-data="{ showConfirmPassword: false }">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-300">Konfirmasi Password</label>
                            <div class="relative">
                                <input :type="showConfirmPassword ? 'text' : 'password'" id="password_confirmation"
                                    name="password_confirmation" required
                                    class="w-full bg-gray-200 text-gray-900 border border-gray-500 rounded-lg p-2.5 focus:ring-yellow-500 focus:border-yellow-500 transition">
                                <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                    class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-600">
                                    <span x-show="!showConfirmPassword"
                                        class="material-symbols-outlined">visibility</span>
                                    <span x-show="showConfirmPassword"
                                        class="material-symbols-outlined">visibility_off</span>
                                </button>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full py-3 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600 font-bold uppercase tracking-wider shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
