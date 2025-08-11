<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class BeritaManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $judul, $konten;

    public $gambar_baru; // GANTI dari $gambarUrl
    public $gambar_url_lama; // Untuk menyimpan path saat edit

    public $selectedId;
    public $isUpdateMode = false;

    protected $paginationTheme = 'tailwind';
    // UBAH ATURAN VALIDASI
    protected $rules = [
        'judul' => 'required|string|min:10|max:255',
        'konten' => 'required|string',
        'gambar_baru' => 'nullable|image|max:2048', // Maksimal 2MB
    ];

    public function render()
    {
        return view('livewire.berita-manager', [
            'semuaBerita' => Berita::with('user')->latest()->paginate(5)
        ]);
    }

    private function resetInput()
    {
        $this->judul = '';
        $this->konten = '';
        $this->selectedId = null;
        $this->isUpdateMode = false;

        $this->gambar_baru = null; // Tambahkan ini
        $this->gambar_url_lama = null; // Tambahkan ini
    }

    public function store()
    {
        $this->authorizeAdmin();
        $this->validate();

        $path_gambar = null;
        if ($this->gambar_baru) {
            // Simpan gambar di folder 'news'
            $path_gambar = $this->gambar_baru->store('news', 'public');
        }

        Berita::create([
            'judul' => $this->judul,
            'konten' => $this->konten,
            'gambar_url' => $path_gambar, // Simpan path, bukan URL
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Berita berhasil dipublikasikan.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $this->authorizeAdmin();
        $berita = Berita::findOrFail($id);

        $this->selectedId = $id;
        $this->judul = $berita->judul;
        $this->konten = $berita->konten;

        // Simpan path gambar lama
        $this->gambar_url_lama = $berita->gambar_url;
        $this->gambar_baru = null;

        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->authorizeAdmin();
        $this->validate();

        if ($this->selectedId) {
            $berita = Berita::find($this->selectedId);
            $path_gambar = $berita->gambar_url;

            if ($this->gambar_baru) {
                // Hapus gambar lama jika ada
                if ($berita->gambar_url) {
                    Storage::disk('public')->delete($berita->gambar_url);
                }
                // Simpan gambar baru
                $path_gambar = $this->gambar_baru->store('news', 'public');
            }

            $berita->update([
                'judul' => $this->judul,
                'konten' => $this->konten,
                'gambar_url' => $path_gambar,
            ]);

            session()->flash('message', 'Berita berhasil diupdate.');
            $this->resetInput();
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
    }

    private function authorizeAdmin()
    {
        // Cek jika pengguna tidak login ATAU jika pengguna bukan admin
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            // Hentikan eksekusi dan kirim response 'Akses Ditolak'
            abort(403, 'Akses Ditolak.');
        }
    }
}
