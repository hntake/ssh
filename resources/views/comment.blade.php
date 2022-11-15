@extends('layouts.app')

<title>講師コメント一覧 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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

<div class="searchtable-responsive">
    <div class="comment">
        <h2 class="text-center">講師コメント一覧画面</h2>
        <br>



        <div class="comment-hover">
            <p>全{{ $comments->count() }}件</p>
            <table class="table table-hover">
                <thead style="background-color: #ffd900">
                    <tr>
                        <th style="width:20%">生徒名</th>
                        <th style="width:10%">コメント</th>
                        <th style="width:20%">投稿日時</th>
                    </tr>
                </thead>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->updated_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <!--テーブルここまで-->
        <!--ページネーション-->
        <div class="d-flex justify-content-center">
            {{-- appendsでカテゴリを選択したまま遷移 --}}
            {{ $comments->appends(request()->input())->links() }}
        </div>
        <!--ページネーションここまで-->

    </div>
</div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
