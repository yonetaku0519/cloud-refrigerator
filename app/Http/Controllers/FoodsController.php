<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Food;
use App\User;
use App\Storing;

class FoodsController extends Controller
{
    // 保存場所毎の二次元配列で返す。
    public function index() {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // Storingsテーブル情報の取得
            $storings = Storing::all();
    
            foreach($storings as $storing) {
                $foods[$storing->id] = $user->foodstuff($storing->id);
            }
            $data = [
                'user' => $user,
                'foods' => $foods,
            ];
            // デバック用
            // dd($data);
        }
        return view('home', $data);
    }
    
    // 全ての食材を賞味期限順に渡す
    public function display() {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // Storingsテーブル情報の取得
            $storings = Storing::all();
            // 冷蔵庫に登録済みの食材を取ってくる
            $foods = $user->foodOnDesk();
            // 保存場所のIDを正式な名前に変換する
            for($i = 0;$i < count($foods); $i++) {
                $foodArray = $foods[$i];
                $storingArray = $storings[$foodArray['storing_id']];
                $foodArray['storing_id'] = $storingArray['name'];
            }
            
            
            // apiの叩き方
            // php modリクエスト＜＝カールでリクエスト（https://note.com/kawa1228/n/n55b3cfcb543c）
            // がずる？httpsリクエスト＜＝楽ちん（コンポーズでライブラリを増やす）（https://yaba-blog.com/laravel-call-api/）
            
            
            
            $data = [
                'user' => $user,
                'foods' => $foods,
                
            ];
        }
        //dd($data);
        return view('display_on_desk/display', $data);
    } 
    
}
