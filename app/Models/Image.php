<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
    protected $fillable = [
        'image',
        'url',
        'descripcion',
        'inmueble_id'
    ];

    public function inmueble()
	 {
	   return $this->belongsTo(Inmueble::class);
	 }

    
}
