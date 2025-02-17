<?php

namespace App\Livewire;

use Livewire\Component;

class ParentBooksPage extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.parent-books-page');
    }
}
