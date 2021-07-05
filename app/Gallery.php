<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['file', 'path'];

    public function posts()
    {
        //Relación n - 1 
        return $this->belongsTo(Posts::class);
    }
}
