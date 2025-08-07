<x-app-layout>
    {{-- ======================================================================= --}}
    {{-- BAGIAN 1: HERO SECTION DENGAN BACKGROUND IMAGE --}}
    {{-- ======================================================================= --}}
    <div class="relative min-h-screen bg-gradient-to-br">
        {{-- Background Image dengan Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/background-petani.jpg') }}" alt="Pertanian Background"
                class="w-full h-full object-cover">
            {{-- Dark Overlay untuk readability --}}
            <div class="absolute inset-0 bg-gradient-to-br"></div>
        </div>

        {{-- Animated Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            {{-- Floating particles --}}
            <div class="absolute top-20 left-10 w-2 h-2 bg-white/20 rounded-full animate-pulse"></div>
            <div class="absolute top-40 right-20 w-1 h-1 bg-green-300/30 rounded-full animate-ping"></div>
            <div class="absolute bottom-40 left-20 w-3 h-3 bg-emerald-400/20 rounded-full animate-bounce"></div>
            <div class="absolute bottom-60 right-10 w-1 h-1 bg-white/30 rounded-full animate-pulse"></div>
        </div>

        {{-- Content Container --}}
        <div class="relative z-10 flex items-center min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    {{-- Left Column: Text Content --}}
                    <div class="text-center lg:text-left">
                        {{-- Logo/Brand Section --}}
                        <div class="flex justify-center lg:justify-start mb-8">
                            <div class="relative group">
                                <div
                                    class="absolute -inset-2 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full blur opacity-60 group-hover:opacity-80 transition duration-300">
                                </div>
                                <div class="relative rounded-full p-6 shadow-xl transform transition-all duration-300">
                                    <img src="{{ asset('images/logo-agri.png') }}" alt="Logo Agri Unaasi"
                                        class="w-16 h-16 object-contain">
                                </div>
                            </div>
                        </div>

                        {{-- Main Title --}}
                        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold mb-6">
                            <span class="block text-white drop-shadow-lg">Agri</span>
                            <span
                                class="block text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-emerald-300 drop-shadow-lg">
                                Unaasi
                            </span>
                        </h1>

                        {{-- Subtitle --}}
                        <p
                            class="text-xl sm:text-2xl text-green-100 mb-8 leading-relaxed max-w-2xl mx-auto lg:mx-0 drop-shadow-md">
                            Memajukan pertanian Sulawesi Tenggara dengan
                            <span class="text-emerald-300 font-semibold">teknologi digital</span>
                            yang menghubungkan petani, pasar, dan inovasi.
                        </p>

                        {{-- CTA Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-12">
                            <a href="{{ route('toko') }}"
                                class="group relative overflow-hidden bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-400 hover:to-emerald-400 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Jelajahi Produk
                                </span>
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                                </div>
                            </a>

                            <a href="{{ route('berita') }}"
                                class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 border-2 border-white/30 hover:border-white/50 text-white px-8 py-4 rounded-full font-semibold text-lg shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform duration-200"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Baca Berita
                                </span>
                            </a>
                        </div>

                        {{-- Quick Stats --}}
                        <div class="grid grid-cols-3 gap-6 max-w-md mx-auto lg:mx-0">
                            <div class="text-center">
                                <div class="text-2xl sm:text-3xl font-bold text-white mb-1">500+</div>
                                <div class="text-sm text-green-200">Petani Terdaftar</div>
                            </div>
                            <div class="text-center border-x border-white/20">
                                <div class="text-2xl sm:text-3xl font-bold text-white mb-1">50+</div>
                                <div class="text-sm text-green-200">Produk Unggulan</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl sm:text-3xl font-bold text-white mb-1">15+</div>
                                <div class="text-sm text-green-200">Kabupaten</div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: Feature Cards / Visual Elements --}}
                    <div class="hidden lg:block">
                        <div class="relative">
                            {{-- Main Feature Card --}}
                            <div
                                class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border border-white/20 shadow-2xl transform hover:scale-105 transition-all duration-300">
                                <div class="text-center mb-6">
                                    <div
                                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl mb-4">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-white mb-2">Platform Terpercaya</h3>
                                    <p class="text-green-100">Solusi digital yang telah dipercaya ribuan petani di
                                        Sulawesi Tenggara</p>
                                </div>
                            </div>

                            {{-- Floating Mini Cards --}}
                            <div
                                class="absolute -top-6 -right-6 bg-emerald-500 rounded-2xl p-4 shadow-xl transform rotate-6 hover:rotate-12 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                </svg>
                            </div>

                            <div
                                class="absolute -bottom-4 -left-4 bg-teal-500 rounded-2xl p-4 shadow-xl transform -rotate-6 hover:-rotate-12 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Scroll Indicator --}}
                <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-center">
                    <div class="text-white/60 text-sm mb-2">Gulir ke bawah</div>
                    <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                        <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-bounce"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================================= --}}
    {{-- BAGIAN 2: FEATURES SECTION --}}
    {{-- ======================================================================= --}}
    <div class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Mengapa Memilih <span class="text-green-600">Agri Unaasi</span>?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami memberikan solusi komprehensif untuk kemajuan pertanian modern di Sulawesi Tenggara
                </p>
            </div>

            {{-- Features Grid --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl p-4 w-fit mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Teknologi Smart Farming</h3>
                    <p class="text-gray-600 leading-relaxed">Manfaatkan teknologi IoT, AI, dan data analytics untuk
                        optimasi produksi pertanian yang efisien dan berkelanjutan.</p>
                </div>

                <div
                    class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="bg-gradient-to-br from-emerald-100 to-teal-100 rounded-2xl p-4 w-fit mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Komunitas Petani</h3>
                    <p class="text-gray-600 leading-relaxed">Bergabung dengan jaringan petani lokal untuk berbagi
                        pengalaman, tips, dan strategi pemasaran yang efektif.</p>
                </div>

                <div
                    class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="bg-gradient-to-br from-teal-100 to-cyan-100 rounded-2xl p-4 w-fit mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Akses Pasar Digital</h3>
                    <p class="text-gray-600 leading-relaxed">Jual hasil panen langsung ke konsumen atau pedagang besar
                        melalui platform digital dengan harga yang kompetitif.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================================= --}}
    {{-- BAGIAN 3: KONTEN UNGGULAN DINAMIS DARI LIVEWIRE --}}
    {{-- ======================================================================= --}}
    <div class="py-20 bg-gradient-to-br from-green-50 to-emerald-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Konten <span class="text-green-600">Unggulan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Temukan informasi terkini, produk berkualitas, dan inovasi pertanian untuk kemajuan bersama
                </p>
            </div>

            {{-- Livewire Component Container --}}
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                <div class="p-8 sm:p-12">
                    @livewire('home-content-manager')
                </div>
            </div>
        </div>
    </div>

    {{-- ======================================================================= --}}
    {{-- BAGIAN 4: CALL TO ACTION SECTION --}}
    {{-- ======================================================================= --}}
    <div class="relative py-20 bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-20">
            <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <defs>
                    <pattern id="cta-pattern" patternUnits="userSpaceOnUse" width="50" height="50">
                        <circle cx="25" cy="25" r="3" fill="currentColor" class="text-white" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#cta-pattern)" />
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-white mb-6">
                    Bergabunglah dengan Revolusi Pertanian Digital
                </h2>
                <p class="text-xl text-green-100 mb-10 max-w-3xl mx-auto">
                    Dapatkan akses ke teknologi terdepan, jaringan pemasaran yang luas, dan dukungan komunitas yang
                    solid untuk memajukan usaha pertanian Anda
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center">

                    <a href="{{ route('lokasi') }}"
                        class="group border-2 border-white text-white hover:bg-white hover:text-green-600 px-10 py-4 rounded-full font-bold text-lg shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        <span class="flex items-center justify-center">
                            Temukan Lokasi Kami
                            <svg class="ml-2 w-5 h-5 group-hover:scale-110 transition-transform duration-200"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
