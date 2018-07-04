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

use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/notify-approval',function(){
    \Illuminate\Support\Facades\Notification::send(\App\User::all(),new \App\Notifications\ApprovalNotification('approval!'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post',function(){
    return view('post');
});
Route::post('/post',function(){
    $title = Request::input('title');
    \App\Article::create(['title'=>$title,'user_id'=>Auth::user()->id,'status'=>0]);
    return back();
})->name('post');
