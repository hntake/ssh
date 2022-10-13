<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>利用料金 英語学習サイト”エーゴメ” トップページ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
        <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
         <link rel="stylesheet" href="{{ asset('css/plan.css') }}">
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
        <div class="wrap">
            <div class="container">
                <header id="header" class="header is-open">

                    <div class="header_inner">
                        <nav id="menu" class="header_nav js-menu">


                        @if (Route::has('login'))
                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                            <ul class="header_nav_list">
                                <li class="header_nav_itm">
                                <a href="{{url('/')}}" class="header_nav_itm_link"><img src="img/title2.png" style="width:30%; height:auto;"></a>
                                </li>
                                <li class="header_nav_itm">
                                <a href="#paid" class="header_nav_itm_link">有償プラン</a>
                                <div class="description1">有償プランのメリット</div>
                                </li>

                                <li class="header_nav_itm">
                                <a href="#monitor" class="header_nav_itm_link">オプション商品</a>
                                <div class="description1">より快適なサービスの利用</div>
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

                            </ul>
                        </nav>
                    </div>
                            <!--  ハンバーガーメニュー -->
                            <div class="mobile-menu">
                        <div id="nav-drawer">
                            <input id="nav-input" type="checkbox" class="nav-unshown">
                            <label id="nav-open" for="nav-input"><span></span></label>
                            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                            <div id="nav-content">
                            <ul class="header_nav_list">
                                    <li><a href="#paid">
                                            <h3>有償プラン</h3>
                                        </a></li>
                                    <li><a href="#monitor">
                                            <h3>オプション商品</h3>
                                        </a></li>
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
                <div class="elementor-section-wrp">
                    <section class="elementor-section">
                            <div class="site-content">
                            <div class="elementor-background"></div>
                        <div class="elementor-column">
                            <div class="elementor-top">
                                <div class="elementor-heading-title">
                                利用料金について
                                </div>
                            </div>
                            <div class="elementor-bottom">
                                <div class="elementor-heading-title">
                                教育関係者向けの有償サービスです。<br>エーゴメだけの利用は完全無料です。
                                </div>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
                <div class="selections">

                    <div class="box">
                        <section class="elementor-inner-section">
                                <div class="elementor-row">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-tit">完全無料</div>
                                    </div>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-english">エーゴメだけの利用</div>
                                    </div>
                                    <div class="elementor-element">
                                        <p class="elementor-heading-dis">
                                        モニタリングサービス無しの利用は
                                        <br>
                                        一切費用が掛かりません
                                        </p>
                                    </div>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-price">
                                            ￥0
                                            <span class="price-sub-dec">（無料）</span>
                                        </div>
                                    </div>
                                    <div class="elementor-button">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-heading-title-button">
                                                <a href="{{route('register')}}" target="_blank" class="elementor-button">
                                                    <span class="elementor-button">
                                                        今すぐ登録する
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-title">
                                            <div class="feature">
                                                基本機能
                                            </div>
                                        </div>
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon">
                                                <li class="elementor-icon">
                                                    <span class="elementor-icon">テスト作成（無制限）</span>
                                                </li>
                                                <li class="elementor-icon">
                                                    <span class="elementor-icon">テストを受ける（無制限）</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </section>
                        <section class="elementor-innerr-section">
                            <div class="elementor-row">
                                    <div class="elementor-widget-container">
                                        <a name="paid">

                                            <div class="elementor-heading-tit">MONITORING</div>
                                        </a>
                                    </div>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-english">モニタリングサービス</div>
                                    </div>
                                    <div class="elementor-element">
                                        <p class="elementor-heading-dis">
                                        生徒の利用を
                                        <br>
                                        簡単に閲覧できるサービス
                                        </p>
                                    </div>
                                    <div class="elementor-widget-container">
                                        初回設定費用￥2000支払い後
                                        <div class="elementor-heading-price">
                                            ￥1000
                                            <span class="price-sub-dec">1ユーザー/ 年（年額契約）</span>
                                        </div>
                                    </div>
                                    <div class="elementor-button">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-heading-title-button">
                                                <a href="{{route('admin_form')}}" target="_blank" class="elementor-button">
                                                    <span class="elementor-button">
                                                        今すぐ申し込む
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-widget-container">
                                        <div class="elementor-heading-title">
                                            <div class="feature">
                                                基本機能
                                            </div>
                                        </div>
                                        <div class="elementor-widget-container">
                                            <ul class="elementor-icon">
                                                <li class="elementor-icon">
                                                    <span class="elementor-icon">生徒のテスト利用閲覧（無制限）</span>
                                                </li>
                                                <li class="elementor-icon">
                                                    <span class="elementor-icon">生徒へメッセージを送る（無制限）</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
                        <section class="option-section">
                            <div class="site-content">
                                <div class="elementor-column">
                                    <div class="elementor-top">
                                        <a name="monitor">
                                            <div class="elementor-heading-title">
                                                オプション商品
                                            </div>
                                        </a>
                                    </div>
                                    <div class="elementor-bottom">
                                        <div class="elementor-heading-title">
                                            より良いサービスを利用できるオプション商品の追加が可能です。
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="option-box">
                                <div class="option-row">
                                    <div class="option-wrap">
                                            <div cass="option-container">
                                                <div class="option-title1">アカウント作成</div>
                                            </div>
                                            <div class="option-container-bottom">
                                                <div class="option-price">
                                                    <b>￥100</b>
                                                    / 1ユーザー
                                                </div>
                                            </div>
                                            <div class="option-description">
                                                個人情報流出対策として生徒個人のメールアドレスを利用せずアカウントを作成します。
                                            </div>
                                    </div>
                                    <div class="option-wrap">
                                            <div cass="option-container">
                                                <div class="option-title2">カスタマイズ</div>
                                            </div>
                                            <div class="option-container-bottom">
                                                <div class="option-price">
                                                    <b>￥3000～</b>
                                                </div>
                                            </div>
                                            <div class="option-description">
                                                閲覧ページの表示方法や、機能追加など金額は相談内容によります。ご気軽に相談ください。
                                            </div>
                                    </div>
                                    <div class="option-wrap">
                                            <div cass="option-container">
                                                <div class="option-title3">CSVデータの取得</div>
                                            </div>
                                            <div class="option-container-bottom">
                                                <div class="option-price">
                                                    <b>￥300</b>
                                                    / 1件
                                                </div>
                                            </div>
                                            <div class="option-description">
                                                生徒管理のデータとしてお使いのエクセルなどで利用できます。
                                            </div>
                                    </div>
                                </div>
                            </div>

                    </section>
                    <div class="bottom-inner">
                                <div class="bottom-left">
                                        <a href="{{route('contact.index')}}" target="_blanlk" class="bottom_button">
                                            <span class="elementor-button">オプション商品問い合わせ</span>
                                        </a>
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
                                    <li><a href="{{ url('/admin/login') }}">管理者画面</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">関連情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ url('blog') }}">ブログ</a></li>
                                    <l><a href="{{ url('news') }}">お知らせ</a></li>
                                    <li><a href="{{ url('partner') }}">パートナー</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">サポート</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ route('contact.index') }}">お問い合わせ</a></li>
                                    <li><a href="{{ url('faq') }}">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">会社情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ url('policy') }}'">プライバシー</a></li>
                                    <li><a href="{{ url('rule') }}">利用規約</a></li>
                                    <li><a href="{{ url('aboutus') }}">About Us</a></li>
                                    <li><a href="{{ url('consumer') }}">特定商取引</a></li>
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
