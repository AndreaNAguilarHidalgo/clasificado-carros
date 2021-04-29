<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['id', 'municipio', 'estado_id'];


    public function estados(){
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
