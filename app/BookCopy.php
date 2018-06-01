<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    //
    protected $table = 'bookcopies';

    protected $fillable = ['status', 'book_id'];

    public function book(){
        return $this->belongsTo('App\Book', 'book_id', 'id');
    }

    public function reservations(){
        return $this->hasMany('App\Reservation', 'book_copy_id', 'id');
    }
}
