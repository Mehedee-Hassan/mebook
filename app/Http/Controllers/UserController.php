<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 21-Aug-17
 * Time: 9:11 PM
 */
namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public function postSignUp(Request $request){

        $email = $request['email'];
        $name = $request['Name'];
        $pass = bcrypt($request['Password']);



        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $pass;


        $user->save();


        return redirect()->back();

    }

    public function postSignIn(Request $request){

    }
}