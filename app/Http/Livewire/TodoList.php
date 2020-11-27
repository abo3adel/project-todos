<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TodoList extends Component
{
    public Collection $todos;
    public Category $category;

    public function mount(Category $category): void
    {
        $this->category = $category;
        $this->todos = Todo::where("user_id", auth()->id())
            ->where("category_id", $category->id)
            ->get();
    }

    public function render()
    {
        return view("livewire.todo-list");
    }
}
