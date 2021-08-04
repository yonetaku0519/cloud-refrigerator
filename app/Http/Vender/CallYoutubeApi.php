<?php

namespace App\Http\Vender;

use Google_Client;
use Google_Service_YouTube;

class CallYoutubeApi
{

    private $key;
    private $client;
    private $youtube;
    
    public function __construct()
    {
        $this->client = new Google_Client();
        $this->key = config('app.googleApiKey');
        $this->client->setDeveloperKey($this->key);
        $this->youtube = new Google_Service_YouTube($this->client);
    }
    
    /**
     * /v3/searchを呼び出す
     *
     * @param string $serachWord
     * @return array
     */
    public function serachList(String $searchWord)
    {
        $r = $this->youtube->search->listSearch('id', array(
          'q' => $searchWord,
          'maxResults' => 1,
          'order' => 'viewCount',
        ));

        return $r->items;
    }

    /**
     * /v3/videosを呼び出す
     *
     * @param string $id
     * @return array
     */
    public function videosList(String $id)
    {
        $r = $this->youtube->videos->listVideos('statistics,snippet', array(
          'id' => $id,
        ));
        
        return $r->items;
    }
}