<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleButton extends Component
{
    public $active = false;

    public function render()
    {
        return view('livewire.toggle-button');
    }
}
