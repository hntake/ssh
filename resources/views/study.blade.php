@extends('layouts.app')

<title>テスト学習画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>


</script>


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('home') }}">
                        <h3>ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('history') }}">
                        <h3>全履歴</h3>
                    </a></li>
                <li><a href="{{ url('profile') }}">
                        <h3>Myページ</h3>
                    </a></li>
                <li><a href="{{ url('all_list') }}">
                        <h3>テスト一覧</h3>
                    </a></li>
                <li><a href="{{ url('today') }}">
                        <h3>Today's TEST</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
                <li><a href="{{ url('search_result') }}">
                        <h3>テスト検索</h3>
                    </a></li>
                <li><a href="{{ url('search_user') }}">
                        <h3>ユーザー検索</h3>
                    </a></li>
                <li><a href="{{ url('admin') }}">
                        <h3>管理者画面に戻る</h3>
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

<div class="test">
        @csrf
        @if (!empty($word))
        <table class="table-box" style="border:solid 1px gray; margin:0 auto;">
            <thead>
                <tr style="background-color:darkseagreen">
                    <th style="width:15%">テスト名</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <tr>
                    <td>{{ $word->test_name }}</td>
                </tr>
            </tbody>
            <table class="table-all">
                <thead>
                    <tr>
                        <th style="width:5%">番号</th>
                        <th style="width:30%">問題</th>
                        <th style="width:30%">正解</th>
                    </tr>
                </thead>
                <tbody id="tbl">
                    <tr class="onetest">
                        <td>1</td>
                        <td>{{ $word->en1}}</td>
                        <td style="color:red;">
                            <input type="button" id="button1" value="日本語で">
                            <div id="text1">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button1').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja1/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text1').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>2</td>
                        <td>{{ $word->en2}}</td>
                        <td style="color:red;">
                            <input type="button" id="button2" value="日本語で">
                            <div id="text2">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button2').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja2/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text2').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>







                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>3</td>
                        <td>{{ $word->en3}}</td>
                        <td style="color:red;">
                            <input type="button" id="button3" value="日本語で">
                            <div id="text3">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button3').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja3/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text3').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>4</td>
                        <td>{{ $word->en4}}</td>
                        <td style="color:red;">
                            <input type="button" id="button4" value="日本語で">
                            <div id="text4">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button4').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja4/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text4').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>5</td>
                        <td>{{ $word->en5}}</td>
                        <td style="color:red;">
                            <input type="button" id="button5" value="日本語で">
                            <div id="text5">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button5').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja5/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text5').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    <tr class="onetest">
                        <td>6</td>
                        <td>{{ $word->en6}}</td>
                        <td style="color:red;">
                            <input type="button" id="button6" value="日本語で">
                            <div id="text6">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button6').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja6/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text6').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>

                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>7</td>
                        <td>{{ $word->en7}}</td>
                        <td style="color:red;">
                            <input type="button" id="button7" value="日本語で">
                            <div id="text7">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button7').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja7/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text7').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>8</td>
                        <td>{{ $word->en8}}</td>
                        <td style="color:red;">
                            <input type="button" id="button8" value="日本語で">
                            <div id="text8">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button8').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja8/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text8').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>9</td>
                        <td>{{ $word->en9}}</td>
                        <td style="color:red;">
                            <input type="button" id="button9" value="日本語で">
                            <div id="text9">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button9').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja9/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text9').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>10</td>
                        <td>{{ $word->en10}}</td>
                        <td style="color:red;">
                            <input type="button" id="button10" value="日本語で">
                            <div id="text10">
                                <meta charset="utf8">
                                <p></p>
                            </div>
                            <script>
                                $(function(){
                                    $('#button10').click(
                                        function(){
                                        $.ajax({
                                            type:'GET',
                                            url:'ja10/{{$id}}',
                                            dataType: 'json',

                                        }).done(function(results) {
                                            $('#text10').html(results);
                                        }).fail(function(err) {
                                            alert('ファイルの取得に失敗しました。');
                                        });
                                        }
                                    );
                                });
                            </script>
                        </td>
                    </tr>
                    <input type="hidden" name="user_name" value="{{$id}}">


                </tbody>


            </table>


    <div class="button"><a href="{{ route('test',['id'=>$id]) }}">テストを受ける</a></div>

</div>


@else
<p>テストは削除されました。</p>
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
@endif
@endsection
