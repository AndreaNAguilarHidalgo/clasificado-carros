<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = [
        'titulo', 'año', 'total_puertas', 'precio', 'kilometraje', 'descripcion', 'carro_id', 'condicion_id', 'combustible_id'
    ];

     // Obtener la información del usuario vía FK
     public function autor()
     {
         return $this->belongsTo(User::class, 'user_id');
     }

     //Obtener información del tipo de carro
     public function tipoCarro(){
         return $this->belongsTo(TipoCarros::class, 'carro_id');
     }

     // Obtener información del tipo de combustible que usa el auto
     public function tipoCombustible()
     {
         return $this->belongsTo(Combustible::class, 'combustible_id');
     }

     //Obtener información del estado del auto
     public function condicionCarro()
     {
         return $this->belongsTo(Condicion::class, 'condicion_id');
     }

     //Obtener información del Municipio donde se encuentra el automóvil
     public function municipioCarro()
     {
         return $this->belongsTo(Estado::class, 'municipio_id');
     }
}
