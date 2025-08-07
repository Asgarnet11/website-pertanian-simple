<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toko Produk Pertanian
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Panel Manajemen Kategori (Hanya untuk Admin) --}}
            @if (auth()->check() && auth()->user()->isAdmin())
                <div class="mb-12 bg-white p-6 rounded-lg shadow-md border">
                    <h2 class="text-2xl font-bold mb-4">Manajemen Kategori</h2>
                    @livewire('kategori-manager')
                </div>
            @endif

            {{-- Panel Utama Toko (Produk, Filter, dll) --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @livewire('toko-manager')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
