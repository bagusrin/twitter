<?php
namespace Bagusrin\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;

class Client{

    private $client;
    
    public function __construct(TwitterOAuth $client){
        $this->client = $client;
    }

    public function getClient(){
        return $this->client;
    }

    public function getTimeline(int $count = 25){
        
        $param = ['count' => $count];
        
        $ret = $this->client->get('statuses/home_timeline', $param);
        return $ret;
    }

    public function searchTweets(string $search, string $type, int $count = 25){
        
        $param = ['q' => $search, 'result_type' => $type, 'count' => $count, 'lang' => 'id', 'tweet_mode' => 'extended'];
        
        $ret = $this->client->get('search/tweets', $param);
        return $ret;
    }

    public function postStatus(string $message, array $mediaPaths = []){
        
        $media_ids = [];
        foreach ($mediaPaths as $mediaPath) {
            $media = $this->client->upload('media/upload', ['media' => $mediaPath]);
            $media_ids[] = $media->media_id_string;
        }

        $parameters = [
            'status' => $message,
            'media_ids' => implode(',', $media_ids),
        ];

        $ret = $this->client->post('statuses/update', $parameters);
        return $ret;
    }
}
