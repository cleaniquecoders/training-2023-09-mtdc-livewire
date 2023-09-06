<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $show = false;

    public function toggle()
    {
        $this->show = ! $this->show;
    }
    
    public function render()
    {
        return view('livewire.modal');
    }
}
