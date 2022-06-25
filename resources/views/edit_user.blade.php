@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>プロフィール編集画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

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
<div class="edit" >
    <form method="POST" action="{{route('update_user',['id'=> $user->id])}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <table class="table-hover">
        <thead>
            <tr>
                <th style="width:20%">ユーザー名</th>
                <th style="width:20%">エリア</th>
                <th style="width:20%">生まれ年</th>
                <th style="width:20%">クラス番号</th>
                <th style="width:20%">メールアドレス</th>
            </tr>
        </thead>
             <tbody id="tbl">
                            <td><input type="text" name="user_name" value="{{ $user->user_name}}" class="form-control"></td>
                            <td><input type="text" name="place" value="{{ $user->place}}" class="form-control"></td>
                            <td><input type="text" name="year" value="{{ $user->year}}" class="form-control"></td>
                            <td><input type="text" name="school" value="{{ $user->school}}" class="form-control"></td>
                            <td><input type="text" name="email" value="{{ $user->email}}" class="form-control"></td>
            </tbody>
    </table>

    <div  class="button"><input type="submit" value="更新">
        <p>更新ボタンを押さないと変更されません</p>
    </div>

</div>
@endsection
