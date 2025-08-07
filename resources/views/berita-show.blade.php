<x-app-layout>
    <div class="py-4 sm:py-8 lg:py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Card Container dengan shadow yang lebih modern --}}
            <div class="bg-white overflow-hidden shadow-2xl rounded-xl lg:rounded-2xl">
                <article class="relative">

                    {{-- Gambar Header dengan Overlay Gradient --}}
                    <div class="relative h-64 sm:h-80 lg:h-96 overflow-hidden">
                        <img class="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                            src="{{ $berita->gambar_url ? asset('storage/' . $berita->gambar_url) : 'https://via.placeholder.com/1200x600.png?text=Berita' }}"
                            alt="{{ $berita->judul }}" loading="lazy">

                        {{-- Gradient Overlay untuk readability --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent">
                        </div>

                        {{-- Tombol Back Floating --}}
                        <div class="absolute top-4 left-4 sm:top-6 sm:left-6">
                            <a href="{{ route('berita') }}"
                                class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2 bg-white/90 backdrop-blur-sm text-gray-700 text-sm font-medium rounded-full shadow-lg hover:bg-white hover:shadow-xl transition-all duration-200 group">
                                <svg class="w-4 h-4 mr-1.5 group-hover:-translate-x-0.5 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="hidden sm:inline">Kembali</span>
                            </a>
                        </div>
                    </div>

                    {{-- Content Area --}}
                    <div class="px-4 py-6 sm:px-6 sm:py-8 lg:px-12 lg:py-10">

                        {{-- Header Section --}}
                        <header class="mb-8 lg:mb-12">
                            {{-- Kategori Badge (jika ada) --}}
                            @if (isset($berita->kategori))
                                <div class="mb-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 ring-1 ring-indigo-200">
                                        {{ $berita->kategori }}
                                    </span>
                                </div>
                            @endif

                            {{-- Judul Artikel --}}
                            <h1
                                class="text-2xl sm:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                                {{ $berita->judul }}
                            </h1>

                            {{-- Metadata dengan styling yang lebih baik --}}
                            <div
                                class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div class="flex items-center space-x-3">
                                    {{-- Avatar placeholder --}}
                                    <div class="flex-shrink-0">
                                        <div
                                            class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-bold text-white">
                                                {{ substr($berita->user->name, 0, 1) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900">{{ $berita->user->name }}</p>
                                        <p class="text-xs text-gray-500">Penulis</p>
                                    </div>
                                </div>

                                <div class="flex items-center text-sm text-gray-500 space-x-4">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>{{ $berita->created_at->isoFormat('D MMM Y') }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>{{ $berita->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </header>

                        {{-- Article Content --}}
                        <div
                            class="prose prose-lg sm:prose-xl max-w-none prose-indigo prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-relaxed prose-a:text-indigo-600 prose-a:no-underline hover:prose-a:underline prose-strong:text-gray-900 prose-img:rounded-xl prose-img:shadow-lg">
                            {{-- Enhanced content processing --}}
                            @php
                                // Process content untuk paragraf yang lebih baik
                                $processedContent = preg_replace(
                                    '/\n\s*\n/',
                                    '</p><p class="mt-6">',
                                    trim($berita->konten),
                                );
                                $processedContent = '<p>' . $processedContent . '</p>';
                            @endphp

                            {!! $processedContent !!}
                        </div>

                        {{-- Social Share Section (Optional) --}}
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <h3 class="text-lg font-semibold text-gray-900">Bagikan Artikel</h3>
                                <div class="flex items-center space-x-3">
                                    {{-- WhatsApp Share --}}
                                    <a href="https://wa.me/?text={{ urlencode($berita->judul . ' - ' . request()->url()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.458l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.001-1.04 3.837 3.836-1.039.001.001z" />
                                        </svg>
                                        WhatsApp
                                    </a>

                                    {{-- Facebook Share --}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                        target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                        Facebook
                                    </a>

                                    {{-- Copy Link --}}
                                    <button onclick="copyToClipboard()"
                                        class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Salin Link
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Navigation Section --}}
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row gap-4 justify-between">
                                <a href="{{ route('berita') }}"
                                    class="inline-flex items-center justify-center px-6 py-3 border border-indigo-600 text-base font-semibold text-indigo-600 bg-white rounded-lg hover:bg-indigo-50 transition-all duration-200 group">
                                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-0.5 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Semua Berita
                                </a>

                                {{-- Scroll to top button --}}
                                <button onclick="scrollToTop()"
                                    class="inline-flex items-center justify-center px-6 py-3 bg-indigo-600 text-base font-semibold text-white rounded-lg hover:bg-indigo-700 transition-all duration-200 group">
                                    <svg class="w-5 h-5 mr-2 group-hover:-translate-y-0.5 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                    </svg>
                                    Ke Atas
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

    {{-- JavaScript untuk fitur tambahan --}}
    <script>
        // Copy to clipboard function
        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Link berhasil disalin ke clipboard!');
            }, function(err) {
                console.error('Gagal menyalin link: ', err);
            });
        }

        // Scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Reading progress indicator (optional)
        window.addEventListener('scroll', function() {
            const article = document.querySelector('article');
            const scrolled = window.pageYOffset;
            const rate = scrolled / (article.offsetHeight - window.innerHeight);

            // You can use this to show reading progress if needed
            // Example: update a progress bar
        });
    </script>
</x-app-layout>
