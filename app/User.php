<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
//    protected $table= 'users';
    use \Illuminate\Auth\Authenticatable;


    public function posts(){
        return $this->hasMany('App\Post');
    }


    public function messages(){
        return $this->hasMany('App\Message');
    }


}
