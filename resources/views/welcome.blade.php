<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>llco Web制作会社</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ">
    <meta name="keywords" content="英語学習,発音学習,英単語,中学英語,高校英語,英検二級,英検一級,TOEIC">
    <meta name="author" content="llco">
    <meta name="robots" content="index, follow">

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
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>
    <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 40px;
        }
        .service {
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        .service h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .service p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666;
        }
        .service button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .service button:hover {
            background-color: #0056b3;
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
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>ようこそllco Web制作会社へ</h1>
        
        <div class="service">
            <h2>提供サービス 1: 英単語学習アプリ</h2>
            <button onclick="location.href='{{ route('english') }}'">サービスに移動</button>
        </div>
        
        <div class="service">
            <h2>提供サービス 2: インボイス対応請求書作成アプリ</h2>
            <button onclick="location.href='{{ url('invoice/open') }}'">サービスに移動</button>
        </div>
        
        <div class="service">
            <h2>提供サービス 3: 法定相続一覧図作成アプリ</h2>
            <button onclick="location.href='{{ url('inheritance/top') }}'">サービスに移動</button>
        </div>
        
        <div class="service">
            <h2>提供サービス 4: 在庫管理アプリ</h2>
            <button onclick="location.href='{{ url('stock/top') }}'">サービスに移動</button>
        </div>
        
        <div class="service">
            <h2>提供サービス 5: eギフトカードアプリ</h2>
            <button onclick="location.href='{{ url('gift/top') }}'">サービスに移動</button>
        </div>
        
        <!-- <div class="service">
            <h2>提供サービス 6: カスタムアンケート作成アプリ</h2>
            <button onclick="location.href='{{ url('customer/index') }}'">サービスに移動</button>
        </div> -->
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
                            <span class="copy-right-text">© All rights reserved by llco</span>
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
