<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserDatatable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user-datatable', [
            'users' => User::query()
                ->search($this->search)
                ->paginate($this->perPage),
        ]);
    }
}
