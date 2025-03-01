<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    /** @use HasFactory<\Database\Factories\MensajeFactory> */
    use HasFactory;
    protected $fillable = [
        'mensaje',
        'user_id',
        'inmueble_id'
    ];

    public function inmueble()
    {
      return $this->belongsTo(Inmueble::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class)->select(['id','name', 'email', 'username', 'roll']);
    }
}
