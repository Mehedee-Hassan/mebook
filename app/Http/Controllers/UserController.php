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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller{

    public function postSignUp(Request $request){


        $this->validate($request, [
            'email'=>'required|email|unique:users',
            'name'=>'required|max:120',
            'password'=>'required|min:4',
        ]);

        $email = $request['email'];
        $name = $request['name'];
        $pass = bcrypt($request['password']);



        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $pass;


        $user->save();


        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function postSignIn(Request $request){

        $this->validate($request, [
            'email'=>'required',
            'password'=>'required'
        ]);

        if (Auth::attempt(['email'=> $request['email'] ,'password'=> $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();

    }

    public function getUserAccount(){

        $user = Auth::user();
        return view('account',['user'=>$user]);

//        return redirect()->route('account')->with(['user'=>$user]);
    }

    public function postUpdateUserAvatar(Request $request){

        $this->validate($request,[
            'avatar'=>'required'
        ]);

        $user = Auth::user();
        $file = $request->file('avatar');

        $filename = $user->name."-".$user->id;

        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));

            $user->avatar = $filename;
            $user->update();
        }


        return redirect()->route('user.account');
    }


    public function getImageUpdate(){

        $user = Auth::user();
        $filename = $user->avatar;


        $file = Storage::disk('local')->get($filename);


        return new Response($file, 200);
    }


}