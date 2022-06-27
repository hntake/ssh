@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>プロフィール画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

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
  <div class="profile">

    <h3>ユーザー名<br>：{{ $user->user_name }}</h3>
    <h3>エリア：{{ $user->place }}</h3>
    <h3>Born in：{{ $user->year }}</h3>
        {{ $user->updated_at }}<p>時点</p>
           <p>総ポイント数（{{ $user->point }}）</p>
          <div class="image">
            <tr class="cell">
                 @if(!$user->image == null)
                    <td ><img src="{{ asset('storage/' . $user->image) }}" alt="image" ><td>
                 @else
                    <td><img src="/img/icon_man.png" alt="man_icon"></td>
                    @endif
            </tr>
          </div>
          <span>
                <img src="{{asset('img/nicebutton.png')}}" width="30px">

                <!-- もし$niceがあれば＝ユーザーが「フォローする」をしていたら -->
                @if($nice)
                <!-- 「フォローする」取消用ボタンを表示 -->
                    <a href="{{ route('unnice',['id'=>$user->id]) }}" class="btn btn-success btn-sm">
                        フォローする
                        <!-- 「いいね」の数を表示 -->
                        <span class="badge">
                        {{ $count }}
                        </span>
                    </a>
                @else
                <!-- まだユーザーが「フォローする」をしていなければ、「フォローする」ボタンを表示 -->
                    <a href="{{ route('nice', ['id'=>$user->id]) }}" class="btn btn-secondary btn-sm">
                        フォローする
                        <!-- 「いいね」の数を表示 -->
                        <span class="badge">
                        {{ $count }}
                        </span>
                    </a>
                @endif
            </span>
  </div>
    <div class="table-responsive" >
        <p>作成一覧</p>
        <table class="table-all">
            <thead>
                <tr>
                    <th style="width:10%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">レッスン名</th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>

                </tr>
            </thead>
            <tbody id="tbl">
            @foreach ($words as $word)
                <tr>
                    <td>{{ $word->Type->type }}</td>
                    <td>{{ $word->Textbook->textbook }}</td>
                    <td>{{ $word->test_name }}</td>
                    <td ><div  class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div></td>
                    <td ><div  class="button"><a href="{{ route('edit',['id'=>$word->id]) }}">編集</a></div></td>
                    <td ><div  class="button"><a href="{{ route('delete_list',['id'=> $word->id]) }}" >削除</a></div></td>
                  @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
