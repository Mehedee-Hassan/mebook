<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['web']], function(){

    Route::get('/', function () {
        return view('welcome');
    })->name('home');


    Route::get('/dashboard', [
        'uses' => 'PostController@getDashBoard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::post('/signup',[
        'uses'=>'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin',[
        'uses'=>'UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::post('/createpost',[
        'uses'=>'PostController@postCreatePost',
        'as'=>'post.create'
    ]);

    Route::get('/logout',[
        'uses'=>'PostController@postLogout',
        'as'=>'logout'
    ]);

    Route::post('/updatepost',
//        function(\Illuminate\Http\Request $request){
//        return response()->json(['message' => $request['body'].' '.$request['postId']]);}

         [
             'uses' => 'PostController@postUpdatePost',
             'middleware' => 'auth'
         ]
    )->name('post.update');

    Route::get('/deletepost/{post_id}',[
        'uses'=>'PostController@postDeletePost',
        'as'=>'post.delete',
        'middleware' => 'auth'
    ]);


    Route::get('/account',[
        'uses'=>'UserController@getUserAccount',
        'middleware' =>'auth',
        'as' => 'user.account'
    ]);

    Route::get('/imageupdate',[
        'uses'=>'UserController@getImageUpdate',
        'middleware' =>'auth',
        'as' => 'account.image'
    ]);

    Route::post('/updateavatar',[
        'uses'=>'UserController@postUpdateUserAvatar',
        'middleware' =>'auth',
        'as' => 'update.avatar'
    ]);


    Route::post('/incrementlike',[
        'uses'=>'PostController@incrementLike',
        'middleware' =>'auth',
        'as' => 'incr.like'
    ]);

    Route::get('/chatbox',[
        'uses'=>'UserController@getChatBox',
        'middleware' =>'auth',
        'as' => 'chat.box'
    ]);
    Route::post('/message',[
        'uses'=>'UserController@getMessage',
        'middleware' =>'auth',
        'as' => 'user.message'
    ]);

    Route::post('/sendmessage',[
        'uses'=>'UserController@sendMessage',
        'middleware' =>'auth',
        'as' => 'user.message.send'
    ]);


});
