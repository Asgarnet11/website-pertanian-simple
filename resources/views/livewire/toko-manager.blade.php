<div>
    {{-- ======================================================================= --}}
    {{-- FORM CRUD HANYA UNTUK ADMIN --}}
    {{-- ======================================================================= --}}
    @if (auth()->check() && auth()->user()->isAdmin())
        <section class="mb-12 p-6 bg-white border-2 border-dashed rounded-xl shadow-sm">
            <h3 class="text-xl font-bold mb-4 text-gray-800">
                {{ $isUpdateMode ? 'Update Produk' : 'Tambah Produk Baru' }}
            </h3>

            {{-- Pesan Sukses --}}
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Input Nama Produk --}}
                    <div>
                        <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" wire:model.defer="nama_produk" id="nama_produk"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nama_produk')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input URL Gambar --}}
                    <div>
                        <label for="gambar_url" class="block text-sm font-medium text-gray-700">URL Gambar</label>
                        <input type="text" wire:model.defer="gambar_url" id="gambar_url"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('gambar_url')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea wire:model.defer="deskripsi" id="deskripsi" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input Harga --}}
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                        <input type="number" wire:model.defer="harga" id="harga"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('harga')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input Stok --}}
                    <div>
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" wire:model.defer="stok" id="stok"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('stok')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi Form --}}
                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        {{ $isUpdateMode ? 'Update Produk' : 'Simpan Produk' }}
                    </button>
                </div>
            </form>
        </section>
    @endif


    {{-- ======================================================================= --}}
    {{-- GRID DAFTAR PRODUK UNTUK SEMUA PENGUNJUNG --}}
    {{-- ======================================================================= --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($produks as $produk)
            {{-- Kartu Produk Individual --}}
            <div
                class="group border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 ease-in-out flex flex-col bg-white">
                {{-- Bagian yang bisa diklik untuk ke halaman detail --}}
                <a href="{{ route('toko.show', $produk) }}" class="flex-grow">

                    {{-- Gambar Produk --}}
                    <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            src="{{ $produk->gambar_url ?: 'https://via.placeholder.com/400x300.png?text=Produk' }}"
                            alt="{{ $produk->nama_produk }}">
                    </div>

                    {{-- Detail Produk --}}
                    <div class="p-4 flex flex-col h-40 justify-between">
                        <div>
                            <h4 class="font-bold text-lg text-gray-800 truncate" title="{{ $produk->nama_produk }}">
                                {{ $produk->nama_produk }}</h4>
                            <p class="text-gray-500 text-sm mt-1">{{ Str::limit($produk->deskripsi, 50) }}</p>
                        </div>
                        <div class="mt-2">
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-xl text-emerald-600">Rp
                                    {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                <span
                                    class="text-xs font-medium {{ $produk->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 rounded-full">
                                    Stok: {{ $produk->stok }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Tombol Khusus Admin (di luar link agar valid) --}}
                @if (auth()->check() && auth()->user()->isAdmin())
                    <div class="bg-gray-50 p-2 flex justify-end space-x-2 border-t border-gray-200">
                        <button wire:click="edit({{ $produk->id }})"
                            class="text-xs bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                        <button wire:click="delete({{ $produk->id }})"
                            class="text-xs bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600 transition-colors">Hapus</button>
                    </div>
                @endif
            </div>
        @empty
            {{-- Tampilan jika tidak ada produk --}}
            <div class="col-span-full bg-gray-100 text-center py-12 px-6 rounded-lg">
                <h3 class="text-xl font-medium text-gray-700">Toko Masih Kosong</h3>
                <p class="mt-2 text-gray-500">Saat ini belum ada produk yang dijual. Silakan cek kembali nanti.</p>
            </div>
        @endforelse
    </section>

</div>
