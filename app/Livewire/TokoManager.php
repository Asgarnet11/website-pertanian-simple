<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;

class TokoManager extends Component
{
    public $produks;
    public $nama_produk, $deskripsi, $harga, $stok, $gambar_url;
    public $selectedId;
    public $isUpdateMode = false;

    protected $rules = [
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|integer|min:0',
        'stok' => 'required|integer|min:0',
        'gambar_url' => 'nullable|url',
    ];

    public function mount()
    {
        $this->produks = Produk::latest()->get();
    }

    public function render()
    {
        return view('livewire.toko-manager');
    }

    private function resetInput()
    {
        $this->nama_produk = '';
        $this->deskripsi = '';
        $this->harga = '';
        $this->stok = '';
        $this->gambar_url = '';
        $this->selectedId = null;
        $this->isUpdateMode = false;
    }

    public function store()
    {
        $this->validate();

        Produk::create([
            'nama_produk' => $this->nama_produk,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'gambar_url' => $this->gambar_url,
        ]);

        session()->flash('message', 'Produk berhasil ditambahkan.');
        $this->resetInput();
        $this->mount();
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $this->selectedId = $id;
        $this->nama_produk = $produk->nama_produk;
        $this->deskripsi = $produk->deskripsi;
        $this->harga = $produk->harga;
        $this->stok = $produk->stok;
        $this->gambar_url = $produk->gambar_url;
        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $produk = Produk::find($this->selectedId);
            $produk->update([
                'nama_produk' => $this->nama_produk,
                'deskripsi' => $this->deskripsi,
                'harga' => $this->harga,
                'stok' => $this->stok,
                'gambar_url' => $this->gambar_url,
            ]);

            session()->flash('message', 'Produk berhasil diupdate.');
            $this->resetInput();
            $this->mount();
        }
    }

    public function delete($id)
    {
        Produk::find($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus.');
        $this->mount();
    }

    private function authorizeAdmin()
    {
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            abort(403, 'Akses Ditolak.');
        }
    }
}
