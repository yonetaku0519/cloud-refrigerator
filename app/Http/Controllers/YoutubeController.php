<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallYoutubeApi;

class YouTubeController extends Controller
{
    public function index(Request $request)
    {
        $t = new CallYoutubeApi();
        $serachList = $t->serachList(""." レシピ");
        foreach ($serachList as $result) {
          $videosList = $t->videosList($result->id->videoId);
          $embed = "https://www.youtube.com/embed/" . $videosList[0]['id'];
          $array[] = array($embed, $videosList[0]['snippet'],$videosList[0]['statistics']);
        }
        return view('youtube', ['youtube' => $array]);
    }
}