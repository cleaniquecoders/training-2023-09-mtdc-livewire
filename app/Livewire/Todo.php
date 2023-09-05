<?php

namespace App\Livewire;

use App\Models\Todo as Model;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Todo extends Component
{
    public Collection $todos;

    #[Rule('required|min:3|max:255')]
    public string $todo = '';

    public function toggle($id)
    {
        $todo = $this->todos->where('id', $id)->first();
        Model::where('id', $id)->update([
            'is_completed' => $todo->is_completed ? false : true,
        ]);
        $this->refreshTodos();
    }

    public function refreshTodos()
    {
        $this->todos = Model::query()->get();
    }

    public function delete($id)
    {
        Model::where('id', $id)->delete();

        $this->refreshTodos();
    }

    public function mount()
    {
        $this->refreshTodos();
    }

    public function add()
    {
        $this->validate();

        Model::create([
            'todo' => $this->todo,
        ]);

        $this->refreshTodos();

        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todo');
    }
}
