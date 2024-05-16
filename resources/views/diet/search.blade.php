<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<title>Watch them 検索結果画面</title>
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
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ITcha50">
<meta name="twitter:title" content="Watch them! 国会議員監視サイト">
<meta name="twitter:description" content="We can change! It’s time to change Japan now.">
<meta name="twitter:image" content="https://eng50cha.com/img/diet_banner_new.png">
<link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
<link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
crossorigin="anonymous"></script>
</head>

<div class="wrap">
    <div class="container">

        <div class="header-logo-menu">
            <div id="nav-drawer">
                <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content">
                    <ul>
                    <li>
                        <li><a href="{{ url('diet/index') }}">
                            <h3>サイトトップページへ戻る</h3>
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
        @if (!empty($diets))
        <div class="testtable-responsive">
            <h1>国会議員監視サイト 検索結果</h1>
            <p>全{{ $diets->count() }}件</p>
            <table class="table-all">
                    <thead>
                        <tr>
                            <th style="width:5%">会派</th>
                            <th style="width:10%">選挙区</th>
                            <th style="width:20%">名前</th>
                            <th style="width:5%">年齢</th>
                            <th style="width:5%">不祥事数</th>
                            <th style="width:5%"></th>

                        </tr>
                    </thead>
                    <tbody id="tbl">
                    @foreach($diets as $diet)
                            <tr>
                                <td>{{ $diet->party }}</td>
                                <td>{{ $diet->area }}</td>
                                <td>{{ $diet->name }}</td>
                                <td>{{ $diet->age}}</td>
                                <td>{{ $diet->scandal }}</td>
                                <td>
                                    <div class="button"><a href="{{ route('diet_each',['id'=>$diet->id]) }}">表示</a></div>
                                </td>
                                @endforeach
                            </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<!--テーブルここまで-->
<!--ページネーション-->
<!--  -->
<!--ページネーションここまで-->
@endif
