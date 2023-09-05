<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserDatatable extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $search = '';

    public string $sortBy = 'created_at';
    public string $sortDir = 'desc';

    public string $isVerified = '';
    public string $markAction = '';

    public bool $selectAllCurrentPage = false;
    public array $selectedRows = [];

    /** wip */
    public bool $selectAll = false;
    public array $selectedCheckboxes = [];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedIsVerified()
    {
        $this->resetPage();
    }

    public function removeUser($id)
    {
        User::whereId($id)->delete();

        $this->reset();
    }

    public function removeSelectedUsers()
    {
        if(count($this->selectedRows) == 0) {
            return;
        }

        User::whereIn('id', $this->selectedRows)->delete();

        $this->reset();
    }

    public function verifySelectedUsers()
    {
        if(count($this->selectedRows) == 0) {
            return;
        }

        User::whereIn('id', $this->selectedRows)->update([
            'email_verified_at' => now(),
        ]);

        $this->reset();
    }

    public function unVerifySelectedUsers()
    {
        if(count($this->selectedRows) == 0) {
            return;
        }

        User::whereIn('id', $this->selectedRows)->update([
            'email_verified_at' => null,
        ]);

        $this->reset();
    }

    // @todo when updated / updating page, it shouldn't select the checkboxes that not yet selected.
    public function updatingPage()
    {
        // check if selected records exists in selected rows
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
