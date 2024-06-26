@extends('layouts.app')
<meta name="description" content="自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ">
<meta name="keywords" content="英語学習,発音学習,英単語,中学英語,高校英語,英検二級,英検一級,TOEIC">
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>テスト一覧 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
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
    <p>全リスト</p>
    <table class="table-all">
        <ul>
            <li>
                <form method="GET" action="{{ route('search_id')}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID番号</label>
                        <!--入力-->
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="searchId" placeholder="検索したいid番号を入力してください">
                        </div>
                        <div class="col-sm-auto">
                        <button type="submit" class="btn btn-primary ">テスト検索</button>
                        </div>
                    </div>
                </form>
            </li>
            <!--sort button-->
            <li>
                <form action="{{ route('sort') }}" method="GET">
                    @csrf
                    <select name="narabi">
                        <option value="asc">古い順</option>
                        <option value="desc">新しい順</option>
                    </select>
                    <div class="form-group">
                        <div class="button">
                            <input type="submit" value="で並び替え"></input>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
        <thead>
            <tr>
                <th style="width:5%">学年</th>
                <th style="width:10%">教科書名</th>
                <th style="width:20%">テスト名</th>
                <th style="width:5%">テストID</th>
                <th style="width:20%">作成者</th>
                <th style="width:20%">作成日時</th>
                <th style="width:10%"></th>
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
                <td>{{ $word->user_name }}</td>
                <td>{{\Carbon\Carbon::parse($word->created_at)->toDateString() }}</td>
                <td>
                    <div class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div>
                </td>
                <td>
                    <div class="test_button">
                        <a href="{{ route('livewire',['id'=>$word->id]) }}" target=”_blank”>学習ページへ</a>

                    </div>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{ $words->links() }}
</div>


@endsection
<a href="#" class="gotop">トップへ</a>
