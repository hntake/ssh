@extends('layouts.app')

<title>個別画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- word.cssと連携 -->


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
<div class="wrap">
    <div class="id_view">
    <div class="comment">
        <p>前回の投稿</p>
        <table class="table-all">
                <thead>
                    <tr>
                        <th style="width:10%">生徒名</th>
                        <th style="width:10%">作成日時</th>
                        <th style="width:20%">投稿内容</th>

                    </tr>
                </thead>
                <tbody id="tbl">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->updated_at}}</td>
                        <td>{{ $user->comment}}</td>
                    </tr>
                </tbody>
            </table>

            <p>新しい投稿</p>
            <form class="form-inline" action="{{route('comment',['id'=>$id])}}" method="POST">
            @csrf
                <input type="text" name="comment" id="comment" class="form-control" size="150" placeholder="" value="{{ old('comment') }}" style="width: 400px; height: 100px;">
                <div class="check">
                        <button type="submit" >
                            投稿
                        </button>
                </div>
            </form>
    </div>
        <div class="testtable-responsive">
        <p>{{$user->name}} 履歴(最新順)</p>
        @endforeach

        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width:10%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:10%">テストID</th>
                    <th style="width:10%">得点</th>
                    <th style="width:20%">利用日時</th>

                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->Type->type }}</td>
                    <td>{{ $history->Textbook->textbook }}</td>
                    <td>{{ $history->test_name }}</td>
                    <td>{{ $history->test_id }}</td>
                    <td>{{ $history->score }}</td>
                    <td>{{ $history->created_at}}</td>


                    @endforeach
                </tr>
            </tbody>
        </table>
        </div>
        <div class="testtable-responsive">
            <p>生徒作成テスト</p>
            <table class="table-all">
                <thead>
                    <tr>
                        <th style="width:10%">学年</th>
                        <th style="width:20%">教科書名</th>
                        <th style="width:20%">テスト名</th>
                        <th style="width:10%">テストID</th>
                        <th style="width:20%">作成日時</th>
                        <th style="width:10%"></th>

                    </tr>
                </thead>
                <tbody id="tbl">
                    @foreach ($words as $word)
                    <tr>
                        <td>{{ $word->Type->type }}</td>
                        <td>{{ $word->Textbook->textbook }}</td>
                        <td>{{ $word->test_name }}</td>
                        <td>{{ $word->id }}</td>
                        <td>{{ $word->created_at}}</td>
                        <td>
                            <div class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div>
                        </td>

                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection
</div>
<a href="#" class="gotop">トップへ</a>
