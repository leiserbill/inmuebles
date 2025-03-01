<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ShowInmueble extends Component
{
    public $inmueble = '';
    public $nombreCategoria;
    public $termino;
    public $categoriaSeleccionada;
   
    #[On('terminosBusqueda')]

    public function terminosBusqueda($terminos){

        
        $this->termino = $terminos['termino'];
        $this->categoriaSeleccionada = $terminos['categoriaSeleccionada'];
        $this->dispatch('mostrarCaegoriaBusqueda', $terminos);

    }
    public function render()
    {
        return view('livewire.show-inmueble');
    }
}
