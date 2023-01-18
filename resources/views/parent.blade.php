<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>エイゴメ親子機能とは？英語学習サイト”エイゴメ” </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <!--mordal_youtube-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
    <link rel="stylesheet" type="text/css" href="css/9-6-2.css">
    <!-- Styles -->
    <!--  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/feature.css') }}">
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
        jQuery(document).on('load', function($) {
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
                    <nav id="menu" class="header_nav js-menu">


                        @if (Route::has('login'))
                        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                        <ul class="header_nav_list">

                            <li class="title_image">
                                <a href="{{url('/')}}" class=""><img src="img/title3.png" style="width:30%; height:auto;"></a>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#feature" class="header_nav_itm_link">概要</a>
                                <div class="description1">親子機能の概要</div>
                            </li>
                            <li class="header_nav_itm">
                                <a href="#monitor" class="header_nav_itm_link">申込方法</a>
                                <div class="description1">親子機能の申込方法</div>
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
                <div class="mobile">
                    <ul>
                        <li class="header_nav_itm">
                            <a href="{{url('/')}}" class=""><img src="img/title3.png" style="width:30%; height:auto;"></a>
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
                <!--  ハンバーガーメニュー -->
                <div class="mobile-menu">
                    <div id="nav-drawer">
                        <input id="nav-input" type="checkbox" class="nav-unshown">
                        <label id="nav-open" for="nav-input"><span></span></label>
                        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                        <div id="nav-content">
                            <ul class="header_nav_list">
                                <li><a href="#feature">
                                        <h3>親子機能</h3>
                                    </a></li>
                                <li><a href="#monitor">
                                        <h3>申込方法</h3>
                                    </a></li>
                                <li class="header_nav_itm">
                                    <div class="register-button">
                                        <a href="{{url('feature')}}" class="header_nav_itm_link">説明動画</a>
                                        <div class="description1">マニュアル動画ページへ</div>
                                    </div>
                                </li>
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
            <div class="youtube_kv">
                <div class="movie_cap">
                    <div class="elementor-widget">
                        <a name="feature">
                            <img src="">
                        </a>
                    </div>
                    <div class="youtube">
                        <div class="elementor-image">
                            <a href="https://www.youtube.com/embed/OnNhGpLqLlE" class="video-open"><img src="img/play.png"></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="youtube_kv">
                <div class="movie_cap">
                    <div class="elementor-widget">
                        <a name="monitor">
                            <img src="">
                        </a>
                    </div>
                    <div class="youtube">
                        <div class="elementor-image">
                            <a href="https://www.youtube.com/embed/d5Yjn2f3-9c" class="video-open"><img src="img/play.png"></a>
                        </div>
                    </div>

                </div>
            </div>
            <section>
                <div class="element">
                    <div class="use">
                        <!-- リンク内移動-->
                        <a name="use" class="use">
                            <br>エイゴメで
                            <br>英単語を強化しよう</a>
                    </div>
                    <div class="tab_wrap">
                        <input id="tab1" type="radio" name="tab_btn" checked>
                        <input id="tab2" type="radio" name="tab_btn">
                        <input id="tab3" type="radio" name="tab_btn">
                        <div class="nav-wrap">
                            <div class="scroll-nav">
                                <div class="tab_area">
                                    <label class="tab1_label" for="tab1">まずは登録</label>
                                    <label class="tab2_label" for="tab2">今日のテスト</label>
                                    <label class="tab3_label" for="tab3">ペアレントチェック</label>
                                </div>
                            </div>
                            <div class="next-btn">＞</div>
                        </div>
                        <div class="panel_area">
                            <div id="panel1" class="tab_panel">
                                <table class="design09">

                                    <div class="sright">
                                        <div class="slide-head">親子機能を使うには</div>
                                        <div class="slide-description">
                                            <b>まずは登録</b>
                                            ポイントを記録するため登録が必要で<br>
                                            <a href="{{url('feature')}}">他の様々な機能</a>も使えます（完全無料）<br>
                                            <br>
                                            <div class="llco" style="background-color:unset;">
                                                <div class="admin_button"><a href="{{ route('register') }}" style="background-color:none; color:#7791DE;">登録ページへ</a></div>
                                            </div>
                                        </div>
                                </table>
                            </div>
                            <div id="panel2" class="tab_panel">
                                <div class="sleft">
                                    <a href="img/create_use.png" data-lightbox="group"> <img src="img/create_use.png" alt="create" style="width:80%;"></a>
                                </div>
                                <div class="sright">
                                    <div class="slide-head">一日一回の約束！</div>
                                    <div class="slide-description">
                                        <b>Today's Testを受けよう</b>
                                        漢字書き取りの様に<br>
                                        英単語も毎日やることで効果が上がります<br>
                                        ランダムで今日のテストが表示されます<br>
                                        <br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                    </div>
                                </div>

                            </div>
                                <div id="panel3" class="tab_panel">
                                    <div class="sleft">
                                        <a href="img/search.png" data-lightbox="group"> <img src="img/search.png" alt="search" style="width:80%;"></a>
                                </div>
                                <div class="sright">
                                    <div class="slide-head">8点以上で合格したら</div>
                                    <div class="slide-description">
                                        <b>ペアレントチェック</b>
                                        今日のテストに合格したら<br>
                                        家の人に確認してもらいます。<br>
                                        確認するとポイントが加算され<br>
                                        履歴ともに表示されます<br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="element">
                    <div class="use">
                        <!-- リンク内移動-->
                        <a name="useful" class="use">
                            <br>ログインすると使える
                            <br>便利な機能</a>
                    </div>
                    <div class="tab_wrap">
                        <input id="tab4" type="radio" name="tab_btn2" checked>
                        <input id="tab5" type="radio" name="tab_btn2">
                        <input id="tab6" type="radio" name="tab_btn2">
                        <input id="tab7" type="radio" name="tab_btn2">
                        <div class="nav-wrap">
                            <div class="scroll-nav">
                                <div class="tab_area">
                                    <label class="tab4_label" for="tab4">フォロー機能</label>
                                    <label class="tab5_label" for="tab5">プロフィール機能</label>
                                    <label class="tab6_label" for="tab6">ポイント機能</label>
                                    <label class="tab7_label" for="tab7">デバイスフリー</label>
                                </div>
                            </div>
                            <div class="next-btn">＞</div>
                        </div>
                        <div class="panel_area">
                            <div id="panel4" class="tab_panel">
                                <div class="sleft">
                                    <a href="img/myfollow.png" data-lightbox="group"><img src="img/myfollow.png" alt="register" style="width:80%;"></a>
                                </div>
                                <div class="sright">
                                    <div class="slide-head">友達をフォローする</div>
                                    <div class="slide-description">
                                        <b>簡単にテスト表示</b>
                                        一緒にテストを共有したい友達を<br>
                                        フォローするとホーム画面に表示されます<br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                    </div>
                                </div>
                            </div>
                            <div id="panel5" class="tab_panel">
                                <div class="sleft">
                                    <a href="img/mylist.png" data-lightbox="group"> <img src="img/mylist.png" alt="create" style="width:80%;"></a>
                                </div>
                                <div class="sright">
                                    <div class="slide-head">テスト期間に便利</div>
                                    <div class="slide-description">
                                        <b>簡単に編集削除</b>
                                        自分の作ったテストは<br>
                                        プロフィールページに表示されます<br>
                                        覚えたら削除も出来ます<br>
                                        利用履歴もホームページで表示されます
                                        <br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                    </div>
                                </div>

                            </div>
                            <div id="panel6" class="tab_panel">
                                <div class="contents">
                                    <div class="item">
                                        <table class="company">
                                            <tbody>
                                                <tr>
                                                    <th class="arrow_box">テストを作る</th>
                                                    <td>+3</td>
                                                </tr>
                                                <tr>
                                                    <th class="arrow_box">テストを受ける</th>
                                                    <td> 得点9～10点 +3<br>
                                                        得点6～8点 +2<br>
                                                        得点0～5点 +1
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>自分のテストが利用される</th>
                                                    <td>
                                                        +1
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="item">
                                        <div class="slide-head">ポイントを集めよう</div>
                                        <div class="slide-description">
                                            <b>やる気につながる</b>
                                            各利用に対して<br>
                                            ポイントが加算されます<br>
                                            <br>
                                            ※詳細は画像をクリックして拡大してみてください
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="panel7" class="tab_panel">
                                <div class="sleft">
                                    <img src="img/smafo.png" alt="create" style="width:80%;">
                                </div>                                <div class="sright">
                                    <div class="slide-head">自分にあった使い方</div>
                                    <div class="slide-description">
                                        <b>PC、スマホ、タブレット</b>
                                        いずれのデバイスでも<br>
                                        利用できます<br>
                                        <br>
                                        タイピング練習もかねてPC<br>
                                        電車の中ではスマホなど
                                        <br>
                                        自分にあったやり方で英単語を強化できます
                                        <br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="element">
                    <div class="use">
                        <!-- リンク内移動-->
                        <a name="monitor" class="use">
                            <br>教育機関向け
                            <br>有料サービス</a>
                    </div>
                    <div class="tab_wrap">
                        <input id="tab8" type="radio" name="tab_btn3" checked>
                        <input id="tab9" type="radio" name="tab_btn3">
                        <input id="tab10" type="radio" name="tab_btn3">
                        <input id="tab11" type="radio" name="tab_btn3">

                        <div class="nav-wrap">
                            <div class="scroll-nav">
                                <div class="tab_area">
                                    <label class="tab8_label" for="tab8">モニタリング</label>
                                    <label class="tab9_label" for="tab9">メッセージ</label>
                                    <label class="tab10_label" for="tab10">個人情報対策</label>
                                    <label class="tab11_label" for="tab11">料金内訳</label>
                                </div>
                            </div>
                            <div class="next-btn">＞</div>
                        </div>
                        <div class="panel_area">
                            <div id="panel8" class="tab_panel">
                                <a href="img/monitor_pc.png" data-lightbox="group"><img src="img/monitor_pc.png" alt="monitor" style="width:30%;"></a>
                                <div class="sright">
                                    <div class="slide-head">簡単表示</div>
                                    <div class="slide-description">
                                        <b>学習状況を可視化</b>
                                        自生徒の利用が<br>
                                        簡単に確認できます<br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                        <div class="llco" style="background-color:unset;">
                                            <div class="admin_button"><a href="{{ route('admin_form') }}" style="background-color:none; color:#7791DE;">申込ページへ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="panel9" class="tab_panel">
                                <a href="img/commentBig.png" data-lightbox="group"> <img src="img/comment.png" alt="comment" style="width:30%;"></a>
                                <div class="sright">
                                    <div class="slide-head">簡単メッセージ機能</div>
                                    <div class="slide-description">
                                        <b>リモートで指示・指導</b>
                                        講師や教師より<br>
                                        アドバイスや指示を個別に送れます<br>
                                        ※講師→生徒の一方向のメッセージです<br>
                                        個人的なメッセージは出来ないようになっております
                                        <br>
                                        <br>
                                        ※詳細は画像をクリックして拡大してみてください
                                    </div>
                                </div>

                            </div>
                            <div id="panel10" class="tab_panel">
                                <img src="img/security.png" alt="create" style="width:30%;">
                                <div class="sright">
                                    <div class="slide-head">情報流出を危惧されるなら</div>
                                    <div class="slide-description">
                                        <b>アカウント設定サービス</b>
                                        ※別料金が必要となります<br>
                                        専用のアカウントを全生徒分作成いたします<br>
                                        <br>
                                        <br>
                                    </div>
                                </div>

                            </div>
                            <div id="panel11" class="tab_panel">
                                <div class="contents">
                                    <div class="item">
                                        <table class="company">
                                            <tbody>
                                                <tr>
                                                    <th class="arrow_box">モニタリングサービス初期設定費用</th>
                                                    <td>2000円</td>
                                                </tr>
                                                <tr>
                                                    <th class="arrow_box">年会費</th>
                                                    <td> 1000円
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>アカウント設定</th>
                                                    <td>
                                                        100円/1人
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="item">
                                        <div class="slide-head">まずはご相談から</div>
                                        <div class="slide-description">
                                            <b>まずは一年間、使ってみませんか</b>
                                            アカウント設定を利用しなければ<br>
                                            初回3000円のみで始められます<br>
                                            <h4>保証期間：登録から一年間</h4>
                                            ※サーバートラブルなど一時的な停止を除く長期の利用不可が生じた場合は<span style="color:red;">全額返金致します。</span>
                                            <div class="llco" style="background-color:unset;">
                                                <div class="admin_button"><a href="{{ route('admin_form') }}" style="background-color:none; color:#7791DE;">申込ページへ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
                            <li><a href="{{ url('contact')}}">お問い合わせ</a></li>
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
                        <span class="copu-right-text">© All rights reserved by llco</span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <p></p>

        <a href="#" class="gotop">トップへ</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <!--自作のJS-->
    <script src="js/9-6-2.js"></script>
</body>

</html>
