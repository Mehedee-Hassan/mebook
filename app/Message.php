<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
//    protected $table= 'messages';
//
    public function users(){
        return $this->belongsTo('App\User');
    }

}
