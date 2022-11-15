@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>ポイントランキング 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li>
                <li><a href="{{ url('admin') }}">
                        <h3>管理者画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('all_list') }}">
                        <h3>テスト一覧</h3>
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
    <p>ポイント数ランキング</p>
    <table class="table-hover">
        <thead>
            <tr>
                <th style="width:20%">ユーザー名</th>
                <th style="width:20%">エリア</th>
                <th style="width:20%">学年</th>
                <th style="width:20%">総ポイント数</th>
                <th style="width:20%">更新日時</th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($users as $user)
            <tr>
                <td><a href="{{route('mypicture',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                <td>{{ $user->place }}</a></td>
                <td>{{ $user->year}}</a></td>
                <td>{{ $user->point }}</td>
                <td>{{\Carbon\Carbon::parse($user->created_at)->toDateString() }}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

    {{ $users->links() }}

</div>
@endsection
<a href="#" class="gotop">トップへ</a>
