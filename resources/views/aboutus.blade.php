<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.5,maximum-scale=2.0,user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>AboutUs 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
</head>

<body style="background-image: url(../img/grad.jpg); position: relative;">
    <div class="aboutus">
        <div class="">
            <h2>About us</h2>
            <h1>llco(エルエルコ)は「生きることは学ぶこと」（Living=Learning）をモットーにしています</h1>
            <p>長らく海外で暮らしていました</P>
            <p>英語の楽しさ・大切さを理解しているからこそ出来ることは何かを常に考えています</p>
            <p>そして、遅くにプログラミング学習に目覚めた経験から、学ぶことに年齢は関係ないと思っています。</p>
            <p>また、障がいとも長らく向き合ってきた経験も生かしたい</p>
            <h3>そんな会社です</h3>
            <p>お問い合わせは、下記の窓口までお願い致します。</p>
            <button class="button" style="margin-top:0px;"><a href="{{ route('contact.index') }}">Contact us</a></button><br>
            <p>llco他サービスはこちらから</p>
            <button class="button" style="margin-top:0px;" id="card-button"><a style="font-size: 1.0rem;" href=https://itcha50.com>自閉症支援ツールVS4Autiサイト</a></button>
        </div>
    </div>
    <div class="top">
        <button class="button" id="card-button"><a style="font-size: 1.0rem;" href="{{ url('/') }}">トップページに<br>戻る</a></button>
    </div>
</body>

</html>
