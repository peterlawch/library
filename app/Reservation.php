<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = 'reservations';

    protected $fillable = ['date', 'book_copy_id', 'member_id', 'dueDate', 'returnStatus', 'returnDate', 'fine'];

    protected $dates = ['deleted_at', 'dueDate', 'date', 'returnDate'];

    public function member(){
        return $this->belongsTo('App\User', 'member_id', 'id');
    }
}
