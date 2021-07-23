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
    //ここにまとめて書く
})->middleware('verified');


// メインページ（ユーザーの冷蔵庫を表示し、レシピを提案するページ）
Route::get('/home', 'FoodsController@index')->name('home')->middleware('verified');

// 机に並べる画面
Route::get('/display', 'FoodsController@display')->name('food.display')->middleware('verified');

// 冷蔵庫内のデータ編集画面
Route::get('/showDetails/{id}','FoodsController@indexDetails')->name('food.showDetails')->middleware('verified');;    // 冷蔵庫の中身毎に表示するタブ(初期表示は冷蔵室)




Route::post('hogehoge','FoodsController@foodRegister')->name('food.register')->middleware('verified');;          // Modalから冷蔵庫に新規登録するルート
Route::get('/update/{id}','FoodsController@updateTable')->name('food.update')->middleware('verified');;
Route::get('/updateEdit/{id}','FoodsController@updateEdit')->name('food.updateEdit')->middleware('verified');;               // Updateするためのフォームにデータを投げる
Route::post('hoge','FoodsController@updateRun')->name('food.updateRun')->middleware('verified');;               // データを更新して、冷蔵庫の更新タブに戻る

Route::delete('delete','FoodsController@')->name('food.delete')->middleware('verified');;

// 買い物リスト画面
Route::get('register_shopping_list', 'FoodsController@showList')->name('register.shopping_list');
Route::get('check_shopping_list', 'FoodsController@check')->name('check.shopping_list');







