<div>
    {{-- ======================================================================= --}}
    {{-- BAGIAN FORM UNTUK ADMIN (DENGAN TAMPILAN BARU) --}}
    {{-- ======================================================================= --}}
    @if (auth()->check() && auth()->user()->isAdmin())
        <section class="mb-12 p-6 bg-white border-2 border-dashed rounded-xl shadow-sm">
            <h3 class="text-xl font-bold mb-4 text-gray-800">
                {{ $isUpdateMode ? 'Update Konten Unggulan' : 'Tambah Konten Unggulan Baru' }}
            </h3>

            {{-- Pesan Sukses --}}
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="space-y-4">
                    {{-- Input Judul --}}
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" wire:model.defer="title" id="title"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('title')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input Deskripsi --}}
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi
                            Singkat</label>
                        <textarea wire:model.defer="description" id="description" rows="4"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        @error('description')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Input URL Gambar --}}
                    <div>
                        <label for="imageUrl" class="block text-sm font-medium text-gray-700">URL Gambar</label>
                        <input type="text" wire:model.defer="imageUrl" id="imageUrl"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="https://.../gambar.jpg">
                        @error('imageUrl')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        {{ $isUpdateMode ? 'Update Konten' : 'Simpan Konten' }}
                    </button>
                </div>
            </form>
        </section>
    @endif


    {{-- ======================================================================= --}}
    {{-- BAGIAN TAMPILAN KONTEN UNGGULAN UNTUK PUBLIK (DENGAN TAMPILAN BARU) --}}
    {{-- ======================================================================= --}}
    <section>
        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Selamat Datang!</h2>
        <p class="text-lg text-gray-600 mb-8">Lihat konten dan penawaran unggulan dari kami.</p>

        <div class="space-y-10">
            @forelse ($contents as $content)
                <article
                    class="flex flex-col md:flex-row items-start gap-6 bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">

                    {{-- Gambar Konten --}}
                    <div class="w-full md:w-1/3 flex-shrink-0">
                        <img src="{{ $content->image_url ?: 'https://via.placeholder.com/640x480.png/F1F5F9/94A3B8?text=Gambar+Pertanian' }}"
                            alt="{{ $content->title }}" class="w-full h-56 object-cover rounded-lg shadow-md">
                    </div>

                    {{-- Deskripsi Konten --}}
                    <div class="w-full">
                        <h3 class="text-2xl font-bold text-gray-800">{{ $content->title }}</h3>
                        <p class="mt-3 text-gray-600 leading-relaxed">{{ $content->description }}</p>

                        {{-- Tombol Aksi untuk Admin --}}
                        @if (auth()->check() && auth()->user()->isAdmin())
                            <div class="mt-4 pt-4 border-t border-gray-200 flex items-center space-x-3">
                                <button wire:click="edit({{ $content->id }})"
                                    class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $content->id }})"
                                    onclick="return confirm('Anda yakin ingin menghapus konten ini?')"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Hapus
                                </button>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="bg-gray-100 text-center py-12 px-6 rounded-lg">
                    <h3 class="text-xl font-medium text-gray-700">Belum Ada Konten</h3>
                    <p class="mt-2 text-gray-500">Saat ini belum ada konten unggulan yang bisa ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </section>

</div>
