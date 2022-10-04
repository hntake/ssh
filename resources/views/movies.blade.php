<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ” トップページ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
        <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/jquery.bxslider.js"></script>
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script type="text/javascript">
    jQuery(document).ready(function($){
    $('.bxslider').bxSlider({
    auto: true,
   captions: true,
   pagerCustom: '#bx-pager',
   adaptiveHeight: true,
   slideWidth: 1500
    });
    });
    </script>
    </head>
    <body >
        <div class="container">
            <main>
                <div class="lw-common_header">
                    <div class="lw-common_logo">
                        <a href="https://eng50cha.com">
                            <img src="img/title2.png" alt="title">
                        </a>
                    </div>
                </div>
                <div class="vm-banner-top">
                    <div class="vm-banner-top_wrapper"></div>
                </div>
                <div id="VideoModule">
                    <div class="vm">
                        <div class="vm_block">
                            <div class="vm_head">
                                <h2 class="vm_category">
                                    <span class="label1">入門編</span>エーゴメのはじめ方
                                </h2>
                            </div>
                            <div class="vm_body">
                                <div class="vm_wrapper-sub">
                                    <div class="vm_video">
                                        <img src="">
                                    </div>
                                    <div class="vm_content">
                                        <h3 class="vm_title">登録からログインまで</h3>
                                    </div>
                                </div>
                                <div class="vm_wrapper-sub">
                                    <div class="vm_video">
                                        <img src="">
                                    </div>
                                    <div class="vm_content">
                                        <h3 class="vm_title">自分だけのテストを作ってみよう</h3>
                                    </div>
                                </div>
                                <div class="vm_wrapper-sub last">
                                    <div class="vm_video">
                                        <img src="">
                                    </div>
                                    <div class="vm_content">
                                        <h3 class="vm_title">テスト検索からテストを受けるまで</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <header id="header" class="header is-dpen">

                <div class="header_inner">

                </div>
            </header>
            <div class="main-column">

                <div class="home_kv">

                </div>
            </div>
      <!--  <div class="video">
                                    <a href="https://youtu.be/8kKhNYq1wxI" alt="llco">動画①ログインからテストを受けるまで</a>
                        </div>
                        <div class="video">
                                    <a href="https://youtu.be/_fvpFhgU-J8" alt="llco">動画②新しいテストを作る</a>
                        </div>
                        <div class="video">
                                    <a href="https://youtu.be/51Ruxi-rBiI" alt="llco">動画③プロフィール編集方法</a>
                        </div>
                                <p>クリックするとYoutubeで動画が始まります</p>
                    </div> -->
                <!--     <div class="rec">
                        <div class="cartoon">
                            <h2>おススメの利用方法</h2>
                            <ul>
                                <li style="list-style-type: none;">
                                    <a href="img/recomend.png" alt="llco">おススメの利用方法① "テストを作ってポイントを稼ごう！"</a>
                                </li>
                                <li style="list-style-type: none;">
                                    <a href="img/recomend2.png" alt="llco">おススメの利用方法② "友達と一緒に得点アップ！"</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="regist">
                        <a href="{{ route('register') }}"><img src="img/welcome3.png" alt="llco" style="width:50%;"></a>
                    </div>
                <h2 style="font-family: 'Noto Sans JP', sans-serif; color:orangered">登録は完全無料です</h2>
                <p>画像をクリックすると登録画面に移動します↑</p> -->
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
                <div class="terms">
                        <a href="{{ url('consumer') }}" class="button">特定商取引</a>
                </div>
            </div>
         </footer>
    </body>
</html>
