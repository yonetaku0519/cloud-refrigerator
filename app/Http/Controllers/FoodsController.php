<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Vender\CallYoutubeApi;

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
            // 賞味期限が2日後までの食材の取得
            $foods = $user->foodAlert();
            // dd(count($foods));
            if(count($foods) > 0) {
                $num = random_int(0,count($foods) - 1);     // 賞味期限が2日後までの食材がない場合落ちるので、バリデーションしています    
                
                // レシピ検索
                $t = new CallYoutubeApi();
                $serachList = $t->serachList($foods[$num]->name." レシピ");
                // $array[] = array();
                foreach ($serachList as $result) {
                  $videosList = $t->videosList($result->id->videoId);
                  $embed = "https://www.youtube.com/embed/" . $videosList[0]['id'];
                  $array = array($embed, $videosList[0]['snippet'],$videosList[0]['statistics']);
                }
                // dd([$array],$foods[$num]->name);
                $data = [
                    'user' => $user,
                    'foods' => $foods,
                    'movie' => ['youtube' => $array],
                    'name' => $foods[$num]->name,
                ];
                // dd($data);
            } else {
                $array[] = array();             // 賞味期限が近いものがなければ、youtubeを空で返す。
                $data = [
                    'user' => $user,
                    'foods' => $foods,
                    'movie' => ['youtube' => $array],
                    'name' => "なし",
                ];
                
            }
            // デバック用
            //  dd($data);
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
            $user->loadRerationshipCounts();
            // 冷蔵庫に登録済みの食材を取ってくる
            $foods = $user->foodOnDesk();
            // 保存場所のIDを正式な名前に変換する
            for($i = 0;$i < count($foods); $i++) {
                $foodArray = $foods[$i];
                $storingArray = $storings[$foodArray['storing_id'] - 1];        // storingsテーブルをミスして、1からのidが当たっているので、1引く必要がある
                $foodArray['storing_id'] = $storingArray['name'];
            }
            
            $data = [
                'user' => $user,
                'foods' => $foods,
                
            ];
        }
        // dd($data);
        return view('display_on_desk/display', $data);
    } 
    
    public function indexDetails($id) {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $foods = $user->foodstuff($id);
            
            $data = [
                'user' => $user,
                'foods' => $foods,
                'id' => $id,
            ];
            // デバック用
            // dd($data);
        }
        
        return view('food_register/showDetails', $data);
    }
    
    public function foodRegister(Request $request) {
        
        $request->validate([
                'name' => 'required|max:255',
                'amount' => 'required|max:255',
                'freshness_date' => 'required',
                'note' => 'max:255'
        ]);
        
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // dd($user);
            $food = new Food;
            $food->user_id = $user->id;
            $food->category_id = 1;                     // categoriesテーブルは今後の拡張機能用なので、2021年7月時点では規定値の１で登録しておく
            $food->storing_id = $request->storing_id;
            $food->name = $request->name;
            $food->amount = $request->amount;
            $food->freshness_date = $request->freshness_date;
            $food->note = $request->note;
            $food->status = 1;                  // 冷蔵庫に登録されていることを表す。
            $food->save();
        
        }
        return back();
        
    }
    
    public function updateTable($id) {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $foods= $user->foodstuff($id);
            $data = [
                'user' => $user,
                'foods' => $foods,
                'id' => $id,
            ];
            // デバック用
            // dd($storings);
        }
        return view('food_register/update', $data);
    }
    
    public function updateEdit($id) {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // 引数のidを使って、更新する食材のレコードを取得する
            $food = $user->foodOneRecord($id);
            
            // dd($food);
            
            $data = [
                'user' => $user,
                'food' => $food,
                'id' => $id,
                'storing_id' => $food[0]->storing_id,
                
            ];
            // デバック用
            // dd($food[0]->storing_id);
        }
        return view('food_register/updateEdit', $data);
        
    }
    
    public function updateRun(Request $request) {
        
        $request->validate([
                'name' => 'required|max:255',
                'amount' => 'required|max:255',
                'freshness_date' => 'required',
                'note' => 'max:255'
        ]);
        
         if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $food = Food::findOrFail($request->id); // 更新対象の食材レコードの取得
        
            $food->user_id = $user->id;
            $food->category_id = 1;
            $food->storing_id = $request->storing_id;
            $food->name = $request->name;
            $food->amount = $request->amount;
            $food->freshness_date = $request->freshness_date;
            $food->note = $request->note;
            $food->status = 1;
            $food->save();
        
        }
        return redirect()->route('food.update',['id' => $request->storing_id]);
        
    }
    
    public function destroy(Request $request) {
        // idの値で食材を検索して取得
        $food = Food::findOrFail($request->id);
        // 食材を削除
        $food->delete();
        // 前のページへ戻る
        return redirect()->route('food.update',['id' => $request->storing_id]);    
    }
    
    
    public function showShoppingList() {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // Storingsテーブル情報の取得
            $storings = Storing::all();
            $foods = $user->shoppingList();
            
            foreach($foods as $food) {
                $id = $food->storing_id;
                $name = Storing::find($id)->name;
                $food->storing_id = $name;
            }
            
            $data = [
                'user' => $user,
                'foods' => $foods,
            ];
            // デバック用
            //   dd($data);
        }
        return view('shopping_list/register_shopping_list', $data);
        
    }
    
    public function shoppingListRegister(Request $request) {
        $request->validate([
                'name' => 'required|max:255',
                'amount' => 'required|max:255',
                'note' => 'max:255'
        ]);
        
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // dd($user);
            $food = new Food;
            $food->user_id = $user->id;
            $food->category_id = 1;                     // categoriesテーブルは今後の拡張機能用なので、2021年7月時点では規定値の１で登録しておく
            $food->storing_id = $request->storing_id;
            $food->name = $request->name;
            $food->amount = $request->amount;
            $food->note = $request->note;
            $food->status = 2;                          // 買い物リストに登録されていることを表す。
            $food->save();
        
        }
        return back();
    }
    
    public function shoppingListCheck() {
        
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // Storingsテーブル情報の取得
            $storings = Storing::all();
            $foods = $user->shoppingList();
            
            foreach($foods as $food) {
                $id = $food->storing_id;
                $name = Storing::find($id)->name;
                $food->storing_id = $name;
            }
            
            $data = [
                'user' => $user,
                'foods' => $foods,
            ];
            // デバック用
            //   dd($data);
        }
        return view('shopping_list/check_shopping_list', $data);
        
        
    }
    
    public function shoppingListUpdateEdit($id) {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // 引数のidを使って、更新する食材のレコードを取得する
            $food = $user->foodOneRecord($id);
            
            
            $data = [
                'user' => $user,
                'food' => $food,
                'id' => $id,
                'storing_id' => $food[0]->storing_id,
                
            ];
            // デバック用
            // dd($food);
        }
        return view('shopping_list/update_shopping_list', $data);
    }
    
    public function freshnessDateRegisterEdit($id) {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // 引数のidを使って、更新する食材のレコードを取得する
            $food = $user->foodOneRecord($id);
            // dd($food);
            
            $data = [
                'user' => $user,
                'food' => $food,
                'id' => $id,
            ];
            // デバック用
            // dd($food);
        }
        return view('shopping_list/freshness_date_register', $data);
    }
    
    public function shoppingListUpdateRun(Request $request) {
        $request->validate([
                'name' => 'required|max:255',
                'amount' => 'required|max:255',
                'note' => 'max:255',
        ]);
        
         if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $food = Food::findOrFail($request->id); // 更新対象の食材レコードの取得
        
            $food->user_id = $user->id;
            $food->category_id = 1;
            $food->storing_id = $request->storing_id;
            $food->name = $request->name;
            $food->amount = $request->amount;
            $food->freshness_date = null;
            $food->note = $request->note;
            $food->status = 2;                        // 買い物リストに登録されていることを表す。
            $food->save();
        
        }
        return redirect()->route('check_shopping_list');
    }
    
    public function shoppingBasketRegister(Request $request) {
        $request->validate([
                'freshness_date' => 'required',
        ]);
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $food = Food::findOrFail($request->id); // 更新対象の食材レコードの取得
            $food->freshness_date = $request->freshness_date;
            $food->status = 3;                        // 買い物カゴに登録されていることを表す。
            // dd($food);
            $food->save();
        
        }
        
        return redirect()->route('check_shopping_list');
        
    }
    
    public function shoppingListDestroy(Request $request) {
        // idの値で食材を検索して取得
        $food = Food::findOrFail($request->id);
        // 食材を削除
        $food->delete();
        // 前のページへ戻る
        return redirect()->route('check_shopping_list'); 
    }
    
    public function shoppingComplete() {
        
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            $foods = $user->foodInBasket();             // status=3の食材を全て取得
            // dd($foods);
            foreach($foods as $food) {
                
                $food->status = 1;
                $food->save();    
            }
            
            return redirect()->route('check_shopping_list');
        
        }
    }
    
    
    
    
    
}
