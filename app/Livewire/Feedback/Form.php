<?php

namespace App\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Form extends Component
{
    #[Rule([
        'state.title' => 'required|min:5|max:255',
        'state.content' => 'required|min:5|max:50000',
        'state.name' => 'required|min:5|max:250',
        'state.email' => 'required|email',
    ], attribute: [
        'state.title' => 'title',
        'state.content' => 'feedback',
        'state.name' => 'name',
        'state.email' => 'email',
    ])]
    public $state = [
        'title' => '',
        'content' => '',
        'name' => '',
        'email' => '',
    ];

    public function save()
    {
        $this->validate();

        Feedback::create($this->state);

        $this->dispatch('status', message: 'Feedback successfully submitted.', type: 'success');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.feedback.form');
    }
}
