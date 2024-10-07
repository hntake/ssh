<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>選挙に行こう！ - 不祥事議員を避けるための情報サイト</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        #main-content {
            padding: 1rem;
            background: #fff;
            margin-top: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .call-to-action {
            background: #28a745;
            color: white;
            padding: 1rem;
            text-align: center;
            margin-top: 1rem;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .call-to-action:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>選挙に行こう！</h1>
        <p>不祥事議員を避け、清廉な議員を選ぶための情報サイト</p>
    </header>
    <div class="container">
        <section id="main-content">
        <div class="top_area">
                        <div class="banner" style="background-color:green;">
                            <img src="../img/Thank.png" style="width:90%; height:auto; margin:8px; background-color:green;" alt="選挙に行こう">
                        </div>
            </div>
            <h2>Watch them! 国会議員監視サイトページ一覧</h2>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ページ名</th>
                        <th>ページ内容</th>
                    </tr>
                </thead>
                <tbody id="scandal-data">
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ url('diet/elect') }}"><h3>2024 衆議院議員総選挙</h3></a></div>
                        </td>
                        <td>不祥事議員に要注意！選挙区別候補者一覧</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route('diet_index') }}"><h3>不祥事度ランキング上位100名</h3></a></div>
                        </td>
                        <td>当サイトで登録された不祥事を数値化した合計数=不祥事度。数値が高い上位100名をランキング表示!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route('chart') }}"><h3>不祥事議員度 党比較</h3></a></div>
                        </td>
                        <td>当サイトでの登録による国会議員不祥事度での党比較をグラフで表示</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route('diet_all') }}"><h3>国会議員一覧</h3></a></div>
                        </td>
                        <td>現役国会議員の不祥事以外も年齢や選挙区などのデータ一覧。不祥事数や悪いね数の並び替えもできます。</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'bribe']) }}"><h3>裏金国会議員一覧</h3></a></div>
                        </td>
                        <td>裏金報道されている議員一覧。他の不祥事も見れます。</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'bingo']) }}"><h3>ビンゴ国会議員一覧</h3></a></div>
                        </td>
                        <td>統一教会、裏金、そして他にも不祥事がある議員を当サイトではビンゴ議員と呼んでいます。</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'cult']) }}"><h3>統一教会関係国会議員一覧</h3></a></div>
                        </td>
                        <td>統一教会と関係がある議員の他の不祥事も見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'shu']) }}"><h3>衆議院国会議員一覧</h3></a></div>
                        </td>
                        <td>衆議院の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'san']) }}"><h3>参議院国会議員一覧</h3</a></div>
                        </td>
                        <td>参議院の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'hokkaido']) }}"><h3>北海道選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>北海道選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'touhoku']) }}"><h3>東北選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>東北選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>    
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'Nkanto']) }}"><h3>北関東選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>北関東選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>    
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'Skanto']) }}"><h3>南関東選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>南関東選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>    
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'tokyo']) }}"><h3>東京選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>東京選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'hokuriku']) }}"><h3>北陸信越選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>北陸信越選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'tokai']) }}"><h3>東海選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>東海選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                    <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'kinki']) }}"><h3>近畿選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>近畿選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr> <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'chugoku']) }}"><h3>中国選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>中国選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr> <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'shiokoku']) }}"><h3>四国選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>四国選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr> <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'kyuushu']) }}"><h3>九州選挙区国会議員一覧</h3></a></div>
                        </td>
                        <td>九州選挙区の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr> <tr>
                        <td>
                        <div class="call-to-action" ><a href="{{ route( 'diet_party',['id'=>'hirei']) }}"><h3>比例による選出国会議員一覧</h3></a></div>
                        </td>
                        <td>比例選出の不祥事議員は誰でしょう？見てみましょう!</td>
                    </tr>
                </tbody>
            </table>
            <div class="" >
                <h3>選挙に行って、不祥事のない議員を選びましょう！</h3>
            </div>
        </section>
        <div class="site-info">
                    <div class="widget">
                        <div class="copy-right">
                            <span class="copy-right-text">© All rights reserved by llco</span>
                        </div>
                    </div>
    </div>
    </div>
    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
            <a href="https://twitter.com/share" class="twitter-share-button" data-text="国会議員監視サイト " data-url="{{ url('diet/vote') }}?v=1">Tweet</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
   
</body>
</html>
