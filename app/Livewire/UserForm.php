<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserForm extends Component
{

    use WithFileUploads;

    #[Rule('required|min:3|max:128')]
    public string $name = '';

    #[Rule('required|email|max:128')]
    public string $email = '';

    #[Rule('required')]
    public array $languages = [];

    #[Rule('required')]
    public string $gender = '';

    #[Rule('image|max:1024')]
    public $photo;

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
