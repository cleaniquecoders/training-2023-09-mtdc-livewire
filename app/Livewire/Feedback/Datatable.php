<?php

namespace App\Livewire\Feedback;

use App\Models\Feedback;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    #[Url]
    public $perPage = 10;

    #[Url]
    public $search = '';
    public $sortBy = 'created_at';
    public $sortDir = 'desc';

    public function setSort($field)
    {
        if($this->sortBy === $field) {
            $this->sortDir = $this->sortDir == 'asc' ? 'desc' : 'asc';
            return;
        }
        $this->sortBy = $field;
        $this->sortDir = 'desc';
    }

    public function delete($id)
    {
        Feedback::where('id', $id)->delete();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.feedback.datatable', [
            'feedbacks' => Feedback::query()
                ->when($this->search != '', fn($query) => $query->search($this->search))
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage),
        ]);
    }
}
