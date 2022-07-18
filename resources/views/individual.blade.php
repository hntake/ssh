@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>個別データ検索画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

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

<div class="searchtable-responsive" >
    <div class="test">
      <h2 class="text-center">個別データ検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
        <form method="GET" action="{{ route('individual',['id' => $id])}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" >ユーザー名</label>
              <!--入力-->
              <div class="col-sm-5">
              <input type="text" name="searchWord" placeholder="検索したい生徒名を入力してください" value="{{ $searchWord }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">生徒検索</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($users))
    <div class="test-hover">
      <p>全{{ $users->count() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:20%">生徒名</th>
            <th style="width:10%">学年</th>
            <th style="width:20%">テスト履歴表示へ</th>
          </tr>
        </thead>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{$user->year }}</td>
          <td ><div  class="button"><a href="{{ route('id_view',['id'=>$user->id]) }}">表示</a></div></td>
        </tr>
        @endforeach
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{-- appendsでカテゴリを選択したまま遷移 --}}
      {{ $users->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
  </div>
 </div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
