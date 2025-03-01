<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CookieComponent extends Component
{

    public $showBar = true;

    public function render()
    {
        $this->es_aceptada();

        return view('livewire.cookie-component');
    }

    public function es_aceptada()
    {
        if(Cookie::has('cookiesAceptadas'))
        {
            $this->showBar = false;
        }
    }


    public function aceptarCookie()
    {
        Cookie::queue('cookiesAceptadas', 'true');
        $this->showBar = false;
    }
}
