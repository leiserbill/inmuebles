<?php

namespace App\Livewire;

use App\Models\Inmueble;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Categoria extends Component
{
    use WithPagination;
    public $nombreCategoria;
    public $termino = "";
    public $categoriaSeleccionada = [];
    

 

    #[On('mostrarCaegoriaBusqueda')]

    public function mostrarCaegoriaBusqueda($terminos){
 
        
        $this->termino = $terminos['termino'];
         $this->categoriaSeleccionada = $terminos['categoriaSeleccionada'];

        $this->nombreCategoria = $terminos['nombreCategoria'];

       

    }


 
    public function render()
    {
        
        $inmuebles = [];
        $termino = $this->termino;
        $categoriaSeleccionada= $this->categoriaSeleccionada;

        if ($categoriaSeleccionada) {
            # code...
            $inmuebles = Inmueble::where('categoria_id', $this->categoriaSeleccionada)->paginate(6);
        }

        if ($termino) {
            # code...
            $inmuebles = Inmueble::when($this->termino, function($query){
                $query->where('titulo', 'LIKE', "%" . $this->termino ."%");
            })->paginate(6);
        }


        $nombreCategoria = $this->nombreCategoria;

        
       
        return view('livewire.categoria', [
          
        'inmuebles' => $inmuebles, 
            'nombreCategoria' => $nombreCategoria
    ]);
    }
}
