<?php

namespace App\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Component;

class Form extends Component
{
    public $state = [
        'title' => '',
        'content' => '',
        'name' => '',
        'email' => '',
    ];

    public function save()
    {
        Feedback::create($this->state);

        session()->flash('status', 'Feedback successfully submitted.');

        return $this->redirect('/feedbacks/form');
    }

    public function render()
    {
        return view('livewire.feedback.form');
    }
}
