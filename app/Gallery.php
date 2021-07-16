<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $fillable = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
