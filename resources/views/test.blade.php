@extends('layouts.app')

<title>テスト画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="英単語テスト名：{{ $word->test_name}} {{ $word->Type->type}}レベル 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ">
<meta name="keywords" content="英語学習,発音学習,英単語,中学英語,高校英語,英検二級,英検一級,TOEIC">
<meta name="author" content="llco">
<meta name="robots" content="index, follow">
@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->

<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
        <ul>
                <li><a href="{{ url('home') }}">
                        <h3 ontouchstart="">ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('history') }}">
                        <h3 ontouchstart="">全履歴</h3>
                    </a></li>
                <li><a href="{{ url('profile') }}">
                        <h3 ontouchstart="">Myページ</h3>
                    </a></li>
                <li><a href="{{ url('all_list') }}">
                        <h3 ontouchstart="">テスト一覧</h3>
                    </a></li>
                <li><a href="{{ url('today') }}">
                        <h3 ontouchstart="">Today's TEST</h3>
                    </a></li>
                <li><a href="{{ url('today_listen') }}">
                        <h3 ontouchstart="">Today's リッスン</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3 ontouchstart="">新規作成</h3>
                    </a></li>
                <li><a href="{{ url('search_result') }}">
                        <h3 ontouchstart="">テスト検索</h3>
                    </a></li>
                <li><a href="{{ url('search_user') }}">
                        <h3 ontouchstart="">ユーザー検索</h3>
                    </a></li>
                <li><a href="{{ url('goal') }}">
                        <h3 ontouchstart="">目標設定</h3>
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

<div class="test">
    <form class="form-inline" action="{{route('result',['id'=>$id])}}" method="POST">
        @csrf
        @if (!empty($word))
        <table class="table-box" style="border:solid 1px gray; margin:0 auto;">
            <thead>
                <tr style="background-color:darkseagreen">
                    <th style="width:15%">テスト名</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <tr>
                    <td>{{ $word->test_name }}</td>
                </tr>
            </tbody>
            <table class="table-all">
                <thead>
                    <tr>
                        <th style="width:5%">番号</th>
                        <th style="width:30%">問題</th>
                        <th style="width:30%">答え</th>
                    </tr>
                </thead>
                <tbody id="tbl">
                    <tr class="onetest">
                        <td>1</td>
                        <td>{{ $word->ja1}}</td>
                        <td><input type="text" name="en1" id="en1" class="form-control" size="15" placeholder="英語で？" value="{{ old('en1') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>2</td>
                        <td>{{ $word->ja2}}</td>
                        <td><input type="text" name="en2" id="en2" class="form-control" size="15" placeholder="英語で？" value="{{ old('en2') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>3</td>
                        <td>{{ $word->ja3}}</td>
                        <td><input type="text" name="en3" id="en3" class="form-control" size="15" placeholder="英語で？" value="{{ old('en3') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>4</td>
                        <td>{{ $word->ja4}}</td>
                        <td><input type="text" name="en4" id="en4" class="form-control" size="15" placeholder="英語で？" value="{{ old('en4') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>5</td>
                        <td>{{ $word->ja5}}</td>
                        <td><input type="text" name="en5" id="en5" class="form-control" size="15" placeholder="英語で？" value="{{ old('en5') }}"></td>
                    <tr class="onetest">
                        <td>6</td>
                        <td>{{ $word->ja6}}</td>
                        <td><input type="text" name="en6" id="en6" class="form-control" size="15" placeholder="英語で？" value="{{ old('en6') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>7</td>
                        <td>{{ $word->ja7}}</td>
                        <td><input type="text" name="en7" id="en7" class="form-control" size="15" placeholder="英語で？" value="{{ old('en7') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>8</td>
                        <td>{{ $word->ja8}}</td>
                        <td><input type="text" name="en8" id="en8" class="form-control" size="15" placeholder="英語で？" value="{{ old('en8') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>9</td>
                        <td>{{ $word->ja9}}</td>
                        <td><input type="text" name="en9" id="en9" class="form-control" size="15" placeholder="英語で？" value="{{ old('en9') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>10</td>
                        <td>{{ $word->ja10}}</td>
                        <td><input type="text" name="en10" id="en10" class="form-control" size="15" placeholder="英語で？" value="{{ old('en10') }}"></td>
                    </tr>
                    <input type="hidden" name="user_name" value="{{$id}}">


                </tbody>


            </table>
            @if ($errors->any())
            <p class="error-message">!! 空欄がないようにしてください !!</p>
            @endif
            <div class="check">
                <button type="submit" style="padding:10px;">
                    <i class="fa fa-plus"></i> 採点する
                </button>
            </div>
    </form>
    <div class="button"><a href="{{ route('answer',['id'=>$id]) }}">正解はこちら</a></div>

</div>


@else
<p>テストは削除されました。</p>
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
@endif
@endsection
