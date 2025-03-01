<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\legal\TerminosController;
use App\Http\Controllers\legal\PoliticasController;


Route::middleware('auth')->group(function () {
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
    // rutas para InmuebleController
    Route::get('/inmuebles/create', [InmuebleController::class, 'create'])->name('inmuebles.create');
    Route::get('/inmuebles/{inmueble}/edit', [InmuebleController::class, 'edit'])->name('inmuebles.edit');
    Route::get('/inmuebles/{inmueble}/agregar-imagen', [InmuebleController::class, 'agregarImagen'])->name('inmuebles.agregar-imagen');
    
    Route::delete('/inmuebles/delete/{inmueble}', [InmuebleController::class, 'destroy'])->name('inmuebles.destroy');
    
    //rutas para ImageController
    Route::post('/inmuebles/agregar-imagen', [ImageController::class, 'store'])->name('image.store');
    
    //notificaciones
    Route::get('/notificaciones', NotificacionController::class)->middleware('rol.vendedor')->name('notificaciones');
    
    //rutas para mensajes
    Route::get('/inmuebles/{inmueble}/mensajes', [MensajeController::class, 'show'])->name('notificaciones.mensajes');
    
});


Route::get('/politicas', PoliticasController::class)->name('politicas');
Route::get('/terminos', TerminosController::class)->name('terminos');

Route::get('/', HomeController::class)->name('home');

Route::get('/propiedades', [InmuebleController::class, 'propiedades']);

Route::get('/inmuebles/{inmueble}', [InmuebleController::class, 'show'])->name('inmuebles.show');

Route::get('/inmuebles', [InmuebleController::class, 'index'])->middleware(['auth', 'verified'])->name('inmuebles.index');

Route::get('/categoria',[CategoriaController::class, 'show'] )->name('livewire.categoria');


require __DIR__.'/auth.php';
