<?php

namespace App\Livewire;

use App\Models\Inmueble;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarInmuebles extends Component
{
   
    
    use WithPagination;
    //protected $listeners = ['eliminarInmueble'=>'eliminar'];
    
    #[On('eliminarInmueble')]

    public function eliminar(Inmueble $inmueble)
    {
        //dd($inmueble->titulo);
        $inmueble->delete();
       return redirect(request()->header('Referer'));
    }
    public function render()
    {
        $inmuebles = Inmueble::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);

        return view('livewire.mostrar-inmuebles', [
            'inmuebles' => $inmuebles
        ]);
    }
}
