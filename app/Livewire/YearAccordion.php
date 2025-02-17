<?php

namespace App\Livewire;

use Livewire\Component;

class YearAccordion extends Component
{
    public $year;

    public function updatedYear()
    {
        $this->dispatch('filterByYear', $this->year);
    }

    public function render()
    {
        return view('livewire.year-accordion');
    }
}
