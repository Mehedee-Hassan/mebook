<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 21-Aug-17
 * Time: 9:11 PM
 */
namespace App\Http\Controllers;

//use LRedis;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;


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



//    chat box
    public function getChatBox(){
        $users = User::all();
        return view('chatbox')->with('users',$users);
    }


    public function getMessage(Request $request){
        $fromuser = Auth::user();


        Log::warning('|'.$request['userId'].'| |'.$fromuser->id.'|');

        $messagelist = \App\Message::whereRaw('(to_user_id = ? and from_user_id = ?) or (to_user_id= ? and from_user_id = ?)'
            ,array( $request['userId']  ,   $fromuser->id   ,   $fromuser->id   ,   $request['userId']))
            ->orderby('created_at')->get()->toarray();

        $messagearray = array();
        Log::warning($messagelist);

        foreach($messagelist as $melement){

            Log::warning($melement);


            $messagearrayt[]= array(
                "id" => $melement['id'],
                "from_user_id" => $melement['from_user_id'],
                "message" => $melement['message'],
                "to_user_id" => $melement['to_user_id'],
            );
        }

        Log::warning("processed======");
        Log::warning($messagelist);

        return response()->json(['messages' => json_encode($messagelist) ],200);

        }

    public function sendMessage(Request $request){

        Log::warning($request['message']);

        $message = new Message();

        $message->message = $request['message'];

        $message->from_user_id = $request['fromUserId'];
        $message->to_user_id = $request['toUserId'];

        $message->save();




        return response()->json(['message' => $request['message']],200);

    }

    public function sendMessage2(Request $request){


        Log::warning($request['fromUserId']);

        $message = new Message();

        $message->message = $request['message'];

        $message->from_user_id = $request['fromUserId'];
        $message->to_user_id = $request['toUserId'];

        $message->save();

        // In Episode 4, we'll use Laravel's event broadcasting.

        $data = [
            'event' => 'ChatBox',
            'data' => [
                'user' => $request['fromUserId'],
                'message' => $request['message']
            ]
        ];

        Redis::publish('test-channel', json_encode($data));


        return response()->json(['message' => $request['message']],200);

    }


 public function globalPostNotification(Request $request){


        Log::warning($request['fromUserId']);

        $message = new Message();

        $message->message = $request['message'];

        $message->from_user_id = $request['fromUserId'];
        $message->to_user_id = $request['toUserId'];

        $message->save();

        // In Episode 4, we'll use Laravel's event broadcasting.

        $data = [
            'event' => 'ChatBox',
            'data' => [
                'user' => $request['fromUserId'],
                'message' => $request['message']
            ]
        ];

        Redis::publish('test-channel', json_encode($data));


        return response()->json(['message' => $request['message']],200);

    }




    public function testChat(){

        return view('test');
    }
    public  function  fetchMessage2(){

    }


}