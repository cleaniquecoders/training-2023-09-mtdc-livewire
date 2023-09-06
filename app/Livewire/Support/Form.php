<?php

namespace App\Livewire\Support;

use App\Models\Support;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Form extends Component
{
    #[Rule([
        'state.name' => 'required|min:5|max:255',
        'state.description' => 'required|min:5|max:50000',
        'state.phone_number' => 'required|numeric',
        'state.email' => 'required|email',
        'state.urgency_level' => 'required',
        'state.contact_by' => 'required',
    ], attribute: [
        'state.name' => 'name',
        'state.description' => 'description',
        'state.phone_number' => 'phone number',
        'state.email' => 'email',
        'state.urgency_level' => 'urgency level',
        'state.contact_by' => 'contact_by',
    ])]
    public $state = [
        'name' => '',
        'email' => '',
        'phone_number' => '',
        'urgency_level' => '',
        'contact_by' => '',
        'type' => '',
        'description' => '',
    ];

    public function save()
    {
        $this->validate();

        Support::create($this->state);

        $this->dispatch('status', message: 'You support request has been submitted.');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.support.form');
    }
}
