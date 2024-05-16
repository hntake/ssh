<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="description" content="llco（エルエルコ）は、「生きることは学ぶこと」をモットーに掲げる企業です。長年にわたる海外での経験やプログラミング学習への情熱から、
    学びと成長を大切にし、年齢や障がいに関係なく活躍できる環境を提供しています。詳細は当サイトでご確認ください。">
    <meta name="keywords" content="llco">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/policy.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/about.css') }}"> 

    <title>AboutUs Webサービス会社llco</title>
</head>

<body style="background-image: url(../img/grad.jpg); position: relative;">
    <div class="wrap">
        <div class="">
            <h2>About us</h2>
            <h1>llco(エルエルコ)は「生きることは学ぶこと」（Living=Learning）をモットーにしています</h1>
            <p>長らく海外で暮らしていました</P>
            <p>英語の楽しさ・大切さを理解しているからこそ出来ることは何かを常に考えています</p>
            <p>そして、遅くにプログラミング学習に目覚めた経験から、学ぶことに年齢は関係ないと思っています。</p>
            <p>また、障がいとも長らく向き合ってきた経験も生かしたい</p>
            <h3>そんな会社です</h3>
            <p>お問い合わせは、下記の窓口までお願い致します。</p>
            <div class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></div><br>
            <p>llco他サービスはこちらから</p>
            <div class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://itcha50.com>自閉症向け無料サービス案内</a></div>
            <div class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://itcha50.com/design/list>障がい者アート共有サイト</a></div>
            <div class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://itcha50.com/bbs/list>自閉症・発達障害専門掲示板</a></div>
        </div>
    </div>
    <div class="top">
        <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
    </div>
</body>

</html>
