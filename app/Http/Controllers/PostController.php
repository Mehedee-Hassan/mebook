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

class PostController extends Controller{


    public function getDashBoard(){
        $posts = Post::all();

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
}