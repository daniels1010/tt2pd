<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainTitle extends Component
{
    public $title = "TMIS";
    public $subtitle = "Tiešsaistes mūzikas instrumentu skola";

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-title');
    }
}
