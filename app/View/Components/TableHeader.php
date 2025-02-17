<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHeader extends Component
{
    public array $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public function render(): View|Closure|string
    {
        return view('components.table-header');
    }
}
