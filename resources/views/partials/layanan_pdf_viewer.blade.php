{{--
    Partial: Tampilan konten PDF layanan
    Digunakan di semua halaman detail layanan publik
    Variabel: $layananSlug (string)
--}}

@php
    use App\Models\LayananContent;
    $pdfContents = LayananContent::where('layanan_slug', $layananSlug)->orderBy('urutan')->get();
@endphp

@if ($pdfContents->isNotEmpty())
    <div class="mt-10">
        {{-- PDF.js library --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script>
            pdfjsLib.GlobalWorkerOptions.workerSrc =
                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
        </script>

        @foreach ($pdfContents as $content)
            <div class="mb-12">
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-yellow-400">
                    {{ $content->title }}
                </h2>

                {{-- Container untuk semua halaman PDF --}}
                <div id="pdf-container-{{ $content->id }}" class="w-full space-y-4">
                    <div class="text-center py-8 text-gray-500">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-500 mb-3">
                        </div>
                        <p class="text-sm">Memuat dokumen...</p>
                    </div>
                </div>

                <script>
                    (function() {
                        const pdfUrl = '{{ asset('storage/' . $content->file_path) }}';
                        const containerId = 'pdf-container-{{ $content->id }}';
                        const container = document.getElementById(containerId);

                        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdf) {
                            container.innerHTML = '';

                            const renderPage = function(pageNum) {
                                return pdf.getPage(pageNum).then(function(page) {
                                    const viewport = page.getViewport({
                                        scale: 1.8
                                    });

                                    const canvas = document.createElement('canvas');
                                    canvas.width = viewport.width;
                                    canvas.height = viewport.height;
                                    canvas.className =
                                        'w-full h-auto rounded-lg shadow-md border border-gray-200';

                                    const wrapper = document.createElement('div');
                                    wrapper.className = 'w-full';
                                    wrapper.appendChild(canvas);
                                    container.appendChild(wrapper);

                                    const ctx = canvas.getContext('2d');
                                    return page.render({
                                        canvasContext: ctx,
                                        viewport: viewport
                                    }).promise;
                                });
                            };

                            // Render semua halaman secara berurutan
                            let chain = Promise.resolve();
                            for (let i = 1; i <= pdf.numPages; i++) {
                                chain = chain.then(renderPage.bind(null, i));
                            }

                        }).catch(function(err) {
                            container.innerHTML = `
                                <div class="text-center py-8 bg-red-50 rounded-lg border border-red-200">
                                    <p class="text-red-600 text-sm">Gagal memuat dokumen PDF.</p>
                                    <a href="{{ asset('storage/' . $content->file_path) }}"
                                       target="_blank"
                                       class="mt-2 inline-block text-blue-600 hover:underline text-sm">
                                        Unduh / Buka PDF secara langsung
                                    </a>
                                </div>
                            `;
                            console.error('PDF Error:', err);
                        });
                    })
                    ();
                </script>
            </div>
        @endforeach
    </div>
@else
    <div class="mt-10 p-6 bg-yellow-50 border border-yellow-200 rounded-lg text-center">
        <p class="text-yellow-700 text-sm">Informasi layanan sedang dipersiapkan. Silakan hubungi kami langsung untuk
            informasi lebih lanjut.</p>
    </div>
@endif
