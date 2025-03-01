<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Precio;
use App\Models\Categoria;
use App\Models\Inmueble;


class CrearInmueble extends Component
{
        public $titulo;
        public $descripcion;
        public $habitaciones;
        public $estacionamiento;
        public $WC;
        public $calle;
        public $lat;
        public $lng;
        public $publicado;
        public $categoria;
        public $precio;
        public $user_id;


    protected $rules = [
    
        'titulo' => 'required|string',
        'descripcion' => 'required|string',
        'habitaciones' => 'required',
        'estacionamiento' => 'required',
        'WC' => 'required',
        'calle'=>'required|string',
        'lat' => 'required|string',
        'lng' => 'required|string',
        'categoria' => 'required',
        'precio' => 'required',

    ];
    

    public function creaInmueble()
    {
        $datos = $this->validate();
   
        // crear la Publicacion

        $inmueble = new Inmueble();
        $inmueble->titulo = $datos['titulo'];
        $inmueble->image= "";
        $inmueble->descripcion = $datos['descripcion'];
        $inmueble->habitaciones = (int)$datos['habitaciones'];
        $inmueble->estacionamiento = (int)$datos['estacionamiento'];
        $inmueble->WC = (int)$datos['WC'];
        $inmueble->calle = $datos['calle'];
        $inmueble->lat = $datos['lat'];
        $inmueble->lng = $datos['lng'];
        $inmueble->publicado = 1;
        $inmueble->categoria_id = $datos['categoria'];
        $inmueble->precio_id = $datos['precio'];
        $inmueble->user_id = auth()->user()->id;
        $inmueble->save();

        // Inmueble::create([
        //     'inmueble' => $nombreImagen,
        //     'inmueble' => $datos['titulo'],
        //     'inmueble' => $datos['descripcion'],
        //     'inmueble' => (int)$datos['habitaciones'],
        //     'inmueble' => (int)$datos['estacionamiento'],
        //     'inmueble' => (int)$datos['WC'],
        //     'inmueble' => $datos['calle'],
        //     'inmueble' => $datos['lat'],
        //     'inmueble' => $datos['lng'],
        //     'inmueble' => 1,
        //     'inmueble' => $datos['categoria'],
        //     'inmueble' => $datos['precio'],
        //     'inmueble' => auth()->user->id,
        //  ]);


        // crear un mensaje
        session()->flash('mensaje', 'la Publicacion se Creo Correctamente');

        // Redireccionar al usuario

        return redirect()->route('inmuebles.agregar-imagen', $inmueble->id);
    }

    public function mount()
{
    $this->lat = ""; 
    $this->lng = ""; 
    $this->calle = ""; 


}



    public function render()
    {

         $precios = Precio::all();
         $categorias = Categoria::all();

        return view('livewire.crear-inmueble', 
        [
            'precios' => $precios,
            'categorias' => $categorias
        ]);
    }
}
