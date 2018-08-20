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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// one to many polymorphism
// load post with comments
// in order to implement one to many polymorphism
// to use one table can related to more than one model ex: comments can be own by post or video
Route::get('/post/{id}/comments', function($id){
    $post = App\Post::find($id)->comments()->get();
    return $post;
});

// load video with related comments
Route::get('/video/{id}/comments', function ($id) {
    $video = App\Video::findOrFail($id)->comments()->get();
    return $video;
});

Route::get('/comment/{id}', function ($id) {
    $comment = App\Comment::findOrFail($id);
    // load only related commentable
    $commentable = $comment->commentable; 
    return $comment;
});

// many to many
Route::get('/post/favorites', function(){
    $post = App\Post::first();
    $user = App\User::first();

    // the first user favorited the first post in order to implement many to many relationship
    // one user can favorite many post, one post can be favorite by many user and so on.
    // the method can be attach and deatach or toggle. (with toggle you can attach or detach once)
    $user->favorites()->toggle($post);
});

// many to many polymorphism
// adding tag to a post, in order to impletement many to many polymorphism relationship
// one post can have many tags
// one tag can be ralated to many posts
Route::get('/post/tags', function () {
    $post = App\Post::first();
    $tag = App\Tag::whereIn('id',[1,2,3])->get();

    $post->tags()->toggle($tag);

});