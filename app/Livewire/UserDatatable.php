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

    public $sortBy = 'created_at';
    public $sortDir = 'desc';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setSort($field)
    {
        if($this->sortBy == $field) {
            $this->sortDir = $this->sortDir == 'desc' ? 'asc' : 'desc';
            return;
        }

        $this->sortBy = $field;
        $this->sortDir = 'desc';
    }

    public function render()
    {
        return view('livewire.user-datatable', [
            'users' => User::query()
                ->search($this->search)
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
