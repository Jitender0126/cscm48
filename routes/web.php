<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/admin/user', function () {
//     return view('admin.users.index');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/comment/{post}','CommentController@store')->name('comment.store');

Route::group(['namespace' => 'Admin', 
            'prefix' => 'admin','as'=>'admin.',
            'middleware' => ['auth','admin']], function() {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('profile', 'DashboardController@showprofile')->name('profile');
        Route::resource('user','UserController')->except(['create','show','edit','store']);
        Route::resource('category','CategoryController')->except(['create','show','edit']);
        Route::resource('post','PostController');
});


Route::group(['namespace' => 'User', 
            'prefix' => 'user','as'=>'user.',
            'middleware' => ['auth','user']], function() {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('post','PostController');
        Route::resource('category','CategoryController')->except(['create','show','edit']);
});

