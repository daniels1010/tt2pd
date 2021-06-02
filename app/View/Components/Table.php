<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $baseUrl;
    public $headers;
    public $models;
    public $properties;
    public $displayCreateBtn;
    public $createText;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers, $models, $properties, $baseUrl, bool $displayCreateBtn = true, string $createText = '')
    {
        $this->baseUrl = $baseUrl;
        $this->headers = $headers;
        $this->models = $models;
        $this->properties = $properties;
        $this->displayCreateBtn = $displayCreateBtn;
        $this->createText = $createText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table');
    }
}
