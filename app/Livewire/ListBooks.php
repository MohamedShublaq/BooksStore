<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class ListBooks extends Component
{
    use WithPagination;

    public $selectedCategories = [];
    public $selectedPublishers = [];
    public $selectedYear;

    protected $listeners =
    [
        'filterByCategory' => 'updateCategoryFilter',
        'filterByPublisher' => 'updatePublisherFilter',
        'filterByYear' => 'updateYearFilter',
    ];

    public function updateCategoryFilter($categories)
    {
        $this->selectedCategories = $categories;
    }

    public function updatePublisherFilter($publishers)
    {
        $this->selectedPublishers = $publishers;
    }

    public function updateYearFilter($year)
    {
        $this->selectedYear = $year;
    }

    public function render()
    {
        $query = Book::with('author');

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }
        if (!empty($this->selectedPublishers)) {
            $query->whereIn('publisher_id', $this->selectedPublishers);
        }
        if (!empty($this->selectedYear)) {
            $query->where('publish_year', $this->selectedYear);
        }
        $books = $query->paginate(10);
        return view('livewire.list-books' , compact('books'));
    }
}
