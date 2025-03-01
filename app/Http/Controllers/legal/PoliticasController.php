<?php

namespace App\Http\Controllers\legal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('legal.politicas');
    }
}
