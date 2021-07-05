<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['name', 'email','images'];

    public function imgs()
    {
        // Relación 1 - n
        return $this->hasMany(Gallery::class);
    }
}
