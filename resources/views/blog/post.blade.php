<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブログ一覧|webアプリ制作会社llco</title>
    <link rel="stylesheet" href="{{asset('../css/blog.css')}}">
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

            <div class="header_inner">
                <nav id="menu" class="header_nav">


                <ul class="header_nav_list">
                        <li class="header_nav_itm">
                            <a href="{{url('/aboutus')}}" class=""><img src="../img/favicon500.png" style="width:30%; height:auto;"></a>
                        </li>
                        <li class="header_nav_itm">
                            <a href="{{ url('search_result') }}" class="header_nav_itm_link">テスト検索</a>
                            <div class="description1">エイゴメでテストを受けてみる</div>
                        </li>
                        <li class="header_nav_itm">
                            <a href="{{ url('feature') }}" class="header_nav_itm_link">エイゴメとは</a>
                            <div class="description1">エイゴメの使い方</div>
                        </li>
                        <li class="header_nav_itm">
                            <a href=https://itcha50.com/create_sort class="header_nav_itm_link">絵スケジュールを作成</a>
                            <div class="description1">VS4で絵スケジュールを作る</div>
                        </li>
                        <li class="header_nav_itm">
                            <a href=https://itcha50.com/feature class="header_nav_itm_link">VS4とは</a>
                            <div class="description1">VS4の使い方</div>
                        </li>
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
                <div class="pageheader">
                    <h1 class="pageheader_title">
                        <div class="jp">ブログ</div>
                        <div class="en">Blog</div>
                    </h1>
                </div>
                <div class="area">

                    <input type="radio" name="tab_name" id="tab2" checked>
                    <label class="tab_class" for="tab2">エイゴメ</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($eng as $engs)
                                <div class="all_blogs_item">

                                    <a href="{{ route('blog.page',['id'=>$engs->id]) }}">
                                        <h1>{{$engs->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($engs->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$engs->Category->category}}</h5>

                                        </li>
                                    </ul>
                                    <div class="thumbnail">
                                        @if(file_exists(public_path().'/storage/post_img/'. $engs->id .'.jpg'))
                                        <img src="/storage/post_img/{{ $engs->id }}.jpg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $engs->id .'.jpeg'))
                                        <img src="/storage/post_img/{{ $engs->id }}.jpeg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $engs->id .'.png'))
                                        <img src="/storage/post_img/{{ $engs->id }}.png">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $engs->id .'.gif'))
                                        <img src="/storage/post_img/{{ $engs->id }}.gif">
                                        @endif
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab3" checked>
                    <label class="tab_class" for="tab3">VS4</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($vs as $vss)
                                <div class="all_blogs_item">

                                    <a href="{{ route('blog.page',['id'=>$vss->id]) }}">
                                        <h1>{{$vss->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($vss->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$vss->Category->category}}</h5>

                                        </li>
                                    </ul>
                                    <div class="thumbnail">
                                        @if(file_exists(public_path().'/storage/post_img/'. $vss->id .'.jpg'))
                                        <img src="/storage/post_img/{{ $vss->id }}.jpg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $vss->id .'.jpeg'))
                                        <img src="/storage/post_img/{{ $vss->id }}.jpeg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $vss->id .'.png'))
                                        <img src="/storage/post_img/{{ $vss->id }}.png">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $vss->id .'.gif'))
                                        <img src="/storage/post_img/{{ $vss->id }}.gif">
                                        @endif
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab4" checked>
                    <label class="tab_class" for="tab4">etc</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($etc as $etcs)
                                <div class="all_blogs_item">

                                    <a href="{{ route('blog.page',['id'=>$etcs->id]) }}">
                                        <h1>{{$etcs->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($etcs->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$etcs->Category->category}}</h5>

                                        </li>
                                    </ul>
                                    <div class="thumbnail">
                                        @if(file_exists(public_path().'/storage/post_img/'. $etcs->id .'.jpg'))
                                        <img src="/storage/post_img/{{ $etcs->id }}.jpg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $etcs->id .'.jpeg'))
                                        <img src="/storage/post_img/{{ $etcs->id }}.jpeg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $etcs->id .'.png'))
                                        <img src="/storage/post_img/{{ $etcs->id }}.png">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $etcs->id .'.gif'))
                                        <img src="/storage/post_img/{{ $datas->id }}.gif">
                                        @endif
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="tab_name" id="tab1" checked>
                    <label class="tab_class" for="tab1">all</label>
                    <div class="content_class">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                                @foreach($data as $datas)
                                <div class="all_blogs_item">
                                    <a href="{{ route('blog.page',['id'=>$datas->id]) }}">
                                        <h1>{{$datas->title}}</h1>
                                    </a>
                                    <ul class="category_title">
                                        <li>
                                            <h5>{{\Carbon\Carbon::parse($datas->updated_at)->toDateString() }}</h5>
                                        </li>
                                        <li>
                                            <h5 style="color:black;">{{$datas->Category->category}}</h5>

                                        </li>
                                    </ul>
                                    <div class="thumbnail">
                                        @if(file_exists(public_path().'/storage/post_img/'. $datas->id .'.jpg'))
                                        <img src="/storage/post_img/{{ $datas->id }}.jpg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $datas->id .'.jpeg'))
                                        <img src="/storage/post_img/{{ $datas->id }}.jpeg">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $datas->id .'.png'))
                                        <img src="/storage/post_img/{{ $datas->id }}.png">
                                        @elseif(file_exists(public_path().'/storage/post_img/'. $datas->id .'.gif'))
                                        <img src="/storage/post_img/{{ $datas->id }}.gif">
                                        @endif
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="site-footer">
                <div class="bc-sitemap-wrapper">
                    <div class="sitemap clearfix">
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
                                    <li><a href="{{ url('faq')}}">エイゴメFAQ</a></li>
                                    <li><a href=https://itcha50.com/faq>VS4FAQ</a></li>
                                    <li><a href="{{ url('/admin/login')}}">管理者画面</a></li>                                </ul>
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
                                    <li><a href=https://itcha50.com/consumer>VS4特定商取引</a></li>                                </ul>
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

        </main>
</body>

</html>
