<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

class BeritaManager extends Component
{
    public $semuaBerita;
    public $judul, $konten, $gambarUrl;
    public $selectedId;
    public $isUpdateMode = false;

    protected $rules = [
        'judul' => 'required|string|min:5',
        'konten' => 'required|string',
        'gambarUrl' => 'nullable|url',
    ];

    public function mount()
    {
        // Ambil berita dan urutkan dari yang terbaru
        $this->semuaBerita = Berita::with('user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.berita-manager');
    }

    private function resetInput()
    {
        $this->judul = '';
        $this->konten = '';
        $this->gambarUrl = '';
        $this->selectedId = null;
        $this->isUpdateMode = false;
    }

    public function store()
    {
        $this->validate();

        Berita::create([
            'judul' => $this->judul,
            'konten' => $this->konten,
            'gambar_url' => $this->gambarUrl,
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
        ]);

        session()->flash('message', 'Berita berhasil dipublikasikan.');
        $this->resetInput();
        $this->mount(); // Refresh data
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        // Otorisasi: hanya user yang membuat yang bisa edit
        if ($berita->user_id != Auth::id()) {
            session()->flash('error', 'Anda tidak punya hak untuk mengedit berita ini.');
            return;
        }

        $this->selectedId = $id;
        $this->judul = $berita->judul;
        $this->konten = $berita->konten;
        $this->gambarUrl = $berita->gambar_url;
        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $berita = Berita::find($this->selectedId);

            // Otorisasi
            if ($berita->user_id != Auth::id()) {
                session()->flash('error', 'Anda tidak punya hak untuk mengupdate berita ini.');
                return;
            }

            $berita->update([
                'judul' => $this->judul,
                'konten' => $this->konten,
                'gambar_url' => $this->gambarUrl,
            ]);

            session()->flash('message', 'Berita berhasil diupdate.');
            $this->resetInput();
            $this->mount();
        }
    }

    public function delete($id)
    {
        $berita = Berita::find($id);

        // Otorisasi
        if ($berita->user_id != Auth::id()) {
            session()->flash('error', 'Anda tidak punya hak untuk menghapus berita ini.');
            return;
        }

        $berita->delete();
        session()->flash('message', 'Berita berhasil dihapus.');
        $this->mount();
    }
}
