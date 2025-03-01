<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    /** @use HasFactory<\Database\Factories\InmuebleFactory> */
    use HasFactory;

    protected $fillable = [

        'titulo',
        'image',
        'descripcion',
        'habitaciones',
        'estacionamiento',
        'WC',
        'calle',
        'lat',
        'lng',
        'publicado',
        'categoria_id',
        'precio_id',
        'user_id',
    ];



    public function precio()
    {
        return $this->belongsTo(Precio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id','name', 'email', 'username', 'roll']);
    }

    public function images()
    {
        return $this->hasMany(Image::class)->select(['id', 'image', 'url', 'descripcion']);
    }

    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

    public function getMensajesCount()
	{
    	return $this->mensajes()->count();
	}

    public function vendedor()
    {
        return $this->belongsTo(User::class, "user_id")->select(['id','name', 'email', 'username', 'roll']);
    }
   
}
