<?php

namespace App\Http\Controllers;

use App\Http\Resources\InmuebleCollection;
use App\Models\Inmueble;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {

        return view('inmuebles.index', [
            'user' => $user,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('inmuebles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('inmuebles.agregar-imagen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        
        return view('inmuebles.show', ['inmueble' => $inmueble]);
    }

    public function agregarImagen(Inmueble $inmueble)
    {
       // Gate::authorize('view', $inmueble);
        
        return view('inmuebles.agregar-imagen', ['inmueble' => $inmueble]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inmueble $inmueble)
    {
        return view('inmuebles.edit', ['inmueble' => $inmueble]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inmueble $inmueble)
    {
        
      Gate::authorize('delete', $inmueble);
        $inmueble->delete();

       return redirect()->rute('dashboard', Auth::user()->username);
    }


    public function propiedades()
    {

        $propiedades = new InmuebleCollection(Inmueble::all());
        

        return json_encode( $propiedades) ;
    }
}
