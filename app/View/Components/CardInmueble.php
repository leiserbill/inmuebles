<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardInmueble extends Component
{
    public $inmuebles;
 
    public function __construct($inmuebles)
    {
       $this->inmuebles = $inmuebles;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-inmueble');
    }
}
