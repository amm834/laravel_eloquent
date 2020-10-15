<?php

use App\User;
use App\Post;
use App\City;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create',function (){
  $pass = Hash::make('123');
  User::create(['name'=>'waifer','email'=>'waifer@gmail.com','password'=>$pass]);
});

Route::get('/post/create',function (){
  Post::create(['user_id'=>3,'title'=>'5th One','content'=>'This is Fith One']);
});

Route::get('/all',function (){
  $posts = Post::all();
  foreach ($posts as $post){
    echo $post->title.'<br/>';
    echo $post->content.'<hr>';
  }
});

Route::get('/show/{id}',function ($id){
  $post = Post::find($id);
  echo $post->title;
});

Route::get('/show/{id}/post',function ($id){
  $post = Post::find($id);
 echo $post->user->name;
});

Route::get('/show/{uid}/posts',function ($uid){
  $user = User::where('id',$uid)->firstOrFail();
  foreach ($user->posts as $post){
    echo $post->title.'<br>';
  }
});

Route::get('/show/{uid}/city',function ($uid){
  $ucity = User::where('id',$uid)->firstOrFail();
  echo $ucity->city->name;
});

Route::get('/user/{id}/rank',function ($id){
  $user = User::find($id);
  foreach ($user->roles as $rk){
    echo $rk->rank; 
  }
});

Route::get('/city/{id}/user/post',function ($id){
  $city = City::find($id);
   dd($city->posts);
});