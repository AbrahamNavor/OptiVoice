<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $headers;
    public $rows;

    /**
     * Crear una nueva instancia del componente.
     *
     * @param  mixed  $headers
     * @param  mixed  $rows
     * @return void
     */
    public function __construct($headers, $rows)
    {
        $this->headers = $headers;
        // Si $rows es una colección, convertirlo a array
        $this->rows = is_array($rows) ? $rows : $rows->toArray();
    }

    /**
     * Renderizar el componente.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.table');
    }
}
