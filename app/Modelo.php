<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = ['id', 'modelo', 'marca_id'];

    public function marcas(){
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }
}
