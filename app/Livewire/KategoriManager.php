<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriManager extends Component
{
    public $kategoris;
    public $nama;
    public $selectedId;
    public $isUpdateMode = false;

    protected $rules = [
        'nama' => 'required|string|min:3|unique:kategoris,nama',
    ];

    public function mount()
    {
        $this->kategoris = Kategori::all();
    }

    public function render()
    {
        return view('livewire.kategori-manager');
    }

    private function resetInput()
    {
        $this->nama = '';
        $this->selectedId = null;
        $this->isUpdateMode = false;
    }

    public function store()
    {
        $this->validate();

        Kategori::create([
            'nama' => $this->nama,
            'slug' => Str::slug($this->nama), // Otomatis buat slug
        ]);

        session()->flash('message', 'Kategori berhasil ditambahkan.');
        $this->resetInput();
        $this->mount();
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        $this->selectedId = $id;
        $this->nama = $kategori->nama;
        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|min:3|unique:kategoris,nama,' . $this->selectedId,
        ]);

        if ($this->selectedId) {
            $kategori = Kategori::find($this->selectedId);
            $kategori->update([
                'nama' => $this->nama,
                'slug' => Str::slug($this->nama),
            ]);

            session()->flash('message', 'Kategori berhasil diupdate.');
            $this->resetInput();
            $this->mount();
        }
    }

    public function delete($id)
    {
        Kategori::find($id)->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
        $this->mount();
    }
}
