<?php

namespace App\Livewire;

use Livewire\Component;

class Input extends Component
{
    public $name = '';

    public function render()
    {
        return view('livewire.input');
    }
}
