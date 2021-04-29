<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['id', 'estado'];

    
    // Relación 1:n
    public function municipios(){

        return $this->belongsTo(Municipio::class);
    }
}
