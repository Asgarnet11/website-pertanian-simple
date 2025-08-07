<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <article>
                    {{-- Gambar Utama Berita --}}
                    <img class="w-full h-96 object-cover" src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}">

                    <div class="px-6 py-8 md:px-12 md:py-10">
                        {{-- Judul dan Metadata --}}
                        <div class="mb-8 text-center">
                            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                                {{ $berita->judul }}
                            </h1>
                            <p class="mt-4 text-sm text-gray-500">
                                Ditulis oleh <span class="font-semibold">{{ $berita->user->name }}</span>
                                pada {{ $berita->created_at->isoFormat('dddd, D MMMM Y') }}
                            </p>
                        </div>

                        {{-- Konten Artikel dengan Font Bagus --}}
                        {{-- Kelas "prose" dari plugin Typography akan bekerja di sini --}}
                        <div class="prose prose-lg max-w-none prose-indigo">
                            {{-- Kita gunakan nl2br untuk menghormati baris baru dari database --}}
                            {!! nl2br(e($berita->konten)) !!}
                        </div>

                        {{-- Tombol Kembali --}}
                        <div class="mt-12 border-t pt-8 text-center">
                            <a href="{{ route('berita') }}"
                                class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-base font-semibold text-white shadow-sm hover:bg-indigo-700 transition-colors">
                                &larr; Kembali ke Daftar Berita
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-app-layout>
