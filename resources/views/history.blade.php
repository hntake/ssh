@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>全履歴 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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
<div class="testtable-responsive">
    <p>利用履歴一覧</p>
    <table class="table-all">
        <thead>
            <tr>
                <th style="width:5%">テストID</th>
                <th style="width:5%">学年</th>
                <th style="width:15%">教科書名</th>
                <th style="width:15%">テスト名</th>
                <th style="width:15%">作成者</th>
                <th style="width:15%"></th>

            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($histories as $history)
            <tr>
                <td>{{ $history->test_id }}</td>
                <td>{{ $history->Type->type }}</td>
                <td>{{ $history->Textbook->textbook }}</td>
                <td>{{ $history->test_name }}</td>
                <td>{{ $history->user_name }}</td>
                <td>
                    <div class="button"><a style="padding:0" href="{{ route('test',['id'=>$history->test_id]) }}">表示</a></div>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{ $histories->links() }}
</div>
@endsection
<a href="#" class="gotop">トップへ</a>
