@extends('layouts.app')

<title>目標設定ページ 英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->

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
@if($user->game_id==null)
<div class="mention">
    <h3>目標設定は親子機能のひとつです。<br>親子機能の申込は<a href="{{route('edit_user',['id'=> $user->id])}}" >プロフィール編集ページ</a>で出来ます</h3>

</div>
@else
<div class="searchtable-responsive" style="font-family: 'Lato', sans-serif;
  color: white;
  background-color: teal;">
    <div class="comment">
        <br>
        <div class="old">
            今の目標と目標点<br>
            <tr>
                <td>{{$game->goal}}/</td>
                <td>{{$game->goal_point}}</td>
            </tr>
        </div>
        <form class="form-inline" action="{{route('goal_post',['id'=>$id])}}" method="POST">
                @csrf
                <div class="goal">
                            目標
                            <input type="text" name="goal_point" id="goal_point" class="form-control" size="50" value="{{ old('goal_point') }}" style="width: 40px; height: 40px;" >点
                </div>
                <div class="goal">
                            リワード
                            <input type="text" name="goal" id="goal" class="form-control" size="150"  value="{{ old('‘goal') }}" style="width: 400px; height: 100px;">
                </div>
                <div class="check">
                    <button type="submit">
                        変更
                    </button>
                </div>
            </form>



    </div>
</div>
@endif
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
