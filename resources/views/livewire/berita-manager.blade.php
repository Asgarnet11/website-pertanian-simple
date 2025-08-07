<div>
    {{-- ======================================================================= --}}
    {{-- FORM CRUD HANYA UNTUK ADMIN DENGAN FITUR UPLOAD FILE --}}
    {{-- ======================================================================= --}}
    @if (auth()->check() && auth()->user()->isAdmin())
        <section class="mb-12 p-6 bg-white border-2 border-dashed rounded-xl shadow-sm">
            <h3 class="text-xl font-bold mb-4 text-gray-800">
                {{ $isUpdateMode ? 'Update Berita' : 'Tulis Berita Baru' }}
            </h3>

            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="space-y-4">
                    {{-- Input Judul Berita --}}
                    <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                        <input type="text" wire:model.defer="judul" id="judul"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('judul')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input Isi Berita --}}
                    <div>
                        <label for="konten" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                        <textarea wire:model.defer="konten" id="konten" rows="6"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('konten')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Bagian Upload Gambar Berita --}}
                    <div>
                        <label for="gambar_baru" class="block text-sm font-medium text-gray-700">Upload Gambar
                            Berita</label>
                        <input type="file" wire:model="gambar_baru" id="gambar_baru"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">

                        <div wire:loading wire:target="gambar_baru" class="text-sm text-gray-500 mt-1">Uploading...
                        </div>

                        @error('gambar_baru')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror

                        {{-- Preview Gambar --}}
                        @if ($gambar_baru)
                            <p class="text-sm font-medium mt-2">Preview:</p>
                            <img src="{{ $gambar_baru->temporaryUrl() }}"
                                class="mt-2 h-48 w-auto object-cover rounded-md">
                        @elseif($gambar_url_lama)
                            <p class="text-sm font-medium mt-2">Gambar Saat Ini:</p>
                            <img src="{{ asset('storage/' . $gambar_url_lama) }}"
                                class="mt-2 h-48 w-auto object-cover rounded-md">
                        @endif
                    </div>
                </div>

                {{-- Tombol Aksi Form --}}
                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        {{ $isUpdateMode ? 'Update Berita' : 'Publikasikan' }}
                    </button>
                </div>
            </form>
        </section>
    @endif


    {{-- ======================================================================= --}}
    {{-- DAFTAR BERITA UNTUK SEMUA PENGUNJUNG --}}
    {{-- ======================================================================= --}}
    <section class="space-y-8">
        @forelse ($semuaBerita as $berita)
            <article class="flex flex-col md:flex-row gap-8 items-center border-b border-gray-200 py-8">

                {{-- Hanya tampilkan div gambar jika ada gambar --}}
                @if ($berita->gambar_url)
                    <div class="md:w-1/3 w-full flex-shrink-0">
                        {{-- Menggunakan asset() untuk menampilkan gambar dari storage --}}
                        <a href="{{ route('berita.show', $berita) }}">
                            <img src="{{ asset('storage/' . $berita->gambar_url) }}" alt="{{ $berita->judul }}"
                                class="w-full h-48 object-cover rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        </a>
                    </div>
                @endif

                <div class="flex-grow">
                    <div class="text-sm text-gray-500 mb-1">
                        <span>{{ $berita->created_at->isoFormat('D MMMM YYYY') }}</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 hover:text-indigo-700 transition-colors">
                        <a href="{{ route('berita.show', $berita) }}">
                            {{ $berita->judul }}
                        </a>
                    </h2>
                    <div class="mt-1 text-sm text-gray-500">
                        Oleh: <span class="font-medium text-gray-800">{{ $berita->user->name }}</span>
                    </div>
                    <p class="text-gray-600 mt-3">
                        {{ Str::limit($berita->konten, 200) }}
                    </p>

                    {{-- Tombol Edit & Delete hanya untuk Admin --}}
                    @if (auth()->check() && auth()->user()->isAdmin())
                        <div class="mt-4 flex space-x-2">
                            <button wire:click="edit({{ $berita->id }})"
                                class="text-xs bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600">Edit</button>
                            <button wire:click="delete({{ $berita->id }})"
                                onclick="return confirm('Anda yakin ingin menghapus berita ini?')"
                                class="text-xs bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Hapus</button>
                        </div>
                    @endif
                </div>
            </article>
        @empty
            <div class="col-span-full bg-gray-100 text-center py-12 px-6 rounded-lg">
                <h3 class="text-xl font-medium text-gray-700">Belum Ada Berita</h3>
                <p class="mt-2 text-gray-500">Saat ini belum ada berita yang dipublikasikan.</p>
            </div>
        @endforelse
    </section>
    <div class="mt-8">
        {{ $semuaBerita->links() }}
    </div>
</div>
