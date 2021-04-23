<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $fillable = [
        'titulo', 'año', 'total_puertas', 'precio', 'kilometraje', 'descripcion'
    ];

     // Obtener la información del usuario vía FK
     public function autor()
     {
         return $this->belongsTo(User::class, 'user_id');
     }
}
