<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\Produk;
use Livewire\Component;

class GlobalSearch extends Component
{
    public $search = '';
    public $searchResults = [];

    /**
     * Lifecycle hook yang berjalan setiap kali properti $search diupdate.
     */
    public function updatedSearch($value)
    {
        // Hanya jalankan pencarian jika input lebih dari 2 karakter
        if (strlen($this->search) > 2) {
            // Cari di model Produk, ambil 5 hasil teratas
            $products = Produk::where('nama_produk', 'like', '%' . $this->search . '%')->limit(5)->get();

            // Cari di model Berita, ambil 5 hasil teratas
            $articles = Berita::where('judul', 'like', '%' . $this->search . '%')->limit(5)->get();

            // Gabungkan hasilnya ke dalam satu array untuk ditampilkan
            $this->searchResults = [
                'produk' => $products,
                'berita' => $articles,
            ];
        } else {
            // Kosongkan hasil jika input terlalu pendek
            $this->searchResults = [];
        }
    }

    /**
     * Fungsi untuk me-reset pencarian, dipanggil saat hasil di-klik.
     */
    public function resetSearch()
    {
        $this->search = '';
        $this->searchResults = [];
    }

    public function render()
    {
        return view('livewire.global-search');
    }
}
