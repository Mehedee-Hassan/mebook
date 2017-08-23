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
use Illuminate\Support\Facades\Auth;

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


        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function postSignIn(Request $request){

        echo 'here';

        if (Auth::attempt(['email'=> $request['email'] ,'password'=> $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();

    }

    public function getDashBoard(){
        return view('dashboard');
    }
}