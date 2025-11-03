<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    {{-- Link untuk ikon Material Symbols --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>

    {{-- NEW: Stack untuk CSS kustom (misalnya Leaflet CSS) --}}
    @stack('styles')
</head>

<body class="bg-gray-800 text-gray-200 font-sans">
    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen">
        {{-- Memanggil Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Konten Utama --}}
        <div class="flex-1 flex flex-col">
            {{-- Tombol Toggle Sidebar untuk Mobile --}}
            <header class="lg:hidden bg-black p-4 flex justify-between items-center">
                <button @click="sidebarOpen = !sidebarOpen" class="text-white">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h1 class="text-xl font-bold tracking-wider text-yellow-400">ADMIN PANEL</h1>
            </header>

            <main class="flex-1 p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
