<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Inmueble;
use App\Models\Precio;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        // Obtener todos los inmuebles de la base de datos
        $inmuebles = Inmueble::where('publicado', 1)->paginate(3);
        $precios = Precio::all();
        $categorias = Categoria::all();
        $user = User::all();
        // Pasar los inmuebles a la vista 'home'
        return view(
            'home',
            [
                'inmuebles' => $inmuebles,
                'user' => $user,
                'precios' => $precios,
                'categorias' => $categorias
            ]
        );
    }

}
