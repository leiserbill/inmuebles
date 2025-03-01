<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Inmueble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Intervention\Image\Facades\Image as IntervetionImage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        
                
        $image = new Image();
        $image->nombre = $request->name;
        $image->url = $request->url;
        $image->descripcion = "";
        $image->inmueble_id = $request->inmueble_id;

        return response()->json(['imagen' => $image->nombre ]);
        
        $image->save();
        return $image;
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        
        return view('inmuebles.agregar-imagen', ['inmueble'=>$inmueble]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
