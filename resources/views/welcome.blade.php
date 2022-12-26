<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ” トップページ</title>

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
        jQuery(document).ready(function($) {
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

<body>
    <div class="wrap">
        <div class="container">
            <header id="header" class="header is-open">

                <div class="header_inner">
                    <nav id="menu" class="header_nav">


                        @if (Route::has('login'))
                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                        <ul class="header_nav_list">

                            <li class="header_nav_itm">
                                <a href="{{ url('search_result') }}" class="header_nav_itm_link">テスト検索</a>
                                <div class="description1">テストを受けてみる</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('use') }}" class="header_nav_itm_link">使い方</a>
                                <div class="description1">エイゴメの使い方</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('feature') }}" class="header_nav_itm_link">便利な機能</a>
                                <div class="description1">フォロー機能やポイントシステム</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="{{ url('plan') }}" class="header_nav_itm_link">教育関係者向け</a>
                                <div class="description1">モニタリングサービスのご案内</div>
                            </li>
                          <li class="header_nav_itm">
                                <a href="{{ url('commerce') }}" class="header_nav_itm_link">社会貢献</a>
                                <div class="description1">協賛クーポンのご案内</div>
                            </li>
                            <li class="header_nav_itm">
                                @auth
                                <a href="{{ url('/home') }}" class=" header_nav_itm_link">Home</a>
                                <div class="description1">Myホーム画面へ移動する </div>
                            </li>
                            <li class="header_nav_itm">
                                @else
                                <div class="login-button">
                                    <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                    <div class="description1">ログイン画面へ移動する </div>
                                </div>
                            </li>
                            <li class="header_nav_itm">
                                <div class="register-button">
                                    @if (Route::has('register'))
                                    <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                    <div class="description1">登録して完全無料の全機能を使う </div>

                                </div>
                            </li>
                            @endif
                            @endauth
                            @endif
                            <li class="header_nav_itm">
                                <div class="register-button">
                                    <a href="{{url('feature')}}" class="header_nav_itm_link">説明動画</a>
                                    <div class="description1">マニュアル動画ページへ</div>
                                </div>
                            </li>
                        </ul>
                        <div class="news">
                            <ul>
                                <p style="font-weight:bold;">お知らせ</p>
                                <li>
                                    <a href="{{ url('news/index')}}">
                                        {{$new->created_at}}
                                    </a>
                                </li>
                                <li>
                                    {!!$new->main!!}
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="mobile-login">
                    <ul>
                        <li class="header_nav_itm">
                            @if (Route::has('login'))
                            @auth
                            <div class="home-button">
                                <a href="{{ url('/home') }}" class=" header_nav_itm_link">Home</a>
                                <div class="description1">Myホーム画面へ移動する </div>
                            </div>
                        </li>
                        <li class="header_nav_itm">
                            @else
                            <div class="login-button">
                                <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                <div class="description1">ログイン画面へ移動する </div>
                            </div>
                        </li>
                        <li class="header_nav_itm">
                            <div class="register-button">
                                @if (Route::has('register'))
                                <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                <div class="description1">登録して完全無料の全機能を使う </div>

                            </div>
                        </li>

                        @endif
                        @endauth
                        @endif
                    </ul>

                </div>
                <!--  ハンバーガーメニュー -->
                <div class="mobile-menu">
                    <div id="nav-drawer">
                        <input id="nav-input" type="checkbox" class="nav-unshown">
                        <label id="nav-open" for="nav-input"><span></span></label>
                        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                        <div id="nav-content">
                            <ul class="header_nav_list">
                                <li><a href="{{ url('search_result') }}">
                                        <h3>テスト検索</h3>
                                    </a></li>
                                <li><a href="{{ url('feature') }}">
                                        <h3>使い方</h3>
                                    </a></li>
                                <li><a href="{{ url('feature') }}">
                                        <h3>便利な機能</h3>
                                    </a></li>
                                <li><a href="{{ url('plan') }}">
                                        <h3>教育関係者向け</h3>
                                    </a></li>
                               <li><a href="{{ url('commerce') }}">
                                        <h3>社会貢献</h3>
                                    </a></li>
                                <li class="header_nav_itm">
                                    <div class="register-button">
                                        <a href="{{url('feature')}}" class="header_nav_itm_link">説明動画</a>
                                        <div class="description1">マニュアル動画ページへ</div>
                                    </div>
                                </li>
                                <li class="header_nav_itm">
                                    @if (Route::has('login'))
                                    @auth
                                    <div class="home-button">
                                        <a href="{{ url('/home') }}" class=" header_nav_itm_link">Home</a>
                                        <div class="description1">Myホーム画面へ移動する </div>
                                    </div>
                                </li>
                                <li class="header_nav_itm">
                                    @else
                                    <div class="login-button">
                                        <a href="{{ route('login') }}" class="header_nav_itm_link">ログイン</a>
                                        <div class="description1">ログイン画面へ移動する </div>
                                    </div>
                                </li>
                                <li class="header_nav_itm">
                                    <div class="register-button">
                                        @if (Route::has('register'))
                                        <a target="_blank" href="{{ route('register') }}" class="header_nav_itm_link">新規登録</a>
                                        <div class="description1">登録して完全無料の全機能を使う </div>

                                    </div>
                                </li>

                                @endif
                                @endauth
                                @endif
                            </ul>

                        </div>
                        <script>
                            $(function() {
                                $('#nav-content li a').on('click', function(event) {
                                    $('#nav-input').prop('checked', false);
                                });
                            });
                        </script>
                    </div>
                </div>
            </header>
            <div class="main-column">
                <div class="mobile-login-news">
                    <div class="news">
                        <ul>
                            <p style="font-weight:bold;">お知らせ</p>
                            <li>
                                <a href="{{ url('news/index')}}">
                                    {{$new->created_at}}
                                </a>
                            </li>
                            <li>
                                {!!$new->title!!}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="home_copy">
                    <span class="tategaki" style="opacity:1;">
                        英単語テストを作ったり
                        <br class="sp_only">
                        受けたりできるサイト
                    </span>

                </div>
                <div class="home_kv">
                    <div class="bx-viewport">
                        <ul class="bxslider">
                            <li>
                                <img class="image" src="img/engTop2.webp" alt="top" style="width:70%; height:auto;">
                                <div class="post_title1">
                                    <h2 class="post_titile">
                                        To the World!
                                    </h2>
                                </div>
                            </li>
                            <li>
                                <img class="image" src="img/engTopSky2.webp" alt="top" style="width:80%; height:auto;">
                                <div class="post_title2">
                                    <h2 class="post_titile">
                                        Achieve your dream!
                                    </h2>
                                </div>
                            </li>
                            <li>
                                <img class="image" src="img/engTopRiv2.webp" alt="top" style="width:80%; height:auto;">
                                <div class="post_title3">
                                    <h2 class="post_titile">
                                        You can do anything!
                                    </h2>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="bottom-container">
                    <div class="bottom-element">
                        <div class="bottom-element-top">
                            <h2 class="bottom-element-top">
                                今すぐはじめてみよう！
                            </h2>
                        </div>
                        <div class="bottom-inner">
                            <div class="bottom-left">
                                <a href="{{route('search_result')}}" target="_blanlk" class="bottom_button">
                                    <span class="elementor-button">テストを受ける</span>
                                </a>
                            </div>
                            <div class="bottom-right">
                                <a href="{{route('register')}}" target="_blank" class="bottom-right-button">
                                    <span class="elementor-button">新規登録する</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="site-footer">
        <div class="bc-sitemap-wrapper">
            <div class="sitemap clearfix">
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">製品紹介</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('feature') }}">機能</a></li>
                            <li><a href="{{ url('plan') }}">利用料金</a></li>
                            <li><a href="{{ url('case') }}">導入事例</a></li>
                            <li><a href="{{ url('/admin/login')}}">管理者画面</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">関連情報</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('blog/index')}}">ブログ</a></li>
                            <l><a href="{{ url('news/index')}}">お知らせ</a></li>
                                <li><a href="{{ url('partner')}}">パートナー</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">サポート</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ route('contact.index')}}">お問い合わせ</a></li>
                            <li><a href="{{ url('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">会社情報</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('policy')}}">プライバシー</a></li>
                            <li><a href="{{ url('rule')}}">利用規約</a></li>
                            <li><a href="{{ url('aboutus')}}">About Us</a></li>
                            <li><a href="{{ url('consumer')}}">特定商取引</a></li>
                        </ul>
                    </div>
                </div>
                <div class="site-info">
                    <div class="widget">
                        <div class="copy-right">
                            <span class="copu-right-text">© All rights reserved by llco</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>

        <a href="#" class="gotop">トップへ</a>
    </footer>
</body>

</html>
