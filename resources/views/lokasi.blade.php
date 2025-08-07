<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-green-800 leading-tight">
                    {{ __('Lokasi Kami') }}
                </h2>
                <p class="text-sm text-green-600 mt-1">AgriUnaasi - Pusat Pertanian Kelurahan Unaasi</p>
            </div>
            <div class="hidden md:flex items-center space-x-2 text-green-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-medium">Kunjungi Kami</span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-green-50 via-white to-green-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">
                    Kunjungi Pusat AgriUnaasi
                </h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Bergabunglah dengan komunitas petani modern di jantung Kelurahan Unaasi.
                    Temukan solusi pertanian terbaik dan konsultasi langsung dengan para ahli kami.
                </p>
            </div>

            <!-- Main Content -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2">

                    <!-- Contact Information -->
                    <div class="p-8 lg:p-10 bg-gradient-to-br from-green-600 to-green-700 text-white">
                        <div class="mb-8">
                            <h4 class="text-2xl font-bold mb-2">Alamat Kantor Pusat</h4>
                            <div class="w-16 h-1 bg-yellow-400 rounded-full"></div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-white bg-opacity-20 p-3 rounded-lg mt-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg">Kantor & Area Percontohan</p>
                                    <p class="text-green-100 leading-relaxed">
                                        Jl. Raya Unaasi No. 45<br>
                                        Kelurahan Unaasi, Kendari Selatan<br>
                                        Kota Kendari, Sulawesi Tenggara<br>
                                        93232
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg">Jam Operasional</p>
                                    <div class="text-green-100 space-y-1">
                                        <p>Senin - Jumat: 07:30 - 16:30</p>
                                        <p>Sabtu: 08:00 - 13:00</p>
                                        <p class="text-yellow-200">Minggu & Hari Libur: Tutup</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-lg">Hubungi Kami</p>
                                    <div class="text-green-100 space-y-1">
                                        <p>Telepon: (0401) 123-456</p>
                                        <p>WhatsApp: 0811-1234-5678</p>
                                        <p>Email: info@agri-unaasi.id</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-8 pt-6 border-t border-white border-opacity-20">
                            <a href="#"
                                class="inline-flex items-center px-6 py-3 bg-yellow-400 text-green-800 font-semibold rounded-lg hover:bg-yellow-300 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                Chat via WhatsApp
                            </a>
                        </div>
                    </div>

                    <!-- Map Section -->
                    <div class="relative">
                        <div class="h-full min-h-[500px] bg-gray-100">
                            <!-- Map akan ditampilkan di sini -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.4556!2d122.5177!3d-3.9453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98f1b2c8b5d123%3A0x4d5e6f7890abcdef!2sUnaasi%2C%20Kendari%20Sel.%2C%20Kota%20Kendari%2C%20Sulawesi%20Tenggara!5e0!3m2!1sid!2sid!4v1691234567890!5m2!1sid!2sid"
                                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="w-full h-full">
                            </iframe>
                        </div>

                        <!-- Overlay info -->
                        <div
                            class="absolute top-6 left-6 bg-white bg-opacity-95 backdrop-blur-sm rounded-lg p-4 shadow-lg max-w-xs">
                            <h5 class="font-bold text-green-800 mb-2">Area Layanan</h5>
                            <p class="text-sm text-gray-700">
                                Melayani seluruh wilayah Kelurahan Unaasi dan sekitarnya dengan
                                program pemberdayaan petani modern.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Grid -->
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Kantor Layanan</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Gedung modern dengan fasilitas lengkap untuk konsultasi pertanian dan administrasi program.
                    </p>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Area Demo Plot</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Lahan percontohan dengan teknologi pertanian modern untuk pembelajaran praktis petani.
                    </p>
                </div>

                <div
                    class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-2">Ruang Komunitas</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Tempat berkumpul dan berdiskusi untuk membangun jejaring antar petani Unaasi.
                    </p>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 text-center bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-8 text-white">
                <h4 class="text-2xl font-bold mb-4">Siap Berkunjung ke AgriUnaasi?</h4>
                <p class="text-green-100 mb-6 max-w-2xl mx-auto">
                    Datang langsung ke kantor kami atau hubungi tim untuk mengatur kunjungan dan konsultasi gratis
                    seputar pertanian modern.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#"
                        class="bg-yellow-400 text-green-800 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors duration-200 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3" />
                        </svg>
                        Lihat Rute di Maps
                    </a>
                    <a href="tel:(0401)123-456"
                        class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-700 transition-colors duration-200 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Hubungi Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
