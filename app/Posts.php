<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['name', 'email'];

    public function images()
    {
        return $this->morphMany('App\Gallery', 'imageable');
    }
}
