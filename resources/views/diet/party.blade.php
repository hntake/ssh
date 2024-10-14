<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<title>Watch them! 国会議員監視サイト</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="このサイトでは、現役国会議員の不祥事データをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
<meta name="keywords" content="自民党,裏金問題,統一教会,国会議員,年齢順,衆議院,参議院,議員一覧,裏金">
<meta name="author" content="llco">
<meta name="robots" content="index, follow">
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
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
<meta name="twitter:image" content="https://eng50cha.com/img/diet_banner_new.png">
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
<link rel="apple-touch-icon" href="./apple-touch-icon.png" sizes="180x180">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrap">
    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
            <a href="https://twitter.com/share" class="twitter-share-button" data-text="国会議員監視サイト " data-url="{{ url('diet/vote') }}?v=1">Tweet</a>
        </blockquote>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <div class="container">
            <header id="header" class="header is-open">        

                <div class="header_inner">
                        <nav id="menu" class="header_nav">
                            <ul class="header_nav_list">
                                <li class="header_nav_itm">
                                    <a href="{{ url('diet/index') }}" class="header_nav_itm_link">不祥事度ランキング</a>
                                    <div class="description1">上位100人のランキング</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ url('diet/index') }}" class="header_nav_itm_link">議員一覧</a>
                                    <div class="description1">不祥事度高い順で表示されます</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'shu']) }}" class="header_nav_itm_link">衆議院</a>
                                    <div class="description1">衆議院議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'san']) }}" class="header_nav_itm_link">参議院</a>
                                    <div class="description1">参議院一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'bingo']) }}" class="header_nav_itm_link">ビンゴ議員</a>
                                    <div class="description1">裏金・統一教会・他不祥事全て関係する議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'bribe']) }}" class="header_nav_itm_link">裏金</a>
                                    <div class="description1">裏金疑惑の議員がその金額順で表示されます</div>
                                </li>
                                <li class="header_nav_itm">
                                        <a href="{{ route( 'diet_party',['id'=>'cult']) }}" class="header_nav_itm_link">統一教会</a>
                                        <div class="description1">統一教会との関係がある議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                        <a href="{{ route( 'diet_party',['id'=>'heredity']) }}" class="header_nav_itm_link">世襲議員</a>
                                        <div class="description1">世襲議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                        <a href="{{ url('diet/elect') }}" class="header_nav_itm_link">2024 総選挙情報</a>
                                        <div class="description1">2024 衆議院議員総選挙 候補者一覧</div>
                                </li>
                                <li>
                                <select onchange="window.location.href=this.value;">
                                    <option value="">ブロック別一覧</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hokkaido']) }}">北海道</option>
                                        <option value="{{ route( 'diet_party',['id'=>'touhoku']) }}">東北</option>
                                        <option value="{{ route( 'diet_party',['id'=>'Nkanto']) }}">北関東</option>
                                        <option value="{{ route( 'diet_party',['id'=>'Skanto']) }}">南関東</option>
                                        <option value="{{ route( 'diet_party',['id'=>'tokyo']) }}">東京</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hokuriku']) }}">北陸信越</option>
                                        <option value="{{ route( 'diet_party',['id'=>'tokai']) }}">東海</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kinki']) }}">近畿</option>
                                        <option value="{{ route( 'diet_party',['id'=>'chugoku']) }}">中国</option>
                                        <option value="{{ route( 'diet_party',['id'=>'shiokoku']) }}">四国</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kyuushu']) }}">九州</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hirei']) }}">比例</option>
                                </select>
                                </li>
                                <li>
                                <select onchange="window.location.href=this.value;">
                                    <option value="">党別一覧</option>
                                        <option value="{{ route('diet_party',['id'=>'jimin']) }}">自民党</option>
                                        <option value="{{ route('diet_party',['id'=>'koumei']) }}">公明党</option>
                                        <option value="{{ route('diet_party',['id'=>'rikken']) }}">立憲民主党</option>
                                        <option value="{{ route('diet_party',['id'=>'ishin']) }}">維教</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kyousan']) }}">日本共産党</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kokumin']) }}">国民民主党</option>
                                        <option value="{{ route( 'diet_party',['id'=>'reiwa']) }}">れいわ新選組</option>
                                </select>
                                </li>
                            </ul>
                        
                        </nav>
                </div>

                <div class="mobile-menu">
                    <div id="nav-drawer">
                        <input id="nav-input" type="checkbox" class="nav-unshown">
                        <label id="nav-open" for="nav-input"><span></span></label>
                        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                        <div id="nav-content">
                            <ul>
                                <li class="header_nav_itm">
                                    <a href="{{ url('diet/index') }}" class="header_nav_itm_link">不祥事度ランキング</a>
                                    <div class="description1">上位100人のランキング</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ url('diet/index') }}" class="header_nav_itm_link">議員一覧</a>
                                    <div class="description1">不祥事度高い順で表示されます</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'shu']) }}" class="header_nav_itm_link">衆議院</a>
                                    <div class="description1">衆議院議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'san']) }}" class="header_nav_itm_link">参議院</a>
                                    <div class="description1">参議院一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'bingo']) }}" class="header_nav_itm_link">ビンゴ議員</a>
                                    <div class="description1">裏金・統一教会・他不祥事全て関係する議員一覧</div>
                                </li>
                                <li class="header_nav_itm">
                                    <a href="{{ route( 'diet_party',['id'=>'bribe']) }}" class="header_nav_itm_link">裏金</a>
                                    <div class="description1">裏金疑惑の議員がその金額順で表示されます</div>
                                </li>
                                <li class="header_nav_itm">
                                        <a href="{{ route( 'diet_party',['id'=>'cult']) }}" class="header_nav_itm_link">統一教会</a>
                                        <div class="description1">統一教会との関係がある議員一覧</div>
                                </li>
                                <li>
                                <select onchange="window.location.href=this.value;">
                                    <option value="">ブロック別一覧</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hokkaido']) }}">北海道</option>
                                        <option value="{{ route( 'diet_party',['id'=>'touhoku']) }}">東北</option>
                                        <option value="{{ route( 'diet_party',['id'=>'Nkanto']) }}">北関東</option>
                                        <option value="{{ route( 'diet_party',['id'=>'Skanto']) }}">南関東</option>
                                        <option value="{{ route( 'diet_party',['id'=>'tokyo']) }}">東京</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hokuriku']) }}">北陸信越</option>
                                        <option value="{{ route( 'diet_party',['id'=>'tokai']) }}">東海</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kinki']) }}">近畿</option>
                                        <option value="{{ route( 'diet_party',['id'=>'chugoku']) }}">中国</option>
                                        <option value="{{ route( 'diet_party',['id'=>'shiokoku']) }}">四国</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kyuushu']) }}">九州</option>
                                        <option value="{{ route( 'diet_party',['id'=>'hirei']) }}">比例</option>

                                </select>
                                </li>
                                <li>
                                <select onchange="window.location.href=this.value;">
                                    <option value="">党別一覧</option>
                                        <option value="{{ route('diet_party',['id'=>'jimin']) }}">自民党</option>
                                        <option value="{{ route('diet_party',['id'=>'koumei']) }}">公明党</option>
                                        <option value="{{ route('diet_party',['id'=>'rikken']) }}">立憲民主党</option>
                                        <option value="{{ route('diet_party',['id'=>'ishin']) }}">維教</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kyousan']) }}">日本共産党</option>
                                        <option value="{{ route( 'diet_party',['id'=>'kokumin']) }}">国民民主党</option>
                                        <option value="{{ route( 'diet_party',['id'=>'reiwa']) }}">れいわ新選組</option>
                                </select>
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
            <div class="testtable-responsive">
            <div class="top_area">
                    <div class="banner">
                        <img src="/img/bad_banner.png" style="width:40%; height:auto; margin-top:8px;" alt="国会議員監視サイト 悪いねボタン">
                        <img src="/img/diet_banner_new.png" alt="国会議員監視サイト">
                    </div>
                    <div class="search">
                        <form method="GET" action="{{ route('diet_search')}}">
                            <div class="form-group row">
                                <!--入力-->
                                <div class="search">
                                <input type="text" class="form-control" name="search" placeholder="検索したい議員名を入力してください" class="search">
                                </div>
                                <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary ">議員検索</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
                @if($id=='jimin')
                <h1>自民党不祥事データ</h1>
                <h3>自民党平均不祥事度{{$average}}</h3>
                <p>自民党 議員一覧</p>
                @elseif($id=='rikken')
                <h1>立憲民主党不祥事データ</h1>
                <h3>立憲民主党平均不祥事度{{$average}}</h3>
                <p>立憲民主党 議員一覧</p>
                @elseif($id=='ishin')
                <h1>日本維新の会不祥事データ</h1>
                <h3>日本維新の会平均不祥事度{{$average}}</h3>
                <p>日本維新の会 議員一覧</p>
                @elseif($id=='kyousan')
                <h1>日本共産党不祥事データ</h1>
                <h3>日本共産党平均不祥事度{{$average}}</h3>
                <p>日本共産党 議員一覧</p>
                @elseif($id=='koumei')
                <h1>公明党不祥事データ</h1>
                <h3>公明党平均不祥事度{{$average}}</h3>
                <p>公明党 議員一覧</p>
                <h3>自民党平均不祥事度{{$average}}</h3>
                @elseif($id=='kokumin')
                <h1>国民民主党不祥事データ</h1>
                <h3>国民民主党平均不祥事度{{$average}}</h3>
                <p>国民民主党 議員一覧</p>
                @elseif($id=='reiwa')
                <h1>れいわ新選組不祥事データ</h1>
                <h3>れいわ新選組平均不祥事度{{$average}}</h3>
                <p>れいわ新選組 議員一覧</p>
                @elseif($id=='hokkaido')
                <h1>北海道エリア国会議員不祥事データ</h1>
                <h3>北海道エリア平均不祥事度{{$average}}</h3>
                <p>北海道エリア議員一覧</p>
                @elseif($id=='touhoku')
                <h1>東北エリア国会議員不祥事データ</h1>
                <h3>東北エリア平均不祥事度{{$average}}</h3>
                <p>東北エリア議員一覧</p>
                @elseif($id=='Nkanto')
                <h1>北関東エリア国会議員不祥事データ</h1>
                <h3>北関東エリア平均不祥事度{{$average}}</h3>
                <p>北関東エリア議員一覧</p>   
                @elseif($id=='Skanto')
                <h1>南関東エリア国会議員不祥事データ</h1>
                <h3>南関東エリア平均不祥事度{{$average}}</h3>
                <p>南関東エリア議員一覧</p>   
                @elseif($id=='tokyo')
                <h1>東京エリア国会議員不祥事データ</h1>
                <h3>東京エリア平均不祥事度{{$average}}</h3>
                <p>東京エリア議員一覧</p>   
                @elseif($id=='tokai')
                <h1>東海エリア国会議員不祥事データ</h1>
                <h3>東海エリア平均不祥事度{{$average}}</h3>
                <p>東海エリア議員一覧</p>   
                @elseif($id=='hokuriku')
                <h1>北陸信越エリア国会議員不祥事データ</h1>
                <h3>北陸信越エリア平均不祥事度{{$average}}</h3>
                <p>北陸信越エリア議員一覧</p>   
                @elseif($id=='kinki')
                <h1>近畿エリア国会議員不祥事データ</h1>
                <h3>近畿エリア平均不祥事度{{$average}}</h3>
                <p>近畿エリア議員一覧</p>
                @elseif($id=='chugoku')
                <h1>中国エリア国会議員不祥事データ</h1>
                <h3>中国エリア平均不祥事度{{$average}}</h3>
                <p>中国エリア議員一覧</p>  
                @elseif($id=='shikoku')
                <h1>四国エリア国会議員不祥事データ</h1>
                <h3>四国エリア平均不祥事度{{$average}}</h3>
                <p>四国エリア議員一覧</p>  
                @elseif($id=='kyuushu')
                <h1>九州エリア国会議員不祥事データ</h1>
                <h3>九州エリア平均不祥事度{{$average}}</h3>
                <p>九州エリア議員一覧</p>
                @elseif($id=='bingo')
                <h1>不祥事国会議員不祥事データ</h1>
                <h3>ビンゴ議員平均不祥事度{{$average}}</h3>
                <p>裏金＆統一教会＆他不祥事有りのビンゴ議員一覧</p>   
                @elseif($id=='cult')
                <h1>統一教会国会議員不祥事データ</h1>
                <h3>統一教会関係議員平均不祥事度{{$average}}</h3>
                <p>統一教会関係議員一覧</p>   
                @elseif($id=='bribe')
                <h1>裏金国会議員不祥事データ</h1>
                <h3>裏金議員平均不祥事度{{$average}}</h3>
                <p>裏金議員一覧</p>
                @elseif($id=='heredity')
                <h1>世襲国会議員不祥事データ</h1>
                <h3>世襲議員平均不祥事度{{$average}}</h3>
                <p>裏金議員一覧</p>
                @elseif($id=='hirei')
                <h1>比例ブロック国会議員不祥事データ</h1>
                <h3>比例ブロック平均不祥事度{{$average}}</h3>
                <p>比例ブロック議員一覧</p>
                @elseif($id=='san')
                <h1>参議院国会議員不祥事データ</h1>
                <h3>参議院平均不祥事度{{$average}}</h3>
                <p>参議院議員一覧</p>
                @elseif($id=='shu')
                <h1>衆議院国会議員不祥事データ</h1>
                <h3>衆議院平均不祥事度{{$average}}</h3>
                <p>衆議院議員一覧</p>
                @else
                @endif
                <table class="table-all">
                    <ul>
                        
                        <!--sort button-->
                        <li>
                        <form action="{{ route('diet_party_sort',['id'=>$id,'average'=>$average]) }}" method="GET">
                            @csrf
                            @if(isset($select))
                            <select name="diet_narabi">
                                <option value="scandal" {{ $select == 'scandal' ? 'selected' : '' }}>不祥事度高い順</option>
                                <option value="bad" {{ $select == 'bad' ? 'selected' : '' }}>悪いね！多い順</option>
                                <option value="old" {{ $select == 'old' ? 'selected' : '' }}>年齢順(高い順)</option>
                                <option value="young" {{ $select == 'young' ? 'selected' : '' }}>年齢順(若い順)</option>
                                <option value="asc" {{ $select == 'asc' ? 'selected' : '' }}>名前順(昇順)</option>
                                <option value="desc" {{ $select == 'desc' ? 'selected' : '' }}>名前順(降順)</option>
                            </select>
                            @else
                            <select name="diet_narabi">
                                <option value="scandal">不祥事度高い順</option>
                                <option value="bad">悪いね！多い順</option>
                                <option value="old">年齢順(高い順)</option>
                                <option value="young">年齢順(若い順)</option>
                                <option value="asc">名前順(昇順)</option>
                                <option value="desc">名前順(降順)</option>
                            </select>
                            @endif
                            <div class="form-group">
                                <div class="button">
                                    <input type="submit" value="で並び替え"></input>
                                </div>
                            </div>
                        </form>
                        </li>
                    </ul>
                    <thead>
                        <tr>
                            <th style="width:5%" class="pc">議院</th>
                            <th style="width:5%">会派</th>
                            <th style="width:10%" class="pc">選挙区</th>
                            <th style="width:20%">名前</th>
                            <th style="width:5%">年齢</th>
                            <th style="width:15%">裏金公表金額</th>
                            <th style="width:20%">不祥事度</th>
                            <th  style="width:5%">悪いね！数</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbl">
                        @foreach ($diets as $diet)
                        <tr>
                            <td class="pc">{{ $diet->type }}</td>
                            <td>{{ $diet->party }}</td>
                            <td class="pc">{{ $diet->area }}</td>
                            <td>{{ $diet->name }}</td>
                            <td>{{ $diet->age}}</td>
                            <td>{{ $diet->bribe}}</td>
                            <td>{{ $diet->scandal }}</td>
                            <td>{{ format_number($diet->bad) }}</td>
                            <td>
                                <div class="button"><a href="{{ route('diet_each',['id'=>$diet->id]) }}">表示</a></div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                {{ $diets->links() }}
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
</html>
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
