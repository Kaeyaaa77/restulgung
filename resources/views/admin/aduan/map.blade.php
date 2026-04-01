@extends('admin.layouts.app')

@section('title', 'Peta Sebaran Aduan')

{{-- 1. PUSH CSS LEAFLET KE HEAD --}}
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map-admin {
            height: 600px;
            width: 100%;
            border-radius: 0.5rem;
            /* z-index 0 untuk mencegah konflik dengan elemen UI admin */
            z-index: 0;
        }

        /* Styling tambahan untuk popup agar lebih rapi */
        .leaflet-popup-content-wrapper {
            border-radius: 0.5rem;
            /* Menyamakan radius dengan elemen lain */
        }

        .leaflet-popup-content {
            margin: 12px 10px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
@endpush

@section('content')
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Peta Sebaran Laporan Aduan</h1>
        </div>

        <div class="mb-5 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">Status Laporan</h3>

            <div class="flex flex-col sm:flex-row sm:items-center gap-x-6 gap-y-2">

                <div class="flex items-center">
                    <span class="h-4 w-4 rounded-full bg-red-500 border border-red-600 mr-2 flex-shrink-0"></span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Baru (Merah)</span>
                </div>

                <div class="flex items-center">
                    <span class="h-4 w-4 rounded-full bg-orange-500 border border-orange-600 mr-2 flex-shrink-0"></span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Dalam Proses (Oranye)</span>
                </div>

                <div class="flex items-center">
                    <span class="h-4 w-4 rounded-full bg-green-500 border border-green-600 mr-2 flex-shrink-0"></span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Selesai (Hijau)</span>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-xl rounded-lg overflow-hidden dark:bg-gray-800">
            {{-- DIV TEMPAT PETA HARUS ADA DI SINI --}}
            <div id="map-admin"></div>
        </div>
    </div>
@endsection

{{-- 2. PUSH JAVASCRIPT LEAFLET KE BAWAH BODY --}}
@push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        /**
         * Menyalin teks dari elemen yang diberikan ID ke clipboard.
         * Menggunakan API Clipboard modern jika tersedia, dengan fallback ke execCommand.
         * @param {string} elementId ID dari elemen yang berisi teks koordinat.
         */
        function copyCoordinates(elementId) {
            // 1. Dapatkan teks koordinat dari elemen span
            const copyText = document.getElementById(elementId)?.textContent;

            if (!copyText) {
                console.error('Elemen koordinat tidak ditemukan:', elementId);
                alert('Gagal menyalin: Elemen tidak ditemukan.');
                return;
            }

            // 2. Gunakan API Clipboard modern (lebih aman dan asinkron)
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(copyText).then(() => {
                    // Tampilkan notifikasi sukses
                    alert('Koordinat berhasil disalin:\n' + copyText);
                }).catch(err => {
                    console.error('Gagal menyalin ke clipboard (API modern):', err);
                    alert('Gagal menyalin. Silakan coba lagi.');
                });
            } else {
                // 3. Fallback untuk browser lama atau koneksi non-HTTPS (menggunakan execCommand)
                try {
                    // Buat elemen textarea sementara
                    const textArea = document.createElement("textarea");
                    textArea.value = copyText;
                    textArea.style.position = "fixed"; // Jauhkan dari pandangan
                    textArea.style.top = 0;
                    textArea.style.left = 0;
                    textArea.style.opacity = 0;
                    document.body.appendChild(textArea);

                    textArea.select();
                    textArea.setSelectionRange(0, 99999); // Untuk mobile

                    const successful = document.execCommand('copy');

                    if (successful) {
                        alert('Koordinat berhasil disalin:\n' + copyText);
                    } else {
                        throw new Error('execCommand gagal');
                    }

                    document.body.removeChild(textArea);

                } catch (err) {
                    console.error('Gagal menyalin (fallback execCommand):', err);
                    alert('Gagal menyalin. Browser Anda mungkin tidak mendukung fitur ini.');
                }
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Default center: Polres Tulungagung
            const defaultPos = [-8.0673, 111.9004];

            const map = L.map('map-admin').setView(defaultPos, 13);

            // Tambahkan layer OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            const aduanData = @json($aduans);
            const markers = [];

            aduanData.forEach(aduan => {
                if (aduan.latitude && aduan.longitude) {
                    const latLng = [parseFloat(aduan.latitude), parseFloat(aduan.longitude)];

                    const waktuKejadian = new Date(aduan.waktu_kejadian).toLocaleString('id-ID', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    let circleColor = '#ef4444'; // Merah (Baru)
                    let statusClass = 'text-red-600';
                    if (aduan.status === 'Dalam Proses') {
                        circleColor = '#f97316'; // Oranye
                        statusClass = 'text-orange-500';
                    } else if (aduan.status === 'Selesai') {
                        circleColor = '#10b981'; // Hijau
                        statusClass = 'text-green-600';
                    }

                    const circleMarker = L.circleMarker(latLng, {
                        radius: 8,
                        fillColor: circleColor,
                        color: "#000",
                        weight: 1,
                        opacity: 1,
                        fillOpacity: 0.8
                    }).addTo(map);

                    // --- MODIFIKASI POPUP CONTENT ---

                    // Buat string koordinat dan ID unik untuk elemen
                    const coordinates = `${aduan.latitude}, ${aduan.longitude}`;
                    const coordId = `coord-${aduan.id}`; // ID unik untuk span koordinat

                    const contentString = `
                        <div class="p-1 w-72">
                            <h3 class="font-bold text-base mb-1">${aduan.nama}</h3>
                            <p class="text-gray-700 text-sm"><strong>Jenis Aduan:</strong> ${aduan.jenis_aduan}</p>
                            <p class="text-gray-700 text-sm"><strong>Waktu:</strong> ${waktuKejadian}</p>
                            <p class="text-gray-700 text-sm"><strong>Status:</strong>
                                <span class="font-semibold \${statusClass}">
                                    ${aduan.status}
                                </span>
                            </p>
                            <p class="text-gray-700 text-sm mt-1"><strong>Lokasi:</strong> ${aduan.lokasi_kejadian}</p>
                            <div>
                                <p class="text-gray-700 text-sm font-semibold"><strong>Koordinat:</strong></p>
                                <div class="flex items-center justify-between mt-1">
                                    <span id="\${coordId}" class="text-sm text-gray-800 bg-gray-100 px-2 py-1 rounded-md" style="font-family: 'Courier New', Courier, monospace;">
                                        ${coordinates}
                                    </span>

                                    <button onclick="copyCoordinates('\${coordId}')" class="ml-2 px-3 py-1 bg-blue-500 text-white text-xs font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                        Salin
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 text-right border-t border-gray-200 pt-2">
                                <a href="https://www.google.com/maps?q=${aduan.latitude},${aduan.longitude}" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm font-medium">Lihat di Google Maps »</a>
                            </div>
                        </div>
                    `;
                    // --- AKHIR MODIFIKASI POPUP CONTENT ---

                    circleMarker.bindPopup(contentString);
                    markers.push(circleMarker);
                }
            });

            // Mengatasi masalah ukuran peta tidak terdeteksi:
            map.invalidateSize();

            if (markers.length > 0) {
                const group = new L.featureGroup(markers);
                map.fitBounds(group.getBounds().pad(0.5));
            } else {
                map.setView(defaultPos, 13);
            }

            if (aduanData.length === 1 && aduanData[0].latitude && aduanData[0].longitude) {
                map.setView([parseFloat(aduanData[0].latitude), parseFloat(aduanData[0].longitude)], 15);
            }
        });
    </script>
@endpush
