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

    public $isVerified = '';

    public $selectAll = false;
    public $selectAllCurrentPage = false;
    public $selectedRows = [];
    public $selectedCheckboxes = [];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    // @todo when updated / updating page, it shouldn't select the checkboxes that not yet selected.
    public function updatingPage()
    {
        // dd($this->selectedRows);
    }

    public function updatedSelectedRows()
    {
        // make sure it's integer or actually we can omit this - in case we are using uuid over id.
        $this->selectedRows = collect($this->selectedRows)->map(fn($value) => (int) $value)->toArray();
    }

    public function updatedSelectAllCurrentPage()
    {
        $this->selectedRows =
            ! $this->selectAllCurrentPage ? []
            : collect(User::query()
                ->paginate($this->perPage, ['*'], 'page', $this->getPage())
                ->items())->pluck('id')->toArray();
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
                ->when($this->isVerified === "1", fn($query) => $query->whereNotNull('email_verified_at'))
                ->when($this->isVerified === "2", fn($query) => $query->whereNull('email_verified_at'))
                ->paginate($this->perPage),
        ]);
    }
}
