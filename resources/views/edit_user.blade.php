@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/profile.css') }}"> <!-- word.cssと連携 -->
<title>プロフィール編集画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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
<div class="edit">
    <form method="POST" action="{{route('update_user',['id'=> $user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <table class="table-hover">
            <thead>
                <tr>
                    <th >ユーザー名</th>
                    <td><input type="text" name="user_name" value="{{ $user->user_name}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >エリア</th>
                    <td><input type="text" name="place" value="{{ $user->place}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >学年</th>
                    <td><input type="text" name="year" value="{{ $user->year}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >クラス番号#1</th>
                    <td><input type="text" name="school1" value="{{ $user->school1}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >クラス番号#2</th>
                    <td><input type="text" name="school2" value="{{ $user->school2}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >メールアドレス</th>
                    <td><input type="text" name="email" value="{{ $user->email}}" class="form-control"></td>
                </tr>
                <tr>
                    <th >親子機能</th>
                    <td><input type="text" name="email" value="{{ $user->game_id}}" class="form-control"></td>
                </tr>
            </thead>
            <p><span style="color:red;">親子機能</span>を申込み希望の方は１を入力してください</p>

        </table>

        <div class="button"><input type="submit" value="更新">
            <h4>更新ボタンを押さないと変更されません</h4>
           <!--  <h4>!!空欄のままだとエラーになります。クラス番号を削除するときは<span style="color:red;">000</span>を入力してください!!</h4> -->
        </div>

</div>
@endsection
