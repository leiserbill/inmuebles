<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Image;
use App\Models\Inmueble;
use Livewire\Attributes\On;

class SubirImagen extends Component
{

    public $inmueble;
    public $imagenSeleccionada = null;
    public $imagenes;
    
    #[On("mount")]
    public function mount($inmueble)
    {
        $this->inmueble = $inmueble;
        $this->imagenes = $inmueble->images;
        $this->imagenSeleccionada = $this->inmueble->image?? "";
        
    }

    protected $rules = [
        
        'imagenSeleccionada' => 'required'
    ];

    public function seleccionarImagen()
    {
        $datos = $this->validate();
        //buscar los datos de la imagen, para saber la url y id
     
        $imagenSelect = Image::find($datos['imagenSeleccionada']);

       // comparar si existe en inmueble->image

        //---si existe comparar si es igual o se seleccionó uno diferente---
        

        if($this->imagenSeleccionada === intval($datos['imagenSeleccionada'])){
            return redirect()->route('inmuebles.index');
        }
       
        
            //---si no existe o es diferente a la que existe


            $this->inmueble->image = $imagenSelect->url;
            $this->inmueble->save();
            return redirect()->route('inmuebles.index');

    }

   //protected $listeners = ["guardarImagen" , "eliminarImagen"];
    #[On("guardarImagen")]
    public function guardarImagen($imagenes)
    {

        foreach ($imagenes as $imagen) {

                Image::create([
                    'image' => $imagen['imagen'],
                    'url' => $imagen['url'],
                    'descripcion' => '',
                    'inmueble_id' => $imagen['inmueble_id']
                ]);
        }

        session()->flash('message', 'Inmueble guardado correctamente.');
       
        return redirect(request()->header('Referer'));
      // return redirect()->route('inmuebles.index');

    }

    protected $listeners = ['some-event' => '$refresh'];

   #[On("eliminarImagen")]
    public function eliminarImagen(Image $image)
    {
        cloudinary()->destroy($image->url);
        $image->delete();
       
        $this->dispatch('some-event');
      //  return redirect(request()->header('Referer'));
    }




    public function render()
    {
        return view('livewire.subir-imagen');
    }


}
