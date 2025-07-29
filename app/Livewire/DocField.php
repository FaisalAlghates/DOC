<?php

namespace App\Livewire;

use Livewire\Component;

class DocField extends Component
{
    public $label;
    public $value;
    public $color;

    public function mount($label = '', $value = '', $color = 'blue')
    {
        $this->label = $label;
        $this->value = $value;
        $this->color = $color;
    }

    public function render()
    {
        return view('livewire.doc-field');
    }
}
