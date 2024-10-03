@extends('layouts.app')
<meta name="description" content="このサイトでは、現役国会議員の不祥事データをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
<meta name="keywords" content="自民党,裏金問題,統一教会,国会議員,年齢順,衆議院,参議院,議員一覧,裏金">
<meta name="author" content="llco">
<meta name="robots" content="index, follow">
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:type" content="website">
<meta property="og:title" content="Watch them! 国会議員監視サイト">
<meta property="og:description" content="We can change!  It's time to change Japan now.">
<meta property="og:image" content="https://eng50cha.com/img/diet_banner_new.png">
<meta property="og:url" content="https://eng50cha.com/diet/vote">
<meta property="og:site_name" content="Watch them! 国会議員監視サイト">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ITcha50">
<meta name="twitter:title" content="Watch them! 国会議員監視サイト">
<meta name="twitter:description" content="We can change! It's time to change Japan now.">
<meta name="twitter:image" content="https://eng50cha.com/img/diet_banner_new.png?4362984378">
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
<link rel="apple-touch-icon" href="./apple-touch-icon.png" sizes="180x180">

<title>2024 衆議院議員総選挙 選挙区:{{$id}}候補者一覧 </title>


<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
crossorigin="anonymous"></script>

@section('content')

<body>
    <div class="header-logo-menu">
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
            <ul>
                    <li><a href="{{ url('diet/vote') }}">
                            <h3 ontouchstart="">サイトトップページに戻る</h3>
                        </a></li>
                    <li><a href="{{ url('diet/index') }}">
                        <h3 ontouchstart="">不祥事度ランキング</h3>
                    </a></li>
                    <li><a href="{{ url('diet/all') }}">
                        <h3 ontouchstart="">議員一覧</h3>
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
        <div class="" style="display:block;">
            <div class="top">
                @if(Session::has('success'))
                <div class="alert alert-success blink">
                    {{ Session::get('success') }}
                </div>
                @endif
                </div>  
                <h1>2024 衆議院議員総選挙 選挙区:{{$id}}候補者一覧 </h1>
            <div class="diet_container_next">
                @foreach($diets as $diet)
                <div class="profile_next @if($diet->scandal > 0) scandal-background @endif" >
                @if($diet->type == '衆議院' || $diet->type == '参議院')
                    <h3>現職</h3>
                    @endif
                    <h3>会派：{{ $diet->party }}</h3>
                    <h3><a href="{{ route('diet_each',['id'=>$diet->id]) }}">議員名：{{ $diet->name }}</a></h3>
                    <h3>@if($diet->age)
                                <td>{{ $diet->age}}歳</td>
                           
                                @endif
                            </h3>
                    <h5>当サイト登録不祥事度：{{ $diet->scandal }}</h5>
                    <div class="image_next">
                        <div class="one">
                            <tr class="cell">
                            @if($diet->type=="衆議院")
                            <img src="https://www.shugiin.go.jp/internet/itdb_giinprof.nsf/html/profile/{{$diet->image}}.jpg/$File/{{$diet->image}}.jpg" alt="{{$diet->name}}">
                            @elseif($diet->type=="参議院")
                            <img src="https://www.sangiin.go.jp/japanese/joho1/kousei/giin/photo/{{$diet->image}}.jpg" alt="{{$diet->name}}">
                            @else
                            <img src="/img/icon_man.png" alt="man_icon">
                            @endif                            </tr> 
                            @if($diet->bribe > 0 || $diet->cult==1 || $diet->link > 0)
                            <tr>
                            
                            <!-- 「いいね」の数を表示 -->
                            <i class="fas fa-thumbs-down"></i> {{ $diet->bad }}
                            </tr>
                            @else
                            <h6>こちらの議員は不祥事が投稿されていない為、悪いねボタンは表示されません。</h6>
                            @endif
                        </div>
                        <div class="two">
                            <tr>
                            @if($diet->bribe > 0)
                            <img src="../../img/bribe.png" alt="裏金議員">
                            @endif
                            </tr>
                            <tr>
                            @if($diet->cult==1)
                            <img src="../../img/cult.png" alt="壺議員">
                            @endif
                            </tr> 
                            <tr>
                            @if($diet->link > 0)
                            <img src="../../img/list.png" alt="不祥事議員">
                            @endif
                            </tr>
                        </div>
                        <div class="copy">
                            <h3></h3>
                        </div>
                    </div>
                
                </div>
                @endforeach
        </div>
        <div class="site-info">
                    <div class="widget">
                        <div class="copy-right">
                            <span class="copy-right-text">© All rights reserved by llco</span>
                        </div>
                    </div>
    </div>
</body>
<script>
<script>
    function disableLink(link) {
        // リンクを無効化
        link.onclick = function(event) {
            event.preventDefault();
        };

        // 一定の時間後にリンクを有効化
        setTimeout(function() {
            link.onclick = null;
        }, 100000); // 1000ミリ秒 = 1秒
    }
</script>

</script>
<script>
    // ボタンのクリックイベントを設定
document.getElementById('showFormBtn').addEventListener('click', function() {
    // フォームの表示/非表示を切り替え
    var formContainer = document.getElementById('formContainer');
    if (formContainer.style.display === 'none') {
        formContainer.style.display = 'block';
    } else {
        formContainer.style.display = 'none';
    }
});

</script>
@endsection





