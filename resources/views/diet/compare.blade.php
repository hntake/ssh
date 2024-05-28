<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<title>不祥事議員度党比較 Watch them! 国会議員監視サイト</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="このサイトでは、現役国会議員の不祥事データをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
<meta name="keywords" content="自民党  裏金問題 統一教会 落選運動 国会議員 年齢順 衆議院 参議院 議員一覧">
<meta name="author" content="llco">
<meta name="robots" content="index, follow">
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrap">
        <div class="container">
            <header id="header" class="header is-open">        

                <div class="header_inner">
                        <nav id="menu" class="header_nav">
                            <ul class="header_nav_list">

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
            <main>
                <h1>
                    国会議員不祥事度の党比較
                </h1>
                <div class="chart_container">
                @foreach($rankedData as $rank => $parties)
                    <ul class="chart">
                        <li class="rank-title">
                                <h2>第{{ $rank }}位</h2>
                            </li>
                            @foreach($parties as $party)
                            <li class="party-item">
                                <strong>{{ $party['party'] }}</strong>
                                <br>
                                平均不祥事度: {{ $party['average'] }}/{{ $party['count'] }}人中
                                <br>
                            </li>
                            <li class="chart-item">
                            <canvas id="myChart{{ $rank }}-{{ $party['party'] }}"></canvas>
                            </li> 
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </main>
            <div class="site-info">
                        <div class="widget">
                            <div class="copy-right">
                                <span class="copy-right-text">© All rights reserved by llco</span>
                            </div>
                        </div>
    </div>
        </div>
    </div>
   
    <script>
    // ページが読み込まれた後に実行される処理
    document.addEventListener("DOMContentLoaded", function() {
            @foreach($rankedData as $rank => $parties)
            @foreach($parties as $party)
            var ctx = document.getElementById('myChart{{ $rank }}-{{ $party["party"] }}').getContext('2d');

            var scandalCounts = [{{ $party['scandal'] }}, {{ $party['no_scandal'] }}];
            var labels = ['不祥事あり議員', '不祥事無し議員'];

            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: scandalCounts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Party: {{ $party["party"] }}'
                    }
                }
            });
        @endforeach
        @endforeach
    });
</script>
</body>
</html>
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
