@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
@section('content')


<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
          <li><a href="{{ url('home') }}"><h3>ホーム画面に戻る</h3></a></li>
                <li><a href="{{ url('history') }}"><h3>全履歴</h3></a></li>
                <li><a href="{{ url('profile') }}"><h3>Myページ</h3></a></li>
                <li><a href="{{ url('all_list') }}"><h3>テスト一覧</h3></a></li>
                <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
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
<div class="table-responsive" >
    <p>ポイント数ランキング</p>
    <table class="table-hover">
        <thead>
            <tr>
                <th style="width:20%">ユーザー名</th>
                <th style="width:20%">総ポイント数</th>
                <th style="width:20%">更新日時</th>
            </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($users as $user)
            <tr>
                <td><a href="{{route('mypicture',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                <td>{{ $user->point }}</td>
                <td>{{ $user->updated_at}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>

    {{ $users->links() }}

</div>
@endsection
<a href="#" class="gotop">トップへ</a>
