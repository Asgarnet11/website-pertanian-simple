<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100 flex">
        <!-- Left Side - Branding & Info -->
        <div class="hidden lg:flex lg:w-1/2 relative">
            <div class="absolute inset-0 bg-gradient-to-br from-green-600 to-green-800"></div>
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>

            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="farm-pattern" x="0" y="0" width="100" height="100"
                            patternUnits="userSpaceOnUse">
                            <path d="M20 20h60v60H20z" fill="none" stroke="white" stroke-width="0.5" />
                            <circle cx="50" cy="35" r="3" fill="white" opacity="0.3" />
                            <path d="M45 50l5-5 5 5-5 5z" fill="white" opacity="0.3" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#farm-pattern)" />
                </svg>
            </div>

            <div class="relative z-10 flex flex-col justify-center px-12 py-16 text-white">
                <!-- Logo Area -->
                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-green-800" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold">AgriUnaasi</h1>
                            <p class="text-green-100 text-sm">Pertanian Modern Kelurahan Unaasi</p>
                        </div>
                    </div>
                </div>

                <!-- Welcome Message -->
                <div class="mb-12">
                    <h2 class="text-4xl font-bold mb-4 leading-tight">
                        Selamat Datang di<br>
                        <span class="text-yellow-300">Portal AgriUnaasi</span>
                    </h2>
                    <p class="text-lg text-green-100 leading-relaxed mb-6">
                        Bergabunglah dengan komunitas petani modern Kelurahan Unaasi.
                        Akses informasi, program, dan layanan pertanian terdepan.
                    </p>

                    <!-- Features List -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-300 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-green-100">Program Pelatihan Pertanian</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-300 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-green-100">Konsultasi Ahli Pertanian</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-300 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-green-100">Akses Informasi Pasar</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-300 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-green-100">Jaringan Komunitas Petani</span>
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 pt-8 border-t border-white border-opacity-20">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-300">150+</div>
                        <div class="text-sm text-green-100">Petani Terdaftar</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-300">25+</div>
                        <div class="text-sm text-green-100">Program Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-yellow-300">5 Ha</div>
                        <div class="text-sm text-green-100">Area Demo</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12">
            <div class="w-full max-w-md">

                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-16 h-16 bg-green-600 rounded-2xl flex items-center justify-center mr-4">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <h1 class="text-2xl font-bold text-gray-900">AgriUnaasi</h1>
                            <p class="text-green-600 text-sm">Portal Petani Modern</p>
                        </div>
                    </div>
                </div>

                <!-- Form Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Masuk ke Akun</h2>
                    <p class="text-gray-600">Silakan masukkan kredensial Anda untuk mengakses portal</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800"
                    :status="session('status')" />

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Alamat Email')" class="text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <x-text-input id="email"
                                class="block mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                type="email" name="email" :value="old('email')" required autofocus
                                autocomplete="username" placeholder="contoh@email.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700 font-medium" />
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <x-text-input id="password"
                                class="block mt-1 w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-colors duration-200"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Masukkan kata sandi" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-700">{{ __('Ingat saya') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-green-600 hover:text-green-800 hover:underline transition-colors duration-200"
                                href="{{ route('password.request') }}">
                                {{ __('Lupa kata sandi?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="space-y-4">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-green-300 shadow-lg">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                {{ __('Masuk ke Portal') }}
                            </span>
                        </button>

                        <!-- Register Link -->
                        <div class="text-center pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600">
                                Belum punya akun?
                                <a href="{{ route('register') }}"
                                    class="text-green-600 hover:text-green-800 font-semibold hover:underline transition-colors duration-200">
                                    Daftar sebagai petani
                                </a>
                            </p>
                        </div>
                    </div>
                </form>

                <!-- Additional Info -->
                <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <p class="text-sm text-gray-700 font-medium mb-1">Butuh Bantuan?</p>
                            <p class="text-xs text-gray-600">
                                Hubungi admin AgriUnaasi di
                                <a href="tel:08111234567" class="text-green-600 font-medium">0811-1234-567</a> atau
                                <a href="mailto:admin@agri-unaasi.id"
                                    class="text-green-600 font-medium">admin@agri-unaasi.id</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
