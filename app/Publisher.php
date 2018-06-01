<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publishers';

    public function posts()
    {
        return $this->hasMany('App/Post');
    }
}
