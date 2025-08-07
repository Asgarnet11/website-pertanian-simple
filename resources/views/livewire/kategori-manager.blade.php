<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    {{-- Kolom Kiri: Form Tambah/Edit --}}
    <div class="md:col-span-1">
        <div class="p-4 border rounded-lg bg-gray-50">
            <h3 class="text-lg font-bold mb-4">{{ $isUpdateMode ? 'Update Kategori' : 'Tambah Kategori Baru' }}</h3>
            @if (session()->has('message'))
                <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">{{ session('message') }}</div>
            @endif

            <form wire:submit.prevent="{{ $isUpdateMode ? 'update' : 'store' }}">
                <div class="mb-4">
                    <label for="nama" class="block">Nama Kategori</label>
                    <input type="text" wire:model="nama" class="w-full border-gray-300 rounded-md">
                    @error('nama')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                    {{ $isUpdateMode ? 'Update' : 'Simpan' }}
                </button>
            </form>
        </div>
    </div>

    {{-- Kolom Kanan: Daftar Kategori --}}
    <div class="md:col-span-2">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($kategoris as $kategori)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $kategori->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $kategori->slug }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button wire:click="edit({{ $kategori->id }})"
                                    class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                <button wire:click="delete({{ $kategori->id }})"
                                    class="text-red-600 hover:text-red-900 ml-4">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
