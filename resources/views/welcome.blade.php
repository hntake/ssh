<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ” トップページ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="英単語強化サイト・エーゴメ登録無料!"data-show-count="false">Tweet</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </head>
    <body >
        <div class="loginbutton">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="button">Home</a>
                    @else
                    <div class="login-button">
                        <a href="{{ route('login') }}" class="button">ログイン</a>
                        <P>今日もポイント貯めよう！!</P>
                    </div>
                    <div class="register-button">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">新規登録</a>
                        <p>登録してポイントを貯めよう!(完全無料）</p>
                    </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="top">
        <h1>英単語強化サイト「エーゴメ」</h1>
            <img src="img/title2.png" alt="top" >
        </div>
            <div class="rule">
                <h2 style="font-family: 'Noto Sans JP', sans-serif;">
                ルールを守って楽しく学ぼう
                </h2>
                <h3>
                   ログインせずにテストを受けてみるなら<br>
                   ここをクリック！
                   <a href="{{ url('search_result') }}" class="center-button">検索</a>
                </h3>
            </div>
            <div class="welcome">
                <div class="welcome1">
                    <img src="img/welcom1.png" alt="welcome1">
                </div>
                <div class="welcome2">
                    <img src="img/welcome2.png" alt="welcome2">
                </div>
            </div>
            <div class="point_detail">
                <img src="img/monitor2.png" alt="point_detail" style="width:50%; height:auto;">
            </div>
            <div class="rec">
                <div class="cartoon">
                    <h2>おススメの利用方法①</h2>
                    <h3 style="color:red;">"テストを作ってポイントを稼ごう！"</h3>
                    <img src="img/recomend.png" alt="rec" style="width:60%;">
                    <h4>作成で<span style="color:red;">3点</span>+利用されて<span style="color:red;">1点</span>+自分も受ければ<span style="color:red;">1~3点</span>=<span style="color:red;">5~7点</span>加算されます！</h4>
                </div>
                <div class="cartoon">
                    <h2>おススメの利用方法②</h2>
                    <h3 style="color:red;">"友達と一緒に得点アップ！"</h3>
                    <img src="img/recomend2.png" alt="rec" style="width:60%;">
                </div>
            </div>
            <div class="llco">
            <img src="img/showvideo.png" alt="showvideo">
                <div class="video">
                    <a href="img/logintest.mp4" alt="llco">動画①ログインからテストを受けるまで</a>
                </div>
                <div class="video">
                    <a href="img/createTest.mp4" alt="llco">動画②新しいテストを作る</a>
                </div>
                <div class="video">
                    <a href="img/profile.mp4" alt="llco">動画③プロフィール編集方法</a>
                </div>
                <p>クリックすると動画が始まります</p>
            </div>
            <div class="regist">
            <a href="{{ route('register') }}"><img src="img/welcome3.png" alt="llco"></a>
            </div>
            <h2 style="font-family: 'Noto Sans JP', sans-serif; color:orangered">登録は完全無料です</h2>
            <p>画像をクリックすると登録画面に移動します↑</p>
        </div>
        <footer>
  	        <p>© All rights reserved by llco</p>
            <div class="contact">
                  <h3>
                    教育関係者向けモニタリングサービス（有料）の案内
                  </h3>
                  <a href="{{ url('monitor') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: aliceblue;">モニタリングサービス</a>
               </div>
              <div class="contact">
                  <h3>
                      お問い合わせ・ご質問はこちら迄
                  </h3>
                  <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">Contact us</a>
               </div>
              <div class="left">
                <div class="policy" >
                        <a href="{{ url('policy') }}" class="button">プライバシーポリシー</a>
                </div>
                <div class="terms">
                        <a href="{{ url('rule') }}" class="button">利用規約</a>
                </div>
                <div class="terms">
                        <a href="{{ url('aboutus') }}" class="button">About Us</a>
                </div>
            </div>
         </footer>
    </body>
</html>
