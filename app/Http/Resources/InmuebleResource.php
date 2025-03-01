<?php

namespace App\Http\Resources;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InmuebleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return[
        'id'=> $this->id,
        'titulo' => $this->titulo,
        'image' => $this->image,
        'descripcion' => $this->descripcion,
        'habitaciones' => $this->habitaciones,
        'estacionamiento' => $this->estacionamiento,
        'WC' => $this->WC,
        'calle' => $this->calle,
        'lat' => $this->lat,
        'lng' => $this->lng,
        'publicado' => $this->publicado,
        'categoria' => $this->categoria->nombre,
        'categoria_id' => $this->categoria_id,
        'precio' => $this->precio->nombre,
        'precio_id' => $this->precio_id,
        'username' => $this->user->username,
        'cuantosMensajes' => $this->getMensajesCount()
        ];
    }
}
