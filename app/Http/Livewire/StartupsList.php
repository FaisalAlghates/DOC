<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Documentation;

class StartupsList extends Component
{

    public $documentations;
    public $title;
    public $purpose;
    public $editId = null;

    public function mount()
    {
        $this->fetchDocumentations();
    }

    public function fetchDocumentations()
    {
        $this->documentations = Documentation::latest()->get();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'purpose' => 'nullable|string|max:500',
        ]);
        Documentation::create([
            'title' => $this->title,
            'purpose' => $this->purpose,
        ]);
        $this->reset(['title', 'purpose']);
        $this->fetchDocumentations();
    }

    public function edit($id)
    {
        $doc = Documentation::findOrFail($id);
        $this->editId = $doc->id;
        $this->title = $doc->title;
        $this->purpose = $doc->purpose;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'purpose' => 'nullable|string|max:500',
        ]);
        $doc = Documentation::findOrFail($this->editId);
        $doc->update([
            'title' => $this->title,
            'purpose' => $this->purpose,
        ]);
        $this->reset(['title', 'purpose', 'editId']);
        $this->fetchDocumentations();
    }

    public function delete($id)
    {
        Documentation::findOrFail($id)->delete();
        $this->fetchDocumentations();
    }

    public function render()
    {
        return view('livewire.startups-list', [
            'documentations' => $this->documentations
        ]);
    }
}