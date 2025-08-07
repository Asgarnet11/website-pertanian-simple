<nav x-data="{ open: false }" class="bg-gradient-to-r from-green-700 to-green-800 shadow-lg border-b-4 border-green-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <img src="{{ asset('images/logo-agri.png') }}" alt="Logo Pertanian"
                            class="h-10 w-10 transition-transform duration-200 group-hover:scale-110">
                        <span
                            class="text-white font-bold text-xl hidden sm:block group-hover:text-green-200 transition-colors duration-200">
                            AgriUnaasi
                        </span>
                    </a>
                </div>

                <div class="hidden md:ml-10 md:flex md:items-center md:space-x-1">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"
                        class="px-4 py-2 rounded-lg text-white hover:bg-green-600 hover:text-green-100 transition-all duration-200 font-medium {{ request()->routeIs('home') ? 'bg-green-600 text-green-100 shadow-inner' : '' }}">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('berita')" :active="request()->routeIs('berita')"
                        class="px-4 py-2 rounded-lg text-white hover:bg-green-600 hover:text-green-100 transition-all duration-200 font-medium {{ request()->routeIs('berita') ? 'bg-green-600 text-green-100 shadow-inner' : '' }}">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('Berita') }}
                    </x-nav-link>
                    <x-nav-link :href="route('toko')" :active="request()->routeIs('toko')"
                        class="px-4 py-2 rounded-lg text-white hover:bg-green-600 hover:text-green-100 transition-all duration-200 font-medium {{ request()->routeIs('toko') ? 'bg-green-600 text-green-100 shadow-inner' : '' }}">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM6 9a1 1 0 112 0 1 1 0 01-2 0zm6 0a1 1 0 112 0 1 1 0 01-2 0z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('Toko') }}
                    </x-nav-link>
                    <x-nav-link :href="route('lokasi')" :active="request()->routeIs('lokasi')"
                        class="px-4 py-2 rounded-lg text-white hover:bg-green-600 hover:text-green-100 transition-all duration-200 font-medium {{ request()->routeIs('lokasi') ? 'bg-green-600 text-green-100 shadow-inner' : '' }}">
                        <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('Lokasi') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden md:flex items-center justify-center flex-1 px-12">
                @livewire('global-search')
            </div>

            <div class="flex items-center">
                <div class="hidden md:flex items-center space-x-2">
                    @auth
                        <div class="ml-6 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-4 py-2 border border-green-600 text-sm leading-4 font-medium rounded-lg text-white bg-green-600 hover:bg-green-500 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-150 shadow-md">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-2"><svg
                                                class="fill-current h-4 w-4 transition-transform duration-200"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                :class="{ 'rotate-180': open }">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg></div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')"
                                        class="text-gray-700 hover:bg-green-50 hover:text-green-700">
                                        <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            class="text-gray-700 hover:bg-red-50 hover:text-red-700"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            <svg class="w-4 h-4 mr-2 inline-block" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="ml-6">
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 text-green-100 hover:text-white transition-colors duration-200 font-medium">
                                {{ __('Login') }}
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="-mr-2 flex md:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-lg text-green-100 hover:text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-150">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden bg-green-800 border-t border-green-600">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <div class="px-2 py-2">
                @livewire('global-search')
            </div>
            <a href="{{ route('home') }}"
                class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-green-700 transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-green-700' : '' }}"><svg
                    class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg> {{ __('Home') }}</a>
            <a href="{{ route('berita') }}"
                class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-green-700 transition-colors duration-200 {{ request()->routeIs('berita') ? 'bg-green-700' : '' }}"><svg
                    class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                        clip-rule="evenodd" />
                </svg> {{ __('Berita') }}</a>
            <a href="{{ route('toko') }}"
                class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-green-700 transition-colors duration-200 {{ request()->routeIs('toko') ? 'bg-green-700' : '' }}"><svg
                    class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5zM6 9a1 1 0 112 0 1 1 0 01-2 0zm6 0a1 1 0 112 0 1 1 0 01-2 0z"
                        clip-rule="evenodd" />
                </svg> {{ __('Toko') }}</a>
            <a href="{{ route('lokasi') }}"
                class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-white hover:bg-green-700 transition-colors duration-200 {{ request()->routeIs('lokasi') ? 'bg-green-700' : '' }}"><svg
                    class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd" />
                </svg> {{ __('Lokasi') }}</a>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-green-700">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-green-300">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-green-700">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-white hover:bg-green-700">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="py-2 border-t border-green-700">
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-green-700">
                    {{ __('Login') }}
                </a>
            </div>
        @endauth
    </div>
</nav>
