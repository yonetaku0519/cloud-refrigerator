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
Route::get('/showDetails/{id}','FoodsController@indexDetails')->name('food.showDetails')->middleware('verified');   // 冷蔵庫の中身毎に表示するタブ(初期表示は冷蔵室)
Route::post('hogehoge','FoodsController@foodRegister')->name('food.register')->middleware('verified');         // Modalから冷蔵庫に新規登録するルート
Route::get('/update/{id}','FoodsController@updateTable')->name('food.update')->middleware('verified');
Route::get('/updateEdit/{id}','FoodsController@updateEdit')->name('food.updateEdit')->middleware('verified');               // Updateするためのフォームにデータを投げる
Route::post('hoge','FoodsController@updateRun')->name('food.updateRun')->middleware('verified');              // データを更新して、冷蔵庫の更新タブに戻る

Route::post('deleteFood','FoodsController@destroy')->name('food.delete')->middleware('verified');         // 食材のソフトデリート

// 買い物リスト画面
Route::get('register_shopping_list', 'FoodsController@showShoppingList')->name('shopping_list')->middleware('verified');
Route::post('hogehogehoge','FoodsController@shoppingListRegister')->name('shopping_list.register')->middleware('verified');         // Modalから買い物リストに新規登録するルート
Route::get('check_shopping_list', 'FoodsController@shoppingListCheck')->name('check_shopping_list')->middleware('verified');
Route::get('/update_shopping_list/{id}','FoodsController@shoppingListUpdateEdit')->name('update_shopping_list')->middleware('verified');               // Updateするためのフォームにデータを投げる
Route::get('/freshness_date_register/{id}','FoodsController@freshnessDateRegisterEdit')->name('freshness_date_register')->middleware('verified');               // 賞味期限を登録するためのフォームにデータを投げる
Route::post('hogehogehogehoge','FoodsController@shoppingListUpdateRun')->name('updateRun_shopping_list')->middleware('verified');              // データを更新して、冷蔵庫の更新タブに戻る
Route::post('hogehogehogehogehoge','FoodsController@shoppingBasketRegister')->name('shopping_basket.register')->middleware('verified');         // Modalから買い物リストに登録済の食材をカゴに入れたことにする
Route::post('delete','FoodsController@shoppingListDestroy')->name('shopping_list.delete')->middleware('verified');         // 食材のソフトデリート
Route::get('shopping_complete', 'FoodsController@shoppingComplete')->name('shopping_complete')->middleware('verified');

// お問い合わせ画面
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact_send', 'PagesController@contact_send')->name('contact_send');


