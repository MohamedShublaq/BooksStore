<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesAccordion extends Component
{
    public $categories;
    public $categoriesIds = [];

    public function updatedCategoriesIds()
    {
        $this->dispatch('filterByCategory', $this->categoriesIds);
        //to keep show the books count for each category
        $this->categories = Category::has('books')->withCount('books')->get();
    }

    public function render()
    {
        return view('livewire.categories-accordion');
    }
}
