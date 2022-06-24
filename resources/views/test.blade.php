@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>テスト画面 エーゴメ</title>

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
    <form class="form-inline" action="{{route('result',['id'=>$id])}}" method="POST">
        @csrf
     <table class="table-box" style="border:solid 1px gray; margin:0 auto;">
        <thead>
            <tr style="background-color:darkseagreen">
                <th style="width:10%">学年</th>
                <th style="width:15%">教科書名</th>
                <th style="width:15%">レッスン名</th>
                <th style="width:15%">作成者</th>
            </tr>
        </thead>
        <tbody id="tbl">
            <tr>
                <td>{{ $word->Type->type }}</td>
                <td>{{ $word->Textbook->textbook }}</td>
                <td>{{ $word->test_name }}</td>
                <td>{{ $word->user_name }}</td>
            </tr>
        </tbody>
    <table class="table-all">
        <thead>
            <tr>
                <th style="width:5%">番号</th>
                <th style="width:30%">問題</th>
                <th style="width:30%">答え</th>
            </tr>
        </thead>
             <tbody id="tbl">
                        <tr class="onetest">
                            <td>1</td>
                            <td>{{ $word->ja1}}</td>
                            <td><input type="text" name="en1" id="en1" class="form-control" size="15" placeholder="英語で？" value="{{ old('en1') }}"></td>
                        </tr>
                        <tr class="onetest">
                            <td>2</td>
                            <td>{{ $word->ja2}}</td>
                            <td><input type="text" name="en2" id="en2" class="form-control" size="15" placeholder="英語で？" value="{{ old('en2') }}"></td>
                         </tr>
                        <tr class="onetest">
                            <td>3</td>
                            <td>{{ $word->ja3}}</td>
                            <td><input type="text" name="en3" id="en3" class="form-control" size="15" placeholder="英語で？" value="{{ old('en3') }}"></td>
                        </tr>
                        <tr class="onetest">
                            <td>4</td>
                            <td>{{ $word->ja4}}</td>
                            <td><input type="text" name="en4" id="en4" class="form-control" size="15" placeholder="英語で？" value="{{ old('en4') }}"></td>
                        </tr>
                        <tr class="onetest">
                            <td>5</td>
                            <td>{{ $word->ja5}}</td>
                            <td><input type="text" name="en5" id="en5" class="form-control" size="15" placeholder="英語で？" value="{{ old('en5') }}"></td>
                        <tr class="onetest">
                            <td>6</td>
                            <td>{{ $word->ja6}}</td>
                            <td><input type="text" name="en6" id="en6" class="form-control" size="15" placeholder="英語で？" value="{{ old('en6') }}"></td>
                        </tr>
                            <tr class="onetest">
                            <td>7</td>
                            <td>{{ $word->ja7}}</td>
                            <td><input type="text" name="en7" id="en7" class="form-control" size="15" placeholder="英語で？" value="{{ old('en7') }}"></td>
                        </tr>
                        <tr class="onetest">
                            <td>8</td>
                            <td>{{ $word->ja8}}</td>
                            <td><input type="text" name="en8" id="en8" class="form-control" size="15" placeholder="英語で？" value="{{ old('en8') }}"></td>
                        </tr>
                            <tr class="onetest">
                            <td>9</td>
                            <td>{{ $word->ja9}}</td>
                            <td><input type="text" name="en9" id="en9" class="form-control" size="15" placeholder="英語で？" value="{{ old('en9') }}"></td>
                        </tr>
                        <tr class="onetest">
                            <td>10</td>
                            <td>{{ $word->ja10}}</td>
                            <td><input type="text" name="en10" id="en10" class="form-control" size="15" placeholder="英語で？" value="{{ old('en10') }}"></td>
                        </tr>
                        <input type="hidden" name="user_name" value="{{$id}}">


                </tbody>
    </table>
    @if ($errors->any())
  <p class="error-message">!! 空欄がないようにしてください !!</p>
@endif
        <div class="check">
            <button type="submit" >
                <i class="fa fa-plus"></i> check!
            </button>
       </div>
    </form>
</div>
@endsection
