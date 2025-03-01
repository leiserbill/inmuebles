<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $notificaciones= Auth::user()->unreadNotifications;
        // $notificaciones= Auth::user()->markAsRead();
        return view('notificaciones.index', [
            "notificaciones" => $notificaciones
        ]);
    }
}
