@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>テスト検索画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

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

<div class="searchtable-responsive">
    <div class="test">
        <br>
        <h2 class="text-center">テスト検索画面</h2>
        <br>
        <!--検索フォーム-->
        <div class="row">
            <div class="col-sm">
                <form method="GET" action="{{ route('search_result')}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">テスト名</label>
                        <!--入力-->
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
                        </div>
                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-primary ">テスト検索</button>
                        </div>
                    </div>
                    <!--プルダウンカテゴリ選択-->
                    <div class="form-group row">
                        <label class="col-sm-2">学年カテゴリ</label>
                        <div class="col-sm-3">
                            <select name="typeId" class="form-control" value="{{ $typeId }}">
                                <option value="">未選択</option>

                                @foreach($types as $id => $type)
                                <option value="{{ $id }}">
                                    {{ $type}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">教科書カテゴリ</label>
                        <div class="col-sm-3">
                            <select name="textbookId" class="form-control" value="{{ $textbookId }}">
                                <option value="">未選択</option>

                                @foreach($textbooks as $id => $textbook)
                                <option value="{{ $id }}">
                                    {{ $textbook}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($words))

    <div class="test-hover">
        <p>全{{ $words->count() }}件</p>
        <p class="only">※※クリックすると別タブで開きます※※</p>

        <table class="table table-hover">
            <thead style="background-color: #ffd900">
                <tr>
                    <th style="width:20%">テスト名</th>
                    <th style="width:5%">学年カテゴリ</th>
                    <th style="width:10%">教科書名</th>
                    <th style="width:20%">作成者</th>
                    <th style="width:10%"></th>
                    <th style="width:10%">会員のみ</th>
                    <th style="width:10%">会員のみ</th>

                </tr>
            </thead>
            @foreach($words as $word)


            <tr>
                <td>{{ $word->test_name }}</td>
                <td>{{ $word->Type->type }}</td>
                <td>{{ $word->Textbook->textbook }}</td>
                <td>{{ $word->user_name}}</td>
                <td>
                    <div class="test_button" ontouchstart="">
                        <a href="{{ route('test',['id'=>$word->id]) }}" target=”_blank”>テスト表示</a>

                    </div>
                </td>
                <td>
                    <div class="test_button" ontouchstart="">
                        <a href="{{ route('livewire',['id'=>$word->id]) }}" target=”_blank”>学習ページへ</a>
                    </div>
                </td>
                <td>
                <iframe name="votar" style="display:none;" ></iframe>
                    <form method="POST" action="{{ route('later',['id'=>$word->id])}}" target="votar">
                    @method('patch')
                    @csrf
                    <div x-data="{ show: false }">
                        <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }">
                        あとでに保存する
                        </button>

                    </div>
                    </form>

                </td>
                @endforeach

            </tr>
        </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $words->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
</div>

@endif
@endsection
<a href="#" class="gotop">トップへ</a>
