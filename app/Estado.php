<?php

namespace App;
use App\Municipio;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    // Relación 1:n
    public function estados(){

        return $this->hasMany(Municipio::class);
    }
}
