<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Notifications\NuevoMensaje;
use Illuminate\Support\Facades\Auth;

class EnviarMensaje extends Component
{
    public $userId;
    public $inmuebleId;
    public $mensaje;
    public $inmueble;

    public function mount(){
        $this->inmuebleId = $this->inmueble->id ;
    }

    protected $rules = [
 
        //'inmuebleId' => 'required',
        'mensaje' => 'required|string',
    ];

    public function enviarMensaje()
    {
      
        $datos = $this->validate();

        $userId =Auth::user();
       
        $this->inmueble->vendedor->notify(new NuevoMensaje($this->inmuebleId, $this->inmueble->titulo, $userId , $datos["mensaje"] ));
        
    
        session()->flash('mensaje', 'El mensaje se envio correctamente');

        return redirect(request()->header('Referer'));
    }

    public function render()
    {    
        return view('livewire.enviar-mensaje');
    }
}
