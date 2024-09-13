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
      //open_pdfでインボイスが作成されたら
    public function tweet_inheritance($pdf)
    {
        $text = "法定相続情報一覧図が作成されました！ 無料法定相続情報一覧図作成サイト https://eng50cha.com/inheritance/top";
            $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }

    //新しい不祥事が投稿されたら
    public function tweet_thread($link)
    {
        $text = "新しい不祥事記事が投稿されました！ 不祥事記事:{$link->title}  https://eng50cha.com/diet/each/{$link->diet_id}";
        $result = $this->twitter->post('tweets', ['text' => $text]);
        return $result;
    }
}
