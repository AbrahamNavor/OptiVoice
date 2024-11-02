<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{

    public array $headers;
    public array $rows;

    public function __construct(array $headers,array $rows)
    {
        $this->headers = $headers;
        $this->rows = $rows;
    }

    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
