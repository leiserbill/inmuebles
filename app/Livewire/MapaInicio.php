<?php

namespace App\Livewire;

use App\Http\Resources\InmuebleCollection;
use App\Models\Categoria;
use App\Models\Inmueble;
use App\Models\Precio;
use Livewire\Attributes\On;
use Livewire\Component;

class MapaInicio extends Component
{

    public $categoria = '';
    public $precio = '';
    public $idCategoria;
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
        $categorias = Categoria::all();
        $precios = Precio::all();
        $terrenos = new InmuebleCollection(inmueble::where('categoria_id', 1)->orderBy('created_at', 'desc')->limit(3)->get());
        $lotes = new InmuebleCollection(inmueble::where('categoria_id', 2)->orderBy('created_at', 'desc')->limit(3)->get());
        $casas = new InmuebleCollection(Inmueble::where('categoria_id', 3)->orderBy('created_at', 'desc')->limit(3)->get());
        $departamentos = new InmuebleCollection(Inmueble::where('categoria_id', 4)->orderBy('created_at', 'desc')->limit(3)->get());
        $bodegas = new InmuebleCollection(Inmueble::where('categoria_id', 5)->orderBy('created_at', 'desc')->limit(3)->get());
        
        
        return view('livewire.mapa-inicio', [
            'precios' => $precios,
            'categorias' => $categorias,
            'terrenos' => $terrenos,
            'lotes'=> $lotes,
            'casas' => $casas,
            'departamentos' => $departamentos,
            'bodegas' => $bodegas,
            
        ]);
    }
    
    public function mostrarPropiedades() {

       
   
    }

}
