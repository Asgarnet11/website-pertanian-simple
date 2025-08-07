<x-app-layout>
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                {{-- Kolom Kiri: Gambar Produk --}}
                <div>
                    <img src="{{ $produk->gambar_url ?: 'https://via.placeholder.com/800x600.png?text=Produk' }}"
                        alt="{{ $produk->nama_produk }}" class="w-full h-auto object-cover rounded-xl shadow-lg">
                </div>

                {{-- Kolom Kanan: Detail dan Aksi --}}
                <div class="flex flex-col justify-center">
                    {{-- Nama Produk --}}
                    <h1 class="text-3xl lg:text-4xl font-extrabold tracking-tight text-gray-900">
                        {{ $produk->nama_produk }}
                    </h1>

                    {{-- Harga --}}
                    <p class="mt-4 text-4xl lg:text-5xl font-bold text-emerald-600">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    {{-- Status Stok --}}
                    <div class="mt-6">
                        @if ($produk->stok > 0)
                            <span
                                class="inline-flex items-center gap-x-1.5 rounded-md bg-green-100 px-3 py-1.5 text-sm font-medium text-green-700">
                                <svg class="h-2 w-2 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
                                    <circle cx="3" cy="3" r="3" />
                                </svg>
                                Stok Tersedia
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-x-1.5 rounded-md bg-red-100 px-3 py-1.5 text-sm font-medium text-red-700">
                                <svg class="h-2 w-2 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                                    <circle cx="3" cy="3" r="3" />
                                </svg>
                                Stok Habis
                            </span>
                        @endif
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="mt-8 prose prose-lg text-gray-600 max-w-none">
                        <p>{{ $produk->deskripsi }}</p>
                    </div>

                    {{-- Tombol Aksi: Beli via WhatsApp --}}
                    <div class="mt-10">
                        @php
                            // GANTI NOMOR INI dengan nomor WhatsApp Anda (format 628...)
                            $nomorWhatsApp = '6281234567890';
                            $pesan =
                                "Halo Agri Unaasi, saya tertarik dengan produk \"{$produk->nama_produk}\" seharga Rp " .
                                number_format($produk->harga, 0, ',', '.') .
                                '. Apakah masih tersedia?';
                            $linkWhatsApp = 'https://wa.me/' . $nomorWhatsApp . '?text=' . urlencode($pesan);
                        @endphp

                        <a href="{{ $linkWhatsApp }}" target="_blank"
                            class="flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-4 text-lg font-bold text-white shadow-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-transform hover:scale-105">
                            <svg class="w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.458l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.447-4.435-9.884-9.888-9.884-5.448 0-9.886 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.001-1.04 3.837 3.836-1.039.001.001z" />
                            </svg>
                            Beli via WhatsApp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
