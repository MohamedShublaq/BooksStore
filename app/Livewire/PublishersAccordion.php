<?php

namespace App\Livewire;

use App\Models\Publisher;
use Livewire\Component;

class PublishersAccordion extends Component
{
    public $publishersIds = [];

    public function updatedPublishersIds()
    {
        $this->dispatch('filterByPublisher', $this->publishersIds);
    }

    public function render()
    {
        $publishers = Publisher::withCount('books')->get();
        return view('livewire.publishers-accordion' , compact('publishers'));
    }
}
