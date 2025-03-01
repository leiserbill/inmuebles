<?php

namespace App\Http\Controllers\legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TerminosController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('legal.terminosCondiciones');
       
    }
}
