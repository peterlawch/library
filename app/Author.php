<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table = 'authors';

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
