<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
//    protected $table= 'likes';

    public function posts(){
        return $this->belongsTo('App\Post');
    }
//
//    public function users(){//
//        return $this->belongsTo('App\User');//
//    }
}
