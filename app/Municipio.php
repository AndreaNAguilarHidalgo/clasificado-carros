<?php

namespace App;

use App\Policies\AnuncioPolicy;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['id', 'municipio', 'estado_id'];


    public function estados(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function anuncios(){
        return $this->hasMany(Anuncio::class);
    }
}
