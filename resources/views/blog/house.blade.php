<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$category->category}}ブログ一覧 </title>
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
        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script> -->
</head>

<body>
    <div class="wrapper">
        <header id="header" class="header is-open">

            <div class="header_inner">
                <a href="{{ $category->url }}">
                    <h3>{{$category->category}}ホームページに戻る</h3>
                </a>
            </div>

            <!--  ハンバーガーメニュー -->
            <div class="mobile-menu">
                <div id="nav-drawer">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input"><span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                        <ul class="">
                            <li><a href="{{ $category->url }}">
                                    <h3>ホームページに戻る</h3>
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
            <div class="page">
                <div class="pageheader">
                    <h1 class="pageheader_title">
                        <div class="jp">{{$category->category}}</div>
                        <div class="en">Blog</div>
                    </h1>
                </div>
                <div class="area">
                    <div>
                    @if($admin==true)
                    <a href="{{ route('blog.form') }}" class="button">
                        <p>ブログ新規作成</p>
                    </a>
                    @endif
                    </div>
                    <div class="content">
                        <div class="allBlogs">
                            <div class="allBlogs_list">
                            @foreach($houses as $house)
                                @if ($admin || $house->action == 0)  <!-- $adminがtrueの場合は全て表示、falseの場合はactionが0のみ -->
                                    <div class="all_blogs_item">
                                        <a href="{{ route('blog.page', ['id' => $house->id]) }}">
                                            @if($house->action == 1 && $admin)  <!-- $adminがtrueの場合のみ下書きを表示 -->
                                                <p>下書き</p>
                                            @endif
                                            <h1>{{ $house->title }}</h1>
                                        </a>
                                        <ul class="category_title">
                                            <li>
                                                <h5>{{ \Carbon\Carbon::parse($house->updated_at)->toDateString() }}</h5>
                                            </li>
                                        </ul>
                                        <div class="thumbnail">
                                            @if(file_exists(public_path() . '/storage/post_img/' . $house->id . '.jpg'))
                                                <img src="/storage/post_img/{{ $house->id }}.jpg">
                                            @elseif(file_exists(public_path() . '/storage/post_img/' . $house->id . '.jpeg'))
                                                <img src="/storage/post_img/{{ $house->id }}.jpeg">
                                            @elseif(file_exists(public_path() . '/storage/post_img/' . $house->id . '.png'))
                                                <img src="/storage/post_img/{{ $house->id }}.png">
                                            @elseif(file_exists(public_path() . '/storage/post_img/' . $house->id . '.gif'))
                                                <img src="/storage/post_img/{{ $house->id }}.gif">
                                            @endif
                                        </div>
                                        <!-- 削除ボタン -->
                                        <form action="{{ route('blog.delete', ['id' => $house->id]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button">削除</button>
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        </main>
</body>

</html>
