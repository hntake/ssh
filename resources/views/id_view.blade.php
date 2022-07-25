@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>個別画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

@section('content')


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
            <li><a href="{{ url('admin') }}"><h3>管理者画面に戻る</h3></a></li>
                <li><a href="{{ url('all_list') }}"><h3>テスト一覧</h3></a></li>
                <li><a href="{{ url('search_result') }}"><h3>テスト検索</h3></a></li>
                <li><a href="{{ url('search_user') }}"><h3>ユーザー検索</h3></a></li>
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
    <p>生徒履歴</p>
    <table class="table-all">
        <thead>
            <tr>
                <th style="width:10%">学年</th>
                <th style="width:20%">教科書名</th>
                <th style="width:20%">テスト名</th>
                <th style="width:20%">得点</th>
                <th style="width:20%">利用日時</th>

            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($histories as $history)
            <tr>
                <td>{{ $history->Type->type }}</td>
                <td>{{ $history->Textbook->textbook }}</td>
                <td>{{ $history->test_name }}</td>
                <td>{{ $history->score }}</td>
                <td>{{ $history->created_at}}</td>


                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
<a href="#" class="gotop">トップへ</a>
