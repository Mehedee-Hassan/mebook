<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 23-Aug-17
 * Time: 9:40 PM
 */


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller{


    public function getDashBoard(){
        $posts = Post::orderBy('created_at','desc')->get();

        return view('dashboard',['posts'=>$posts]);
    }

    public function postCreatePost(Request $request){

        $this->validate($request,[
            'new-post'=>'required|max:2000'
        ]);

        $post = new Post();
        $post->body = $request['new-post'];

        $message = 'There was an error!!';
        $flag = 'failed';
        if($request->user()->posts()->save($post)){
            $message = 'Post successfully created';
            $flag='success';
        }

        return redirect()->route('dashboard')->with(['message'=>$message, 'flag'=>$flag]);
    }


    public function postDeletePost($post_id)
    {

        $post = Post::where('id', $post_id)->first();

        if (Auth::user() == $post->user){
            $post->delete();
        }

        return redirect()->route('dashboard')->with(['message' =>'successfully delete!!']);
    }


    public function postUpdatePost(Request $request){

        $this->validate($request,[
           'body' => 'required'
        ]);

        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();

        return response()->json(['message' => $request['body'] , 'post_id'=>$request['postId'] ],200);

    }


    public function postLogout(){
        Auth::logout();
        return redirect()->route('dashboard')->with(['message' =>'Your friends are waiting ..']);

    }

    public function getAcctount(){
        return view('account');
    }

}