@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>テストID検索画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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

<div class="searchtable-responsive">
  <div class="test">
    <br>
    <h2 class="text-center">テスト検索画面</h2>
    <br>
    <!--検索フォーム-->

  </div>

  <!--検索結果テーブル 検索された時のみ表示する-->
  @if (!empty($word))
  <div class="test-hover">
    <table class="table table-hover">
      <thead style="background-color: #ffd900">
        <tr>
          <th style="width:20%">テスト名</th>
          <th style="width:20%">学年カテゴリ</th>
          <th style="width:20%">教科書名</th>
          <th style="width:20%">作成者</th>
          <th style="width:20%"></th>
        </tr>
      </thead>
      <tr>
        <td>{{ $word->test_name }}</td>
        <td>{{ $word->Type->type }}</td>
        <td>{{ $word->Textbook->textbook }}</td>
        <td>{{ $word->user_name}}</td>
        <td>
          <div class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div>
        </td>
      </tr>
    </table>
  </div>
  <!--テーブルここまで-->

  @endif
</div>
</div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
