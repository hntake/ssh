@extends('layouts.app')
<meta name="description" content="このサイトでは、現役国会議員の不祥事データをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
<meta name="keywords" content="自民党,裏金問題,統一教会,国会議員,年齢順,衆議院,参議院,議員一覧,裏金">
<meta name="author" content="llco">
<meta name="robots" content="noindex">
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ITcha50">
<meta name="twitter:title" content="Watch them! 国会議員監視サイト">
<meta name="twitter:description" content="We can change! It’s time to change Japan now.">
<meta name="twitter:image" content="https://eng50cha.com/img/diet_banner_new.png">
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
<link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>

<title>{{$diet->name}}議員個別画面 Watch them!国会議員監視サイト</title>


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
                    <li><a href="{{ url('diet/elect') }}">
                        <h3 ontouchstart="">2024 衆議院議員総選挙</h3>
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
                <h1>国会議員監視サイト</h1>
            <div class="diet_container">
                <div class="left">
                    <div class="profile
                    @if($diet->scandal > 0 && $diet->heredity > 0) both-background 
                    @elseif($diet->scandal > 0) scandal-background 
                    @elseif($diet->heredity > 0) heredity-background 
                    @endif">
                        {{ $now }}
                        <p>時点</p>
                        <h3>議院：{{ $diet->type }}</h3>
                        <h3>会派：{{ $diet->party }}</h3>
                        <h3>選挙区：{{ $diet->area }}</h3>
                        <h3>議員名：{{ $diet->name }}</h3>
                        <h3>@if($diet->age)
                                    <td style="font-weight:bold;">{{ $diet->age}}歳</td>
                                    @endif
                                </h3>
                                <h3>登録不祥事度</h3>
                                <h3 style="font-weight:bold;">{{ $diet->scandal }}</h3>                        
                        <div class="image">
                            <div class="one">
                                <!-- <tr class="cell">
                                @if($diet->type=="衆議院")
                                <img src="https://www.shugiin.go.jp/internet/itdb_giinprof.nsf/html/profile/{{$diet->image}}.jpg/$File/{{$diet->image}}.jpg" alt="代替テキスト">
                                @elseif($diet->type=="参議院")
                                <img src="https://www.sangiin.go.jp/japanese/joho1/kousei/giin/photo/{{$diet->image}}.jpg" alt="代替テキスト">
                                @else
                                <img src="/img/icon_man.png" alt="man_icon">
                                @endif
                                </tr> -->
                                @if($diet->bribe > 0 || $diet->cult==1 || $diet->link > 0)
                                <tr>
                                <div class="bad_share">
                                    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
                                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="国会議員監視サイト {{$diet->name}} 当サイト登録不祥事度:{{ $diet->scandal }} 悪いね数:{{ $diet->bad }}" data-url="{{url('diet/each/'.$diet->id)}}?v=1">Tweet</a>
                                    </blockquote>
                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


                                </div>
                                
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
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="links">
                        <h3>当サイトに投稿され承認された不詳記事一覧</h3>
                        @if(count($links) > 0)
                            @foreach($links as $link)
                                @if($link->approved==1)
                                <h3><a href="{{$link->address}}">{{$link->title}}</a></h3>
                                @endif
                            @endforeach
                        @else
                        <p>現時点では当サイトには投稿されておりません</p>
                        @endif
                    </div>
                    <div class="add">
                        <img id="showFormBtn" src="../../img/add.png" alt="add" style="cursor:pointer;">
                        <img id="showFormBtn" src="../../img/click.png" alt="不祥事議員" style="cursor:pointer;">

                        <p>↑誰でも投稿できます！(管理サイドで承認後、反映されます)</p>
                        <p>※ 既にある情報はお避けください。</p>
                        <p>※ 情報は、新聞などのメディアや関係議員のブログなどで虚偽と取られない情報のみを承認します。</p>
                        <p>※ 当サイトでは個人の思想や意見に基づく発言は、不祥事の定義からは除外されています。他にも、牛歩等の議会戦術も過去の例を鑑みて除外します。</p>

                    </div>
                    <div id="formContainer" style="display: none;">
                        <form action="{{ route('diet_post',['id'=>$diet->id]) }}" method="post">
                            @csrf
                            <div class="add-link">
                                <table>
                                        <tbody>
                                            <div class="form-group">
                                                <label for="title">記事タイトル:</label>
                                                <input type="text" name="title" id="title" class="form-control" placeholder="記事タイトル" value="{{ old('title') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">リンクアドレス(※ソースがないものは投稿できません):</label>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="リンクアドレス" value="{{ old('address') }}">
                                            </div>
                                            <div class="form-group">
                                                <p>不祥事のジャンルを選んでください(※判定が難しい場合はその他を選んでください。)</p>
                                                {{ Form::select('genre', $genres, null, ['class' => 'form-control', 'id' => 'genre']) }}
                                            </div>

                                        </tbody>
                                </table>
                            </div>
                            <div class="check">
                                <button type="submit">
                                    作成
                                </button>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </form>
                </div>
            </div>
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





