<x-app-layout>
    <div class="bg-white py-4 sm:py-8 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Container dengan padding responsif --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12">

                {{-- Kolom Kiri: Gambar Produk --}}
                <div class="order-1">
                    <div class="relative overflow-hidden rounded-xl shadow-lg bg-gray-100">
                        <img src="{{ $produk->gambar_url ? asset('storage/' . $produk->gambar_url) : 'https://via.placeholder.com/800x600.png?text=Produk' }}"
                            alt="{{ $produk->nama_produk }}"
                            class="w-full h-64 sm:h-80 lg:h-96 object-cover transition-transform duration-300 hover:scale-105"
                            loading="lazy">
                    </div>
                </div>

                {{-- Kolom Kanan: Detail dan Aksi --}}
                <div class="order-2 flex flex-col">

                    {{-- Nama Produk --}}
                    <h1
                        class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-gray-900 leading-tight">
                        {{ $produk->nama_produk }}
                    </h1>

                    {{-- Harga --}}
                    <div class="mt-3 sm:mt-4">
                        <p class="text-3xl sm:text-4xl lg:text-5xl font-bold text-emerald-600">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>

                    {{-- Status Stok --}}
                    <div class="mt-4 sm:mt-6">
                        @if ($produk->stok > 0)
                            <span
                                class="inline-flex items-center gap-x-1.5 rounded-full bg-green-100 px-3 py-1.5 text-sm font-medium text-green-700 ring-1 ring-green-200">
                                <svg class="h-2 w-2 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
                                    <circle cx="3" cy="3" r="3" />
                                </svg>
                                Stok Tersedia ({{ $produk->stok }} item)
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-x-1.5 rounded-full bg-red-100 px-3 py-1.5 text-sm font-medium text-red-700 ring-1 ring-red-200">
                                <svg class="h-2 w-2 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                                    <circle cx="3" cy="3" r="3" />
                                </svg>
                                Stok Habis
                            </span>
                        @endif
                    </div>

                    {{-- Deskripsi Produk --}}
                    @if ($produk->deskripsi)
                        <div class="mt-6 sm:mt-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi Produk</h3>
                            <div class="prose prose-sm sm:prose-base text-gray-600 max-w-none">
                                <p class="leading-relaxed">{{ $produk->deskripsi }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- Spacer untuk mendorong tombol ke bawah --}}
                    <div class="flex-grow"></div>

                    {{-- Tombol Aksi: Beli via WhatsApp --}}
                    <div class="mt-8 sm:mt-10 space-y-4">
                        @php
                            // Nomor WhatsApp yang sudah dioptimalkan
                            $nomorWhatsApp = '6281391028190';
                            $pesan =
                                "Halo Agri Unaasi! 🌾\n\nSaya tertarik dengan produk:\n📦 *{$produk->nama_produk}*\n💰 Harga: Rp " .
                                number_format($produk->harga, 0, ',', '.') .
                                "\n\nApakah produk ini masih tersedia? Terima kasih! 😊";
                            $linkWhatsApp = 'https://wa.me/' . $nomorWhatsApp . '?text=' . urlencode($pesan);
                        @endphp

                        @if ($produk->stok > 0)
                            {{-- Tombol Utama: Beli via WhatsApp --}}
                            <a href="{{ $linkWhatsApp }}" target="_blank" rel="noopener noreferrer"
                                class="group flex w-full items-center justify-center rounded-xl border border-transparent bg-green-600 px-6 py-4 text-base sm:text-lg font-bold text-white shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 transition-transform group-hover:scale-110"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.458l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.001-1.04 3.837 3.836-1.039.001.001z" />
                                </svg>
                                <span class="group-hover:translate-x-0.5 transition-transform">Pesan via WhatsApp</span>
                            </a>

                            {{-- Info Tambahan --}}
                            <div class="flex items-center justify-center text-xs sm:text-sm text-gray-500 mt-3">
                                <svg class="w-4 h-4 mr-1.5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Respon cepat dalam 1-2 jam
                            </div>
                        @else
                            {{-- Tombol untuk stok habis --}}
                            <div class="space-y-3">
                                <button disabled
                                    class="flex w-full items-center justify-center rounded-xl border border-gray-300 bg-gray-100 px-6 py-4 text-base sm:text-lg font-bold text-gray-400 cursor-not-allowed">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Stok Habis
                                </button>

                                {{-- Tombol notifikasi stok tersedia --}}
                                <a href="{{ str_replace(urlencode($pesan), urlencode("Halo Agri Unaasi! 🌾\n\nSaya ingin mendapat notifikasi jika produk *{$produk->nama_produk}* sudah tersedia kembali. Terima kasih! 😊"), $linkWhatsApp) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="flex w-full items-center justify-center rounded-xl border border-green-600 bg-white px-6 py-3 text-sm sm:text-base font-semibold text-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-5 5-5-5h5V12h5v5z M9 3H4l5-5 5 5H9v5H4V3z"></path>
                                    </svg>
                                    Beritahu Saat Tersedia
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- Informasi Kontak --}}
                    <div class="mt-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <div class="flex-1">
                                <p class="font-medium">Agri Unaasi</p>
                                <p class="text-xs text-gray-500">WhatsApp: +62 813-9102-8190</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Floating WhatsApp Button untuk Mobile --}}
    <div class="fixed bottom-6 right-6 z-50 lg:hidden">
        @if ($produk->stok > 0)
            <a href="{{ $linkWhatsApp }}" target="_blank" rel="noopener noreferrer"
                class="flex items-center justify-center w-14 h-14 bg-green-600 text-white rounded-full shadow-2xl hover:bg-green-700 transition-all duration-200 hover:scale-110 active:scale-95">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.458l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.001-1.04 3.837 3.836-1.039.001.001z" />
                </svg>
            </a>
        @endif
    </div>
</x-app-layout>
