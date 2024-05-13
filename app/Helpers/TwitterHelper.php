<?php

namespace App\Helpers;

use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterHelper
{
    protected $twitter;

    public function __construct()
    {
        $this->twitter = new TwitterOAuth(
            env('TWITTER_CONSUMER_KEY'),
            env('TWITTER_CONSUMER_SECRET'),
            env('TWITTER_ACCESS_TOKEN'),
            env('TWITTER_ACCESS_TOKEN_SECRET')
        );

    }
    //open_pdfでインボイスが作成されたら
    public function tweet($pdf)
    {
        $text = "無料的確請求書が作成されました！ 無料PDF適格請求書作成サイト https://eng50cha.com/invoice/open";
            $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }

    //新しい不祥事が投稿されたら
    public function tweet_thread($list)
    {
        $text = "新しい不祥事が投稿されました！ スレッド名:{$list->title}  https://eng50cha.com/diet/each/{$list->diet_id}";
        $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }
}
