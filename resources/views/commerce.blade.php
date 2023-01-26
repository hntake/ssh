<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>協賛クーポン 英語学習サイト”エイゴメ”</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/plan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/consumer.css') }}">
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

</head>

<body>
    <div class="wrapper">
        <header id="header" class="header is-open">

            <nav id="menu" class="header_nav js-menu">


                <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                <ul class="header_nav_list">
                    <li class="header_nav_itm">
                        <a href="{{url('/')}}" class="header_nav_itm_link"><img src="img/title3.png" style="width:50%; height:auto;"></a>
                    </li>
                    <li class="header_nav_itm">
                        <a href="#monitor" class="header_nav_itm_link">概要</a>
                        <div class="description1">エイゴメ協賛クーポン説明動画</div>
                    </li>

                    <li class="header_nav_itm">
                        <a href="#paid" class="header_nav_itm_link">費用</a>
                        <div class="description1">初年度は無料です</div>
                    </li>

                </ul>
            </nav>
            <div class="mobile">
                <ul class="header_nav_list">
                    <li class="header_nav_itm">
                        <a href="{{url('/')}}" class=""><img src="img/title3.png" style="width:80%; height:auto;"></a>
                    </li>
                    <li class="header_nav_itm">
                        <a href="#monitor" class="header_nav_itm_link">エイゴメ協賛クーポン概要動画</a>
                        <div class="description1">エイゴメ協賛クーポン説明動画</div>
                    </li>
                    <li class="header_nav_itm">
                        <a href="#paid" class="header_nav_itm_link">費用</a>
                        <div class="description1">初年度は無料です</div>
                    </li>
                </ul>
            </div>
        </header>
        <div class="mv">
            <section class="container">
                <div class="mv-content">
                    <p class="mv-description">英語を身近に！</p>
                    <p class="mv-logo">
                        <img class="img-fluid" src="img/coupon.png">
                    </p>
                    <p class="mv-catch">社会貢献とお店の活性化を</p>
                </div>
                <div class="mv-visual">
                    <div class="mv-slide">
                        <div class="swiper infinite-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm5.png">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm6.png">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm7.png">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm1.png">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm3.png">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="img/coupon_sm2.png">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <main>
            <section class="section  bg-gray">
                <div class="explain">
                    <h2 class="headline">
                        エイゴメ協賛クーポンとは
                    </h2>
                    <p class="about-catch">
                        ”エイゴメ”は誰でも無料で英単語テストを作ったり、受けたりできるサイトです<br>エイゴメのテストを使ってお客様にクーポンを提供します
                    </p>
                    <div class="about-figure lg-none">
                        <img class="img-chart" src="img/coupon_flow.png">
                        <p class="about-figure-note">※クーポンを受け取るまでのイメージ図</p>
                    </div>
                    <p class="about-catch">
                        英語を身近にするという社会貢献をしながら<br>リピーターの確保や客単価アップなどの機会を作れます
                    </p>
                    <div class="about-figure sm-none">
                        <img class="img-fluid" src="img/coupon_flow.png">
                        <p class="about-figure-note">※クーポンを受け取るまでのイメージ図</p>
                    </div>
                    <p class="about-catch">
                        印刷代もなく費用手間を削減するだけでなく<br>利用データを蓄積・分析できます
                    </p>
                </div>
            </section>
        </main>
        <!--説明動画-->
        <div class="youtube_kv">
            <div class="movie_cap">
                <div class="elementor-widget">
                    <a name="monitor">
                        <img src="img/movieCap_coupon.webp">
                    </a>
                </div>
                <div class="youtube">
                    <div class="elementor-image">
                        <a href="https://www.youtube.com/embed/Q4dmvJJAPOI" class="video-open" target="_blank"><img src="img/play.png"></a>
                    </div>
                </div>

            </div>
        </div>
        <section class="option-section">
            <div class="site-content">
                <div class="elementor-column">
                    <div class="elementor-top">
                        <a name="paid">
                            <div class="elementor-heading-title">
                                費用
                            </div>
                        </a>
                    </div>
                    <div class="elementor-bottom">
                        <div class="elementor-heading-title">
                            初年度は無料で利用できます。
                        </div>
                    </div>
                </div>
            </div>
            <div class="option-box">
                <div class="option-row">
                    <div class="option-wrap">
                        <div cass="option-container">
                            <div class="option-title1">店舗バナーのカスタム</div>
                        </div>
                        <div class="option-container-bottom">
                            <div class="option-price">
                                <b>￥2000～</b>
                            </div>
                        </div>
                        <div class="option-description">
                            オリジナルのバナーを<span style="color:red;">無料</span>で用意させていただきます。バナーのカスタム化は<span style="color:red;">有料</span>となります。
                        </div>
                    </div>
                    <div class="option-wrap">
                        <div cass="option-container">
                            <div class="option-title2">年会費</div>
                        </div>
                        <div class="option-container-bottom">
                            <div class="option-price">
                                <b>￥0(初年度)</b><br>
                            </div>
                        </div>
                        <div class="option-description">
                            クーポンの提供だけでなく、定期的にクーポンの発行数・利用数データを提供いたします。
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="bottom-container">

            <div class="bottom-inner">
                <div class="bottom-left">
                    <a href="{{route('contact.index')}}" target="_blanlk" class="bottom_button">
                        <span class="elementor-button">問い合わせ</span>
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
                            <li><a href="{{ url('blog/index') }}">ブログ</a></li>
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
    <!-- CDN読み込み -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!-- JSファイル読み込み -->
    <script src="js/main.js"></script>
</body>

</html>
