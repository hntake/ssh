@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>正答 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('home') }}">
                        <h3>ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('history') }}">
                        <h3>全履歴</h3>
                    </a></li>
                <li><a href="{{ url('profile') }}">
                        <h3>Myページ</h3>
                    </a></li>
                <li><a href="{{ url('all_list') }}">
                        <h3>テスト一覧</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
                <li><a href="{{ url('search_result') }}">
                        <h3>テスト検索</h3>
                    </a></li>
                <li><a href="{{ url('search_user') }}">
                        <h3>ユーザー検索</h3>
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
<div class="testtable-responsive">
    <table class="table-all">
        <h1>テストID{{$word->id}}の正解です</h1>
        <thead>
            <tr>
                <th style="width:20%">番号</th>
                <th style="width:20%">問題</th>
                <th style="width:20%">答え</th>
            </tr>
        </thead>
        <tbody>
            <tr class="onetest">
                <td>1</td>
                <td>{{ $word->ja1}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en1}}</td>
            </tr>
            <tr class="onetest">
                <td>2</td>
                <td>{{ $word->ja2}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en2}}</td>
            </tr>
            <tr class="onetest">
                <td>3</td>
                <td>{{ $word->ja3}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en3}}</td>
            </tr>
            <tr class="onetest">
                <td>4</td>
                <td>{{ $word->ja4}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en4}}</td>
            </tr>
            <tr class="onetest">
                <td>5</td>
                <td>{{ $word->ja5}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en5}}</td>
            <tr class="onetest">
                <td>6</td>
                <td>{{ $word->ja6}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en6}}</td>
            </tr>
            <tr class="onetest">
                <td>7</td>
                <td>{{ $word->ja7}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en7}}</td>
            </tr>
            <tr class="onetest">
                <td>8</td>
                <td>{{ $word->ja8}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en8}}</td>
            </tr>
            <tr class="onetest">
                <td>9</td>
                <td>{{ $word->ja9}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en9}}</td>
            </tr>
            <tr class="onetest">
                <td>10</td>
                <td>{{ $word->ja10}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en10}}</td>
            </tr>
        </tbody>
    </table>
    <div class="button"><a href="{{ route('test',['id'=>$id]) }}">受けてみよう！</a>
    </div>
    <form class="form-inline" action="{{route('alert',['id'=>$id])}}" method="POST">
        @csrf
        <div class="check">
            <button type="submit" style="padding:10px;">
                <i class="fa fa-plus"></i> テストの間違い報告はここをクリック！
            </button>
        </div>
    </form>
</div>
@endsection
