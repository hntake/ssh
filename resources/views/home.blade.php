@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>ホーム画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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
<div class="wrap">
    <div class="testtable-responsive">
        <h2>マイステータス</h2>
        <ul>
            <li class="blink" style="color:red; font-weight:bold;">ポイント数：{{$user->point}}</li>
            <li>レベル：{{$user->level}}</li>
        </ul>
        <div class="comment" style="background-color:white; width:80%;margin:0 auto;">
            <h2>講師からの連絡</h2>
            <ul>
                <li style="color:red; font-weight:bold;">{{$user->comment}}</li>
            </ul>
        </div>
    </div>

    <div class="testtable-responsive">
        <p>My履歴</p>
        <p class="only">※※クリックすると別タブで開きます※※</p>
        <table class="table-all">
            <thead style="display:contents;">
                <tr>
                    <th style="width:20%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:20%">作成者</th>
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
                    <td>{{ $word->user_name }}</td>
                    <td>
                        <div class="test_button">
                            <a href="{{ route('test',['id'=>$word->id]) }}" target=”_blank”>テスト表示</a>

                        </div>
                    </td>
                    <td>
                        <div class="test_button">
                            <a href="{{ route('study',['id'=>$word->id]) }}" target=”_blank”>学習ページへ</a>

                        </div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    <div class="testtable-responsive">
        <p>MyScore(最新順)</p>
        <table class="table-all">
            <thead style="display:contents;">
                <tr>
                    <th style="width:20%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:20%">得点</th>

                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->Type->type }}</td>
                    <td>{{ $history->Textbook->textbook }}</td>
                    <td>{{ $history->test_name }}</td>
                    <td>{{ $history->score }}</td>

                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <div class="testtable-responsive">
        <p>Myフォロー</p>
        <p class="only">※※クリックすると別タブで開きます※※</p>
        <table class="table-all">
            <thead style="display:contents;">
                <tr>
                    <th style="width:20%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:20%">作成者</th>
                    <th style="width:10%"></th>
                    <th style="width:10%"></th>

                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($ftests as $ftest)
                <tr>
                    <td>{{ $ftest->Type->type }}</td>
                    <td>{{ $ftest->Textbook->textbook }}</td>
                    <td>{{ $ftest->test_name }}</td>
                    <td>{{ $ftest->user_name }}</td>
                    @if($ftest -> created_at > $date)
                    <td>
                        <img src="img/new.png" alt="new" style="width:30px; height:auto;">
                        <div class="button"><a href="{{ route('test',['id'=>$ftest->id]) }}">表示</a></div>
                    </td>
                    @else
                    <td>
                        <div class="button"><a href="{{ route('test',['id'=>$ftest->id]) }}">表示</a></div>
                    </td>
                    <td>
                        <div class="test_button">
                            <a href="{{ route('study',['id'=>$word->id]) }}" target=”_blank”>学習ページへ</a>

                        </div>
                    </td>
                    @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <div class="testtable-responsive">
        <p>おススメ</p>
        <p class="only">※※クリックすると別タブで開きます※※</p>
        <table class="table-all">
            <thead style="display:contents;">
                <tr>
                    <th style="width:20%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:20%">作成者</th>
                    <th style="width:10%"></th>
                    <th style="width:10%"></th>

                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($counts as $count)
                <tr>
                    <td>{{ $count->Type->type }}</td>
                    <td>{{ $count->Textbook->textbook }}</td>
                    <td>{{ $count->test_name }}</td>
                    <td>{{ $count->user_name }}</td>
                    <td>
                        <div class="button"><a href="{{ route('test',['id'=>$count->id]) }}">表示</a></div>
                    </td>
                    <td>
                        <div class="test_button">
                            <a href="{{ route('study',['id'=>$word->id]) }}" target=”_blank”>学習ページへ</a>

                        </div>
                    </td>

                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
<a href="#" class="gotop">トップへ</a>
