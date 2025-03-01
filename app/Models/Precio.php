<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    /** @use HasFactory<\Database\Factories\PrecioFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];
    
    public function Inmueble()
    {
        return $this->hasMany(Inmueble::class);
    }


}
