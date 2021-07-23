<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable  implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * パスワード再設定メールの送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }
    
    
    // Foodsテーブルとの関係
    public function foods() {
        
        return $this->hasMany(Food::class);
        
    }
    
    public function loadRerationshipCounts() {
        
        $this->loadCount(['foods']);
    }
    
    
    // Foodテーブルから保存場所毎のデータを配列として返す。
    public function foodstuff($id) {                        // storingsテーブルのidを引数として持っている
        
        $result = $this->foods()
                    ->whereNull('deleted_at')
                    ->where('status',1)                     // 冷蔵庫に登録済を表す。
                    ->where('storing_id', $id)              // 保存されている場所（引数）
                    ->orderBy('freshness_date', 'ASC')
                    ->paginate(10);                             // ここで受け取っている
                    // dd($result);
         return $result;
        
    }
    
    // Foodテーブルから保存場所毎のデータを配列として返す。
    public function foodOnDesk() {                        // storingsテーブルのidを引数として持っている
        
        $result = $this->foods()
                    ->whereNull('deleted_at')
                    ->where('status',1)                     // 冷蔵庫に登録済を表す。
                    ->orderBy('freshness_date', 'ASC')
                    ->paginate(10);                                // ここで受け取っている
                    
                    
         return $result;
        
    }
    
    public function storeToRefrigerator(Request $request) {
        
        
        $food = new Food;
        $food->user_id = $request->user_id;
        $food->category_id = $request->category_id;
        $food->storing_id = $request->storing_id;
        $food->name = $request->name;
        $food->amount = $request->amount;
        $food->freshness_date = $request->freshness_date;
        $food->note = $request->note;
        $food->status = $request->staus;
        $food->save();
        
        return back();
        
    }
    
    public function foodOneRecord($id) {
        
                $result = $this->foods()
                    ->whereNull('deleted_at')
                    ->where('id',$id)                     // idで検索
                    ->get();
                    
         return $result;
        
    }
    
    
    
    
    
    
    
    
    
    
    
}
