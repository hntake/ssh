@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>テスト作成画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->


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
<div class="createtable-responsive">
    <form action="{{ url('create') }}" method="post">
        @csrf
        <div class="create">
            <table class="create">
                <div class="formdrop">
                    <p>①学年かその他を<br>選んでください</p>
                    {{ Form::select('type',$types, null, ['class' => 'form', 'id' => 'type']) }}
                </div>

                <div class="formdrop">
                    <p>②教科書名かその他を<br>選んでください</p>
                    {{ Form::select('textbook',$textbooks, null, ['class' => 'form', 'id' => 'textbook']) }}
                </div>
                <div class="radio_box">
                    <p style="margin-bottom:0;">③単元を選択</p><br>
                    <div class="radio">
                        <input class="visually-hidden" type="radio" name="test_type" id="test_type1" class="form-control" value="Lesson" />
                        <label id="test" for="test_type1"> Lesson</label>
                    </div>
                    <div class="radio">
                        <input class="visually-hidden" type="radio" name="test_type" id="test_type2" class="form-control" value="Unit" />
                        <label id="test" for="test_type2">Unit</label>
                    </div>
                    <div class="radio">
                        <input class="visually-hidden" type="radio" name="test_type" id="test_type3" class="form-control" value="" />
                        <label id="test" for="test_type3">その他</label>
                    </div><br>
                    <p style="border-top:solid 1px black;">④テスト名を記入</p>
                    <span style="background-color:lightblue;margin-left:5px;">(例)1-1や動物など</span>
                    <div class="radio-text">
                        <input type="text" name="test_name" id="test_name" class="form-control" size="15" placeholder="テスト名を入力" value="{{ old('test_name') }}" style="width:200px;">
                    </div>
                </div>
            </table>
        </div>
        <table class="table-hover">
            <thead>
                <tr>
                    <th style="width:5%;">番号</th>
                    <th style="width:20%">問題</th>
                    <th style="width:20%">答え</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <tr class="onetest">
                    <td>1</td>
                    <td><input type="text" name="ja1" id="ja1" class="form-control" size="15" placeholder="日本語" value="{{ old('ja1') }}"></td>
                    <td><input type="text" name="en1" id="en1" class="form-control" size="15" placeholder="英語" value="{{ old('en1') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>2</td>
                    <td><input type="text" name="ja2" id="ja2" class="form-control" size="15" placeholder="日本語" value="{{ old('ja2') }}"></td>
                    <td><input type="text" name="en2" id="en2" class="form-control" size="15" placeholder="英語" value="{{ old('en2') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>3</td>
                    <td><input type="text" name="ja3" id="ja3" class="form-control" size="15" placeholder="日本語" value="{{ old('ja3') }}"></td>
                    <td><input type="text" name="en3" id="en3" class="form-control" size="15" placeholder="英語" value="{{ old('en3') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>4</td>
                    <td><input type="text" name="ja4" id="ja4" class="form-control" size="15" placeholder="日本語" value="{{ old('ja4') }}"></td>
                    <td><input type="text" name="en4" id="en4" class="form-control" size="15" placeholder="英語" value="{{ old('en4') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>5</td>
                    <td><input type="text" name="ja5" id="ja5" class="form-control" size="15" placeholder="日本語" value="{{ old('ja5') }}"></td>
                    <td><input type="text" name="en5" id="en5" class="form-control" size="15" placeholder="英語" value="{{ old('en5') }}"></td>
                <tr class="onetest">
                    <td>6</td>
                    <td><input type="text" name="ja6" id="ja6" class="form-control" size="15" placeholder="日本語" value="{{ old('ja6') }}"></td>
                    <td><input type="text" name="en6" id="en6" class="form-control" size="15" placeholder="英語" value="{{ old('en6') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>7</td>
                    <td><input type="text" name="ja7" id="ja7" class="form-control" size="15" placeholder="日本語" value="{{ old('ja7') }}"></td>
                    <td><input type="text" name="en7" id="en7" class="form-control" size="15" placeholder="英語" value="{{ old('en7') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>8</td>
                    <td><input type="text" name="ja8" id="ja8" class="form-control" size="15" placeholder="日本語" value="{{ old('ja8') }}"></td>
                    <td><input type="text" name="en8" id="en8" class="form-control" size="15" placeholder="英語" value="{{ old('en8') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>9</td>
                    <td><input type="text" name="ja9" id="ja9" class="form-control" size="15" placeholder="日本語" value="{{ old('ja9') }}"></td>
                    <td><input type="text" name="en9" id="en9" class="form-control" size="15" placeholder="英語" value="{{ old('en9') }}"></td>
                </tr>
                <tr class="onetest">
                    <td>10</td>
                    <td><input type="text" name="ja10" id="ja10" class="form-control" size="15" placeholder="日本語" value="{{ old('ja10') }}"></td>
                    <td><input type="text" name="en10" id="en10" class="form-control" size="15" placeholder="英語" value="{{ old('en10') }}"></td>
                </tr>

            </tbody>
        </table>
        <div class="check">
            <button type="submit">
                作成
            </button>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</div>
<!-- <img src="img/create.png" alt="boy"> -->
@endsection
<a href="#" class="gotop">トップへ</a>
