<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Vender\CallYoutubeApi;
use Illuminate\Support\Facades\DB;
use App\Food;
use App\User;
use App\Storing;
use App\Movie;

class YoutubeApiBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:RecipeProposal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'レシピ提案処理';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        
        // 全てのユーザーの賞味期限が近い商品を取得する
        $userData = User::all();
        $userId = [];
        
        // ここで稼働しているユーザーのIDをリストで確保する
        for($i = 0; $i < count($userData); $i++) {
            $userId[$i] = $userData[$i]->id;
        }
        
        
        // ユーザーの賞味期限が近い食材を1つだけランダムにとってくる。
        // 賞味期限が近い食材が存在しない場合は、料理系ユーチューバーのおすすめレシピを検索するように組む。
        $youtuber_array = array('リュウジのバズレシピ','谷やん谷崎鷹人','きまぐれクックKimagure Cook','Koh Kentetsu Kitchen','筒井チャンネル','EMOJOIE CUISINE','HidaMari Cooking','kurashiru［クラシル］','カズ飯/Cooking Kazu','【速水もこみち 公式チャンネル】M’s TABLE by Mocomichi Hayami','Chef Ropia料理人の世界','とっくんのYouTubeチャンネル');
        $foodName = [];
        for($i = 0; $i < count($userId); $i++) {
            $user = User::find($userId[$i]);
            $food = $user->freshnessDateNear($userId[$i]);
            $n = count($food);
            if($n > 0) {
                $k = rand(0,$n - 1);
                $foodName[$i] = $food[$k]->name;
            } else {
                $num = rand(0,11);
                $foodName[$i] = $youtuber_array[$num]."　おすすめ";
            }
        }
        
        
        // レシピ検索
        // 検索結果の「動画」「タイトル」を配列で所持
        $movieUrl = [];
        $title = [];
        for($i = 0; $i < count($foodName); $i++ ) {
            $t = new CallYoutubeApi();
            $serachList = $t->serachList($foodName[$i]." レシピ");
            
            foreach ($serachList as $result) {
                $videosList = $t->videosList($result->id->videoId);
                $embed = "https://www.youtube.com/embed/" . $videosList[0]['id'];
                $array = array($embed, $videosList[0]['snippet'],$videosList[0]['statistics']);
                
                $movieUrl[$i] = $array[0];
                $title[$i] = $array[1]->title;
            }
        
        }
        
        var_dump($userId);
        var_dump($foodName);
        var_dump($movieUrl);
        var_dump($title);
        
        // ここからMovieテーブルに登録するコード
        // Delete-Insertを行う
        $movieYesterday = Movie::all();
        if(count($movieYesterday) > 0) {
            Movie::truncate();
        }
        
        
        for($i = 0; $i < count($foodName); $i++) {
            
            $movie = new Movie;
            $movie->user_id = $userId[$i];
            $movie->url = $movieUrl[$i];
            $movie->title = $title[$i];
            $movie->save();
            
        }
        
        
    }
}
