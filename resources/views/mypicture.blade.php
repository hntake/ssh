@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>プロフィール画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


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
<div class="profile">

    <h3>ユーザー名<br>：{{ $user->user_name }}</h3>
    <h3>エリア：{{ $user->place }}</h3>
    <h3>学年：{{ $user->year }}</h3>
    {{ $user->updated_at }}
    <p>時点</p>
    <p>総ポイント数（{{ $user->point }}）</p>
    <div class="image">
        <tr class="cell">
            @if(!$user->image == null)
            <td><img src="{{ asset('storage/' . $user->image) }}" alt="image">
            <td>
                @else
            <td><img src="/img/icon_man.png" alt="man_icon"></td>
            @endif
        </tr>
    </div>
    <span class="follow">

        <!-- もし$niceがあれば＝ユーザーが「フォローする」をしていたら -->
        @if($nice)
        <!-- 「フォローする」取消用ボタンを表示 -->
        <p>フォロー中</p>
        <a href="{{ route('unnice',['id'=>$user->id]) }}" class="follow" style="background-color:lightgray;">
            フォローをやめる
            <!-- 「いいね」の数を表示 -->
        </a><br>
        <span class="badge">
            フォロワー数 {{ $count }}
        </span>
        @else

        <!-- まだユーザーが「フォローする」をしていなければ、「フォローする」ボタンを表示 -->
        <a href="{{ route('nice', ['id'=>$user->id]) }}" class="follow">
            フォローする
        </a><br>
        <!-- 「いいね」の数を表示 -->
        <span class="badge">
            フォロワー数{{ $count }}
        </span>
        @endif
    </span>
</div>
<div class="table-responsive">
    <p>作成一覧</p>
    <table class="table-all">
        <thead>
            <tr>
                <th style="width:10%">学年</th>
                <th style="width:20%">教科書名</th>
                <th style="width:20%">テスト名</th>
                <th style="width:15%"></th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($words as $word)
            <tr>
                <td>{{ $word->Type->type }}</td>
                <td>{{ $word->Textbook->textbook }}</td>
                <td>{{ $word->test_name }}</td>
                <td>
                    <div class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div>
                </td>

                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
