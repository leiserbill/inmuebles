<?php

namespace App\Livewire;



use App\Models\Precio;
use Livewire\Component;
use App\Models\Inmueble;
use App\Models\Categoria;



class EditarInmueble extends Component
{
        public $mapa;
        public $marker;
        public $inmueble_id;
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
        public $imagen;
        public $imagen_nueva;


    public function mount(Inmueble $inmueble){
        $this->inmueble_id = $inmueble->id ;
        $this->titulo = $inmueble->titulo;
        $this->imagen = $inmueble->image;
        $this->descripcion = $inmueble->descripcion;
        $this->habitaciones = $inmueble->habitaciones;
        $this->estacionamiento = $inmueble->estacionamiento;
        $this->WC = $inmueble->WC;
        $this->calle = $inmueble->calle;
        $this->lat = $inmueble->lat;
        $this->lng = $inmueble->lng;
        $this->publicado = $inmueble->publicado;
        $this->categoria = $inmueble->categoria_id;
        $this->precio = $inmueble->precio_id;
        $this->user_id = $inmueble->user_id;

    }



    protected $rules = [
        
        
        'titulo' => 'required|string',
        'descripcion' => 'required|string',
        'habitaciones' => 'required',
        'estacionamiento' => 'required',
        'WC' => 'required',
        'calle'=>'nullable|string',
        'lat' => 'required|string',
        'lng' => 'required|string',
        'categoria' => 'required',
        'precio' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024'
    ];
    public function editarInmueble()
    {
        $datos =$this->validate();

        //si hay una nueva imagen
        

        
        // Encontrar el inmueble a editar
            $inmueble = Inmueble::find($this->inmueble_id);

        // Asignar los valores

        $inmueble->titulo = $datos['titulo'];
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
        $inmueble->image = $datos['imagen']?? $inmueble->image;
       
        
        // Guardar los cambios al Inmueble
        
        $inmueble->save();

   

        // Redireccionar

        session()->flash('mensaje', 'La Publicación se Actualizo Correctamente');

        return redirect()->route('inmuebles.agregar-imagen', $inmueble->id);
    }




    public function render()
    {
        $precios = Precio::all();
         $categorias = Categoria::all();
        return view('livewire.editar-inmueble', [
            'precios' => $precios,
            'categorias' => $categorias
        ]);
    }

 

}
