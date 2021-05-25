<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['id', 'marca'];

    // Relación 1:n
    public function modelos(){

        return $this->hasMany(Modelo::class);
    }

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }
}
