<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImportExcel extends Component
{
    public string $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render(): View|Closure|string
    {
        return view('components.import-excel');
    }
}
