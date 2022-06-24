@if (!empty($results))
    <div class="test-hover">
      <p>全{{ $results->count() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
          <th style="width:5%">テストID</th>
                                            <th style="width:5%">学年</th>
                                            <th style="width:15%">教科書名</th>
                                            <th style="width:15%">レッスン名</th>
                                            <th style="width:15%">作成者</th>
                                            <th style="width:15%">利用者</th>
                                            <th style="width:15%">利用日</th>
                                            <th style="width:15%"></th>
          </tr>
        </thead>
        @foreach($results as $history)
        <tr>
        <td>{{ $history->test_id }}</td>
        <td>{{ $history->Type->type }}</td>
        <td>{{ $history->Textbook->textbook }}</td>
        <td>{{ $history->test_name }}</td>
        <td>{{ $history->user_name }}</td>
        <td>{{ $history->tested_name }}</td>
        <td>{{\Carbon\Carbon::parse($history->created_at)->toDateString() }}</td>
        <td ><div  class="button"><a href="{{ route('test',['id'=>$history->test_id]) }}">表示</a></div></td>
        </tr>
        @endforeach
      </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <!--  -->
    <!--ページネーションここまで-->
    @endif
