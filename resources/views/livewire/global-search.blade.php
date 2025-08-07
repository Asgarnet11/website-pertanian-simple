<div class="relative w-full max-w-xs" x-data="{ open: true }" @click.away="open = false">
    {{-- Kotak Input Pencarian --}}
    <div class="relative">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-green-300" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>

        <input type="text"
            class="w-full py-2 pl-10 pr-4 text-green-900 bg-green-900 bg-opacity-50 border border-transparent rounded-full focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent placeholder-green-300"
            placeholder="Cari produk atau berita..." wire:model.live.debounce.300ms="search" @focus="open = true">
    </div>

    {{-- Dropdown Hasil Pencarian --}}
    @if (strlen($search) > 2)
        <div x-show="open"
            class="absolute z-10 w-full mt-2 bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200">

            @if (!empty($searchResults['produk']) && $searchResults['produk']->isNotEmpty())
                <div class="py-2">
                    <h3 class="px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Produk</h3>
                    <ul>
                        @foreach ($searchResults['produk'] as $product)
                            <li>
                                <a href="{{ route('toko.show', $product) }}" wire:click="resetSearch"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-green-50">
                                    <img src="{{ $product->gambar_url ? asset('storage/' . $product->gambar_url) : 'https://via.placeholder.com/40x40.png?text=P' }}"
                                        alt="{{ $product->nama_produk }}" class="h-8 w-8 object-cover rounded-md mr-3">
                                    <span>{{ $product->nama_produk }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (!empty($searchResults['berita']) && $searchResults['berita']->isNotEmpty())
                <div class="border-t border-gray-200 py-2">
                    <h3 class="px-4 py-1 text-xs font-semibold text-gray-400 uppercase">Berita</h3>
                    <ul>
                        @foreach ($searchResults['berita'] as $article)
                            <li>
                                <a href="{{ route('berita.show', $article) }}" wire:click="resetSearch"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50">
                                    {{ $article->judul }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (
                (empty($searchResults['produk']) || $searchResults['produk']->isEmpty()) &&
                    (empty($searchResults['berita']) || $searchResults['berita']->isEmpty()))
                <div class="px-4 py-4 text-sm text-center text-gray-500">
                    Tidak ada hasil ditemukan untuk "{{ $search }}"
                </div>
            @endif
        </div>
    @endif
</div>
