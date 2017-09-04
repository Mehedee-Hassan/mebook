<?php
/**
 * Created by PhpStorm.
 * User: mhr
 * Date: 23-Aug-17
 * Time: 9:40 PM
 */


namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

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


        $this->publishNotification(Auth::user()->id);

        return redirect()->route('dashboard')->with(['message'=>$message, 'flag'=>$flag]);
    }



    public function publishNotification($userid){

        $data = [
            'event' => 'NewPost',
            'data' => [
                'user' => $userid
            ]
        ];

        Redis::publish('test-channel', json_encode($data));

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


    /**
     * @param Request $request
     */
    public function incrementLike(Request $request){
        $like = Like::where('post_id',$request['postId'])->first();
//        Log::warning($like);

        if ($like) {
            Log::warning($request['postId']);
            $numOfLikes = $like->likes;

            $list = explode(',',$like->user_id_list);
//
            Log::warning("list explode:");
            Log::warning($list);
            Log::warning('list = '.$like->user_id_list);
            Log::warning('likes = '.$like->likes);

            if (!in_array($request['userId'],$list)){
                $like->user_id_list = $like->user_id_list.','.$request['userId'];
                $numOfLikes +=1;
                Log::warning('added = '.$like->user_id_list );

            }
            else{
                $numOfLikes -=1;

                unset($list[array_search($request['userId'],$list)]);
                Log::warning("deleted list:");
                Log::warning($list);

                $newlist = implode(',',$list);
                $like->user_id_list = $newlist;
                Log::warning($newlist);

                Log::warning('deleted = '.$like->user_id_list );

            }
            $like->likes = $numOfLikes;
//
//
            $like->update();


        }
        else{
            Log::warning("no like".$request['userId']." p= ".$request['postId']);

            $like =  new Like();
            $like->user_id_list = $request['userId'];
            $like->post_id = $request['postId'];
            $like->likes = 1;
            $like->save();
        }

        return response()->json(['likes' => $like->likes , 'post_id'=>$request['postId'] ],200);

    }
}