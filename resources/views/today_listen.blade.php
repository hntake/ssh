@extends('layouts.app')

        <title>Today's リスニング 英語学習サイト”エイゴメ”</title>

        @section('content')
        <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->

        <link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->

    <body>
    <div class="wrapper">

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


<div class="test">
<p>繰り返し何回か発音を聞くと、聞こえなくなることがあります。ブラウザを更新すれば聞けるようになりますが、入力した解答は消えますのでご了承ください。</p>
    <form class="form-inline" action="{{route('result_today',['id'=>$id,'test_id'=>$test_id])}}" method="POST">
        @csrf
        @if (!empty($word))
        <table class="table-box" style="border:solid 1px gray; margin:0 auto;">
            <thead>
                <tr style="background-color:darkseagreen">
                    <th style="width:15%">学年レベル</th>
                    <th style="width:15%">テスト名</th>
                    <th style="width:15%">作成者</th>
                </tr>
            </thead>
            <tbody id="tbl">
                <tr>
                    <td>{{ $word->Type->type }}</td>
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
                        <td><button onclick="readAloud1()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン１</button></td>
                        <td><input type="text" name="en1" id="en1" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en1') }}"></td>
                    </tr>
                    <tr class="onetest">
                         <td>2</td>
                         <td><button onclick="readAloud2()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン２</button></td>
                         <td><input type="text" name="en2" id="en2" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en2') }}"></td>
                    </tr>
                    <tr class="onetest">
                        <td>3</td>
                        <td><button onclick="readAloud3()"  id="text" style="font-size:25px; padding:7px;"type="button">リッスン３</button></td>
                        <td><input type="text" name="en3" id="en3" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en3') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>4</td>
                    <td><button onclick="readAloud4()"  id="text" style="font-size:25px; padding:7px;"type="button">リッスン４</button></td>
                    <td><input type="text" name="en4" id="en4" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en4') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>5</td>
                    <td><button onclick="readAloud5()"  id="text" style="font-size:25px; padding:7px;"type="button" >リッスン５</button></td>
                    <td><input type="text" name="en5" id="en5" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en5') }}"></td>
                    <tr class="onetest">
                    <td>6</td>
                    <td><button onclick="readAloud6()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン６</button></td>
                    <td><input type="text" name="en6" id="en6" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en6') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>7</td>
                    <td><button onclick="readAloud7()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン７</button></td>
                    <td><input type="text" name="en7" id="en7" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en7') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>8</td>
                    <td><button onclick="readAloud8()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン８</button></td>
                    <td><input type="text" name="en8" id="en8" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en8') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>9</td>
                    <td><button onclick="readAloud9()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン９</button></td>
                    <td><input type="text" name="en9" id="en9" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en9') }}"></td>
                    </tr>
                    <tr class="onetest">
                    <td>10</td>
                    <td><button onclick="readAloud10()"  id="text" style="font-size:25px; padding:7px;" type="button">リッスン１０</button></td>
                    <td><input type="text" name="en10" id="en10" class="form-control" size="15" placeholder="スペルは？" value="{{ old('en10') }}"></td>
                    </tr>
                </tbody>
            </table>


            @if ($errors->any())
            <p class="error-message">!! 空欄がないようにしてください !!</p>
            @endif
            <div class="check">
                <button type="submit"style="padding:10px;"name="send">
                    <i class="fa fa-plus"></i> 採点する
                </button>
            </div>
    </form>
    <div class="button"><a href="{{ route('answer',['id'=>$test_id]) }}">正解はこちら</a></div>
    </div>
</div>
 </body>
 <script>
            function readAloud1() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en1}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
             <script>
            function readAloud2     () {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en2}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud3() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en3}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud4() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en4}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud5() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en5}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud6() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en6}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud7() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en7}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud8() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en8}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud9() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en9}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>
            <script>
            function readAloud10() {
            // テキストを取得
            const text = document.getElementById("text").value

            // ブラウザにWeb Speech API Speech Synthesis機能があるか判定
            if ('speechSynthesis' in window) {

            // 発言を設定
            const uttr = new SpeechSynthesisUtterance()

            // テキストを設定
            uttr.text = '{{ $word->en10}}'

            // 言語を設定
            uttr.lang = 'en-US'

            // 英語に対応しているvoiceを設定
            const voices = speechSynthesis.getVoices()
            for (let i = 0; i < voices.length; i++) {
            if (voices[i].lang === 'en-US') {
                uttr.voice = voices[i]
            }
            }

            // 発言を再生
            window.speechSynthesis.speak(uttr)

            }
            }
            </script>

@else
<p>テストは削除されました。</p>
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
@endif
