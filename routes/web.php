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
})->middleware(['auth']);

Route::get('/notify-approval',function(){
    \Illuminate\Support\Facades\Notification::send(\App\User::all(),new \App\Notifications\ApprovalNotification('approval!'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post',function(){
    return view('post');
})->middleware(['auth']);
Route::post('/post',function(){
    $title = Request::input('title');
    \App\Article::create(['title'=>$title,'user_id'=>Auth::user()->id,'status'=>0]);
    return back();
})->name('post')->middleware(['auth']);

Route::get('/approval',function(){
    $articles = \App\Article::where('status',0)->orderBy('created_at','desc')->get();
    return view('approval')->with(compact('articles'));
})->middleware(['auth']);
Route::post('/approval',function(){
    $id= Request::input('id');
    \App\Article::where('id',$id)->first()->update(['status'=>1]);
    return back();
})->name('approval')->middleware(['auth']);

Route::post('/approval/list',function(){
    $user = Auth::user();
    $articles = \App\Article::where('status',0)
        ->where('user_id',$user->id)->orderBy('created_at','desc')->get();
    return response()->json($articles->toArray());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
