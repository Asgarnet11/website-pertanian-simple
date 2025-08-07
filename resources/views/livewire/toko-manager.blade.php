<div>
    {{-- Form CRUD Admin --}}
    @if (auth()->check() && auth()->user()->isAdmin())
        <section class="mb-12 p-6 bg-white border-2 border-dashed rounded-xl shadow-sm">
            <h3 class="text-xl font-bold mb-4 text-gray-800">{{ $isUpdateMode ? 'Update Produk' : 'Tambah Produk Baru' }}
            </h3>
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" wire:model.defer="nama_produk" id="nama_produk"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nama_produk')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select wire:model.defer="kategori_id" id="kategori_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea wire:model.defer="deskripsi" id="deskripsi" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                        <input type="number" wire:model.defer="harga" id="harga"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('harga')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" wire:model.defer="stok" id="stok"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('stok')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="gambar_baru" class="block text-sm font-medium text-gray-700">Upload Gambar
                            Produk</label>
                        <input type="file" wire:model="gambar_baru" id="gambar_baru"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <div wire:loading wire:target="gambar_baru" class="text-sm text-gray-500 mt-1">Uploading...
                        </div>
                        @error('gambar_baru')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                        @if ($gambar_baru)
                            <p class="text-sm font-medium mt-2">Preview:</p>
                            <img src="{{ $gambar_baru->temporaryUrl() }}"
                                class="mt-2 h-32 w-32 object-cover rounded-md">
                        @elseif($gambar_url_lama)
                            <p class="text-sm font-medium mt-2">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $gambar_url_lama) }}"
                                class="mt-2 h-32 w-32 object-cover rounded-md">
                        @endif
                    </div>
                </div>
                <div class="mt-6"><button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">{{ $isUpdateMode ? 'Update Produk' : 'Simpan Produk' }}</button>
                </div>
            </form>
        </section>
    @endif

    {{-- Filter Kategori untuk Pengunjung --}}
    <section class="mb-8">
        <h3 class="text-lg font-bold text-gray-800 mb-3">Jelajahi Kategori:</h3>
        <div class="flex flex-wrap gap-2">
            <button wire:click="clearFilter"
                class="{{ !$filterKategori ? 'bg-indigo-600 text-white ring-indigo-600' : 'bg-white text-gray-700 ring-gray-300' }} px-4 py-2 rounded-full text-sm font-semibold ring-1 ring-inset hover:bg-gray-50 transition-colors">Semua</button>
            @foreach ($kategoris as $kategori)
                <button wire:click="filterByKategori({{ $kategori->id }})"
                    class="{{ $filterKategori == $kategori->id ? 'bg-indigo-600 text-white ring-indigo-600' : 'bg-white text-gray-700 ring-gray-300' }} px-4 py-2 rounded-full text-sm font-semibold ring-1 ring-inset hover:bg-gray-50 transition-colors">{{ $kategori->nama }}</button>
            @endforeach
        </div>
    </section>

    {{-- Grid Daftar Produk --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($produks as $produk)
            <div
                class="group border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 ease-in-out flex flex-col bg-white">
                <a href="{{ route('toko.show', $produk) }}" class="flex-grow">
                    <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            src="{{ $produk->gambar_url ? asset('storage/' . $produk->gambar_url) : 'https://via.placeholder.com/400x300.png?text=Produk' }}"
                            alt="{{ $produk->nama_produk }}">
                    </div>
                    <div class="p-4 flex flex-col h-40 justify-between">
                        <div>
                            @if ($produk->kategori)
                                <span
                                    class="text-xs font-semibold text-indigo-600 uppercase">{{ $produk->kategori->nama }}</span>
                            @endif
                            <h4 class="font-bold text-lg text-gray-800 truncate" title="{{ $produk->nama_produk }}">
                                {{ $produk->nama_produk }}</h4>
                        </div>
                        <div class="mt-2">
                            <div class="flex justify-between items-center">
                                <span class="font-extrabold text-xl text-emerald-600">Rp
                                    {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                <span
                                    class="text-xs font-medium {{ $produk->stok > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 rounded-full">Stok:
                                    {{ $produk->stok }}</span>
                            </div>
                        </div>
                    </div>
                </a>
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
            <div class="col-span-full bg-gray-100 text-center py-12 px-6 rounded-lg">
                <h3 class="text-xl font-medium text-gray-700">Produk Tidak Ditemukan</h3>
                <p class="mt-2 text-gray-500">Tidak ada produk dalam kategori ini atau toko masih kosong.</p>
            </div>
        @endforelse
    </section>

    {{-- Link Pagination --}}
    <div class="mt-8">
        {{ $produks->links() }}
    </div>
</div>
