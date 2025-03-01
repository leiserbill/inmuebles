<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Categoria;


class FiltrarInmuebles extends Component
{
    public $nombreCategoria ="";
    public $termino = "";
    public $categoriaSeleccionada = 0;

 

    public function buscarCategoria()
    {
        
        $this->termino = "";
        
        $terminos = [
            'termino' => "",
            'categoriaSeleccionada' => $this->categoriaSeleccionada['id'],
            'nombreCategoria' => $this->categoriaSeleccionada['nombre']
        ];
        
        
        $this->dispatch('terminosBusqueda', $terminos);
    }


    protected $rules = [
    
        'termino' => 'nullable|string',
    ];




    public function terminoBusqueda()
    {
        $datos = $this->validate();
    

        $this->categoriaSeleccionada = 0;
        
        $terminos = [
            'termino' => $datos['termino'],
            'categoriaSeleccionada' => 0,
            'nombreCategoria' => ""
        ];
        
        
        $this->dispatch('terminosBusqueda', $terminos);
    }


    public function render()
    {

        $categorias = Categoria::all();
        return view('livewire.filtrar-inmuebles', ['categorias' => $categorias]);
    }
}
