@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>アラート一覧 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>
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
    <p>全リスト</p>
    <table class="table-all">
        <!--sort button-->
        <thead>
            <tr>
                <th style="width:5%">学年</th>
                <th style="width:10%">教科書名</th>
                <th style="width:20%">テスト名</th>
                <th style="width:5%">テストID</th>
                <th style="width:20%">作成者</th>
                <th style="width:20%">間違い</th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($words as $word)
            <tr>
                <td>{{ $word->Type->type }}</td>
                <td>{{ $word->Textbook->textbook }}</td>
                <td>{{ $word->test_name }}</td>
                <td>{{ $word->id }}</td>
                <td>{{ $word->user_name }}</td>
                <td>報告済み</td>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{ $words->links() }}
</div>
@endsection
<a href="#" class="gotop">トップへ</a>
