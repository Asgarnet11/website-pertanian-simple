<div>
    {{-- Form CRUD hanya untuk admin/user login --}}
    @auth
        <div class="mb-8 p-4 border rounded-lg bg-gray-50">
            <h3 class="text-lg font-bold mb-4">
                {{ $isUpdateMode ? 'Update Berita' : 'Tulis Berita Baru' }}
            </h3>

            @if (session()->has('message'))
                <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">{{ session('message') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="mb-4">
                    <label for="judul" class="block">Judul Berita</label>
                    <input type="text" wire:model="judul" class="w-full border-gray-300 rounded-md">
                    @error('judul')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="konten" class="block">Isi Berita</label>
                    <textarea wire:model="konten" class="w-full border-gray-300 rounded-md" rows="6"></textarea>
                    @error('konten')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gambarUrl" class="block">URL Gambar (Opsional)</label>
                    <input type="text" wire:model="gambarUrl" class="w-full border-gray-300 rounded-md">
                    @error('gambarUrl')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ $isUpdateMode ? 'Update Berita' : 'Publikasikan' }}
                </button>
            </form>
        </div>
    @endauth

    {{-- Daftar Berita untuk semua pengunjung --}}
    <div class="space-y-8">
        @forelse ($semuaBerita as $berita)
            <article class="border-b pb-6">
                @if ($berita->gambar_url)
                    <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}"
                        class="w-full h-64 object-cover rounded-lg mb-4">
                @endif
                <h2 class="text-2xl font-bold text-gray-900 hover:text-indigo-700 transition-colors">
                    {{-- Menggunakan route 'berita.show' dengan parameter $berita itu sendiri --}}
                    <a href="{{ route('berita.show', $berita) }}">
                        {{ $berita->judul }}
                    </a>
                </h2>
                <div class="text-sm text-gray-500 mt-1 mb-2">
                    Dipublikasikan oleh {{ $berita->user->name }} pada {{ $berita->created_at->format('d F Y') }}
                </div>
                <p class="text-gray-700">
                    {{ Str::limit($berita->konten, 250) }} {{-- Tampilkan ringkasan konten --}}
                </p>

                {{-- Tombol Edit & Delete hanya muncul untuk user yang membuatnya --}}
                @if (auth()->check() && auth()->id() == $berita->user_id)
                    <div class="mt-4">
                        <button wire:click="edit({{ $berita->id }})"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-sm">Edit</button>
                        <button wire:click="delete({{ $berita->id }})"
                            onclick="return confirm('Anda yakin ingin menghapus berita ini?')"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm">Hapus</button>
                    </div>
                @endif
            </article>
        @empty
            <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
        @endforelse
    </div>
</div>
