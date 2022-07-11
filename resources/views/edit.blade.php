@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>テスト編集画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

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
<div class="test" >
    <table class="table-hover">
    <thead>
                <tr style="background-color:darkseagreen">
                    <th style="width:5%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <tr>
                    <td><input type="text" name="type" value="{{ $word->Type->type }}" class="form-control"></td>
                    <td><input type="text" name="textbook" value="{{ $word->Textbook->textbook }}" class="form-control"></td>
                    <td><input type="text" name="test_name" value="{{ $word->test_name }}" class="form-control"></td>
                </tr>
            </tbody>
        <thead>
            <tr>
                <th style="width:5%">番号</th>
                <th style="width:20%">問題</th>
                <th style="width:20%">答え</th>
            </tr>
        </thead>
             <tbody id="tbl">
                        <tr class="onetest">
                            <td class="number">1</td>
                            <td><input type="text" name="ja1" value="{{ $word->ja1}}" class="form-control"></td>
                            <td><input type="text" name="en1" value="{{ $word->en1}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                        <td class="number">2</td>
                            <td><input type="text" name="ja2" value="{{ $word->ja2}}" class="form-control"></td>
                            <td><input type="text" name="en2" value="{{ $word->en2}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                           <td class="number">3</td>
                            <td><input type="text" name="ja3" value="{{ $word->ja3}}" class="form-control"></td>
                            <td><input type="text" name="en3" value="{{ $word->en3}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                           <td class="number">4</td>
                            <td><input type="text" name="ja4" value="{{ $word->ja4}}" class="form-control"></td>
                            <td><input type="text" name="en4" value="{{ $word->en4}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                           <td class="number">5</td>
                            <td><input type="text" name="ja5" value="{{ $word->ja5}}" class="form-control"></td>
                            <td><input type="text" name="en5" value="{{ $word->en5}}" class="form-control"></td>
                        <tr class="onetest">
                           <td class="number">6</td>
                            <td><input type="text" name="ja6" value="{{ $word->ja6}}" class="form-control"></td>
                            <td><input type="text" name="en6" value="{{ $word->en6}}" class="form-control"></td>
                        </tr>
                            <tr class="onetest">
                           <td class="number">7</td>
                            <td><input type="text" name="ja7" value="{{ $word->ja7}}" class="form-control"></td>
                            <td><input type="text" name="en7" value="{{ $word->en7}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                           <td class="number">8</td>
                            <td><input type="text" name="ja8" value="{{ $word->ja8}}" class="form-control"></td>
                            <td><input type="text" name="en8" value="{{ $word->en8}}" class="form-control"></td>
                        </tr>
                            <tr class="onetest">
                           <td class="number">9</td>
                            <td><input type="text" name="ja9" value="{{ $word->ja9}}" class="form-control"></td>
                            <td><input type="text" name="en9" value="{{ $word->en9}}" class="form-control"></td>
                        </tr>
                        <tr class="onetest">
                           <td class="number">10</td>
                            <td><input type="text" name="ja10" value="{{ $word->ja10}}" class="form-control"></td>
                            <td><input type="text" name="en10" value="{{ $word->en10}}" class="form-control"></td>
                        </tr>
                </tbody>
    </table>
    <div  class="button"><a href="{{ route('profile') }}">編集完了</a></div>

        </div>
@endsection
