<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if($data->category > 9)
    <title>ブログ {{$data->Category->category}} {{$data->title}}</title>
    @else
    <title>ブログ webアプリ制作会社llco {{$data->title}}</title>
    @endif
    <link rel="stylesheet" href="{{asset('../css/page.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <header id="header" class="header is-open">


            <!--  ハンバーガーメニュー -->
            <div class="mobile-menu">
                <div id="nav-drawer">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input"><span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                        @if($data->category > 9)
                        <ul class="">
                            <li><a href="{{ $category->url }}">
                                    <h3>ホームページに戻る</h3>
                                </a></li>
                        </ul>
                        @else
                        <ul class="">
                            <li><a href="{{ url('search_result') }}">
                                    <h3>テスト検索</h3>
                                </a></li>
                            <li><a href="{{ url('feature') }}">
                                    <h3>エイゴメとは</h3>
                                </a></li>
                            <li><a href=https://itcha50.com/create_sort>
                                    <h3>絵スケジュールを作成</h3>
                                </a></li>
                            <li><a href=https://itcha50.com/feature>
                                    <h3>VS4とは</h3>
                                </a></li>
                        </ul>
                        @endif
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
        <main>
            <div class="pagecontainer">

                <div class="area">
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                <div class="all_blogs_item">
                                    <div class="category_title">
                                        <h5 style="color:black;">{{$data->Category->category}}</h5>
                                    </div>
                                    <h1>{{$data->title}}</h1>
                                    <div class="date">
                                        <h5>{{\Carbon\Carbon::parse($data->updated_at)->toDateString() }}</h5>
                                    </div>
                                    <div class="blog_main">
                                        <h5>{!!$data->main!!}</h5>
                                    </div>
                                    <div class="thumbnail">
                                        @if(file_exists(public_path().'/storage/post_img/'. $data->id .'.jpg'))
                                        <img src="/storage/post_img/{{ $data->id }}.jpg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $data->id .'.jpeg'))
                                        <img src="/storage/post_img/{{ $data->id }}.jpeg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $data->id .'.png'))
                                        <img src="/storage/post_img/{{ $data->id }}.png">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $data->id .'.gif'))
                                        <img src="/storage/post_img/{{ $data->id }}.gif">
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @if($data->category > 9)
            <footer class="site-footer">
                <div class="bc-sitemap-wrapper">
                    <div class="sitemap clearfix">
                        <div class="site-info">
                            <div class="widget">
                            <div class="call" style="border:1px bold black; background-color: lightblue; text-align: center;">
                                <a href="mailto:{{$category->email}}?subject=%E3%81%8A%E5%95%8F%E3%81%84%E5%90%88%E3%82%8F%E3%81%9B&amp;body=%E4%BB%A5%E4%B8%8B%E3%81%AB%E3%81%94%E8%A8%98%E5%85%A5%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%0A%0A%E5%90%8D%E5%89%8D%EF%BC%9A%0A%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A" style="font-weight:bold;">相談メール</a>
                                <h5 style="margin:0;">クリック！</h5>
                            </div>    
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
            @else
            <footer class="site-footer">
                <div class="bc-sitemap-wrapper">
                    <div class="sitemap clearfix">
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">関連情報</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ url('blog/index')}}">ブログ</a></li>
                                    <l><a href="{{ url('news/index')}}">お知らせ</a></li>
                                        <li><a href="{{ url('partner')}}">エイゴメパートナー</a></li>
                                        <li><a href=https://itcha50.com/partner>VS4パートナー</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="nav_menu2" class="widget_nav_menu">
                            <h2 class="widget-title">サポート</h2>
                            <div class="menu-site-map-1-container">
                                <ul id="menu-site-map-1" class="menu">
                                    <li><a href="{{ route('contact.index')}}">お問い合わせ</a></li>
                                    <li><a href="{{ url('faq')}}">エイゴメFAQ</a></li>
                                    <li><a href=https://itcha50.com/faq>VS4FAQ</a></li>
                                    <li><a href="{{ url('/admin/login')}}">管理者画面</a></li>
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
                                    <li><a href="{{ url('consumer')}}">エイゴメ特定商取引</a></li>
                                    <li><a href=https://itcha50.com/consumer>VS4特定商取引</a></li>
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
            @endif
        </main>
</body>

</html>
