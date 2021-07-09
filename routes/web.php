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

Auth::routes(['verify' => true]);


Route::get('profile', function () {
    
    Route::group(['prefix' => 'users/{id}'],function() {
        
        Route::get('foods','FoodsContlloer',['only' => ['index']]);
        
        
        
    });
    
    
})->middleware('verified');


// メインページ（ユーザーの冷蔵庫を表示し、レシピを提案するページ）
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');












