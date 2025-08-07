<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HomeContent;

class HomeContentManager extends Component
{
    public $contents;
    public $title, $description, $imageUrl;
    public $selectedId;
    public $isUpdateMode = false;

    // Aturan validasi
    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'required',
        'imageUrl' => 'nullable|url'
    ];

    public function mount()
    {
        $this->contents = HomeContent::all();
    }

    public function render()
    {
        return view('livewire.home-content-manager');
    }

    private function resetInput()
    {
        $this->title = '';
        $this->description = '';
        $this->imageUrl = '';
        $this->isUpdateMode = false;
        $this->selectedId = null;
    }

    public function store()
    {
        $this->validate();

        HomeContent::create([
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $this->imageUrl
        ]);

        session()->flash('message', 'Konten berhasil ditambahkan.');
        $this->resetInput();
        $this->mount(); // Refresh data
    }

    public function edit($id)
    {
        $content = HomeContent::findOrFail($id);
        $this->selectedId = $id;
        $this->title = $content->title;
        $this->description = $content->description;
        $this->imageUrl = $content->image_url;
        $this->isUpdateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selectedId) {
            $content = HomeContent::find($this->selectedId);
            $content->update([
                'title' => $this->title,
                'description' => $this->description,
                'image_url' => $this->imageUrl
            ]);

            session()->flash('message', 'Konten berhasil diupdate.');
            $this->resetInput();
            $this->mount(); // Refresh data
        }
    }

    public function delete($id)
    {
        HomeContent::find($id)->delete();
        session()->flash('message', 'Konten berhasil dihapus.');
        $this->mount(); // Refresh data
    }
}
