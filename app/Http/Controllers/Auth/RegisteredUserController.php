<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Cookie;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        
        $request->validate([
            'acepta_terminos' => ['required', 'boolean', 'accepted'],
            'acepta_correos' => ['required', 'boolean', 'accepted'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',
            'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'acepta_terminos.required' => 'Debes aceptar los términos y condiciones.',
            'acepta_terminos.boolean' => 'El campo debe ser un valor booleano.',
            'acepta_terminos.accepted' => 'Debes aceptar los términos y condiciones.',
            'acepta_correos.required' => 'Debes aceptar el envio de correos.',
            'acepta_correos.boolean' => 'El campo debe ser un valor booleano.',
            'acepta_correos.accepted' => 'Debes aceptar el envio de correos.',
        ]);
        
       // dd($request);
        $user = User::create([
            'name' => $request->name,
            'username' => Str::slug($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'acepta_terminos' => 1,
            'acepta_correos' => 1
        ]);


        Cookie::queue('cookiesAceptadas', 'true');
        
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
