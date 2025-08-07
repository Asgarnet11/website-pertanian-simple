<?php

namespace App\Livewire;

use App\Models\Kategori;
use Livewire\Component;
use App\Models\Produk;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class TokoManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    // Properti untuk form
    public $nama_produk, $deskripsi, $harga, $stok, $kategori_id;
    public $gambar_baru;

    // Properti untuk manajemen state
    public $gambar_url_lama;
    public $selectedId;
    public $isUpdateMode = false;

    // Properti untuk filter
    public $filterKategori = null;

    protected $paginationTheme = 'tailwind';

    protected function rules()
    {
        return [
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'gambar_baru' => 'nullable|image|max:2048' . ($this->isUpdateMode ? '' : '|required'),
        ];
    }

    public function filterByKategori($kategoriId)
    {
        $this->filterKategori = $kategoriId;
        $this->resetPage(); // Reset pagination ke halaman 1 setiap kali filter diubah
    }

    public function clearFilter()
    {
        $this->filterKategori = null;
        $this->resetPage();
    }

    public function render()
    {
        $query = Produk::query()->with('kategori');

        if ($this->filterKategori) {
            $query->where('kategori_id', $this->filterKategori);
        }

        return view('livewire.toko-manager', [
            'produks' => $query->latest()->paginate(8),
            'kategoris' => Kategori::orderBy('nama')->get()
        ]);
    }

    private function resetInput()
    {
        $this->nama_produk = '';
        $this->deskripsi = '';
        $this->harga = '';
        $this->stok = '';
        $this->kategori_id = '';
        $this->gambar_baru = null;
        $this->gambar_url_lama = null;
        $this->selectedId = null;
        $this->isUpdateMode = false;
    }

    public function store()
    {
        $this->validate();

        $path_gambar = $this->gambar_baru->store('products', 'public');

        Produk::create([
            'nama_produk' => $this->nama_produk,
            'kategori_id' => $this->kategori_id,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'gambar_url' => $path_gambar,
        ]);

        session()->flash('message', 'Produk berhasil ditambahkan.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $this->selectedId = $id;
        $this->nama_produk = $produk->nama_produk;
        $this->deskripsi = $produk->deskripsi;
        $this->harga = $produk->harga;
        $this->stok = $produk->stok;
        $this->kategori_id = $produk->kategori_id;
        $this->gambar_url_lama = $produk->gambar_url;
        $this->gambar_baru = null;
        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $produk = Produk::find($this->selectedId);
            $path_gambar = $produk->gambar_url;

            if ($this->gambar_baru) {
                if ($produk->gambar_url) {
                    Storage::disk('public')->delete($produk->gambar_url);
                }
                $path_gambar = $this->gambar_baru->store('products', 'public');
            }

            $produk->update([
                'nama_produk' => $this->nama_produk,
                'kategori_id' => $this->kategori_id,
                'deskripsi' => $this->deskripsi,
                'harga' => $this->harga,
                'stok' => $this->stok,
                'gambar_url' => $path_gambar,
            ]);

            session()->flash('message', 'Produk berhasil diupdate.');
            $this->resetInput();
        }
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        if ($produk->gambar_url) {
            Storage::disk('public')->delete($produk->gambar_url);
        }
        $produk->delete();
        session()->flash('message', 'Produk berhasil dihapus.');
    }

    private function authorizeAdmin()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Akses Ditolak.');
        }
    }
}
