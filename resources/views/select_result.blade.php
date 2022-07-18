<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>データ抽出画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
          <li><li><a href="{{ url('admin') }}"><h3>管理者画面に戻る</h3></a></li>
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
  </div>@if (!empty($results))
<div class="test-hover">
  <p>全{{ $results->count() }}件</p>
  <table class="table table-hover" style=" width:80%;">
    <thead style="background-color: #ffd900;">
      <tr>
        <th style="width:5%">テストID</th>
        <th style="width:5%">学年</th>
        <th style="width:15%">教科書名</th>
        <th style="width:15%">テスト名</th>
        <th style="width:15%">利用者</th>
        <th style="width:5%">得点</th>
        <th style="width:15%">利用日</th>
        <th style="width:15%"></th>
      </tr>
    </thead>
    @foreach($results as $history)
    <tr style="height:50px;">
      <td>{{ $history->test_id }}</td>
      <td>{{ $history->Type->type }}</td>
      <td>{{ $history->Textbook->textbook }}</td>
      <td>{{ $history->test_name }}</td>
      <td>{{ $history->tested_name }}</td>
      <td>{{ $history->score }}</td>
      <td>{{\Carbon\Carbon::parse($history->created_at)->toDateString() }}</td>
      <td>
        <div class="button"><a href="{{ route('test',['id'=>$history->test_id]) }}">利用テスト表示</a></div>
      </td>
    </tr>
    @endforeach
  </table>
</div>
<!--テーブルここまで-->
<!--ページネーション-->
<!--  -->
<!--ページネーションここまで-->
@endif
