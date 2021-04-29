<?php

namespace App;
use App\Estado;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public function municipios(){
        return $this->belongsTo(Estado::class);
    }
}
