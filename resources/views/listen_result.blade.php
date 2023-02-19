@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>テスト結果 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

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
<div class="testtable-responsive">
    <table class="table-all">
        <div class="score">
            <h2>得点</h2>
            {{$score}}点
        </div>
        <thead>
            <tr>
                <th style="width:20%">番号</th>
                <th style="width:20%">結果</th>
                <th style="width:20%">問題</th>
                <th style="width:20%">正答</th>
            </tr>
        </thead>
        <tbody>
            <tr class="onetest">
                <td>1</td>
                <td> {{$result1}}</td>
                @if($result1 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja1}}</td>
                <td ><button onclick="readAloud1()" id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en1}}</button></td>
                @else
                <td>{{ $word->ja1}}</td>
                <td><button onclick="readAloud1()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en1}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>2</td>
                <td> {{$result2}}</td>
                @if($result2 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja2}}</td>
                <td ><button onclick="readAloud2()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en2}}</button></td>
                @else
                <td>{{ $word->ja2}}</td>
                <td><button onclick="readAloud2()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en2}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>3</td>
                <td> {{$result3}}</td>
                @if($result3 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja3}}</td>
                <td ><button onclick="readAloud3()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en3}}</button></td>
                @else
                <td>{{ $word->ja3}}</td>
                <td><button onclick="readAloud3()"  id="text" style="font-size:25px; padding:7px;" >{{ $word->en3}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>4</td>
                <td> {{$result4}}</td>
                @if($result4 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja4}}</td>
                <td ><button onclick="readAloud4()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en4}}</button></td>
                @else
                <td>{{ $word->ja4}}</td>
                <td><button onclick="readAloud4()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en4}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>5</td>
                <td> {{$result5}}</td>
                @if($result5 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja5}}</td>
                <td ><button onclick="readAloud5()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en5}}</button></td>
                @else
                <td>{{ $word->ja5}}</td>
                <td><button onclick="readAloud5()"  id="text" style="font-size:25px; padding:7px;" >{{ $word->en5}}</button></td>
                @endif
            <tr class="onetest">
                <td>6</td>
                <td> {{$result6}}</td>
                @if($result6 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja6}}</td>
                <td ><button onclick="readAloud6()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en6}}</button></td>
                @else
                <td>{{ $word->ja6}}</td>
                <td><button onclick="readAloud6()"  id="text" style="font-size:25px; padding:7px;" >{{ $word->en6}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>7</td>
                <td> {{$result7}}</td>
                @if($result7 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja7}}</td>
                <td ><button onclick="readAloud7()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en7}}</button></td>
                @else
                <td>{{ $word->ja7}}</td>
                <td><button onclick="readAloud7()"  id="text" style="font-size:25px; padding:7px;" >{{ $word->en7}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>8</td>
                <td> {{$result8}}</td>
                @if($result8 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja8}}</td>
                <td ><button onclick="readAloud8()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en8}}</button></td>
                @else
                <td>{{ $word->ja8}}</td>
                <td><button onclick="readAloud8()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en8}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>9</td>
                <td> {{$result9}}</td>
                @if($result9 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja9}}</td>
                <td ><button onclick="readAloud9()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en9}}</button></td>
                @else
                <td>{{ $word->ja9}}</td>
                <td><button onclick="readAloud9()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en9}}</button></td>
                @endif
            </tr>
            <tr class="onetest">
                <td>10</td>
                <td> {{$result10}}</td>
                @if($result10 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja10}}</td>
                <td ><button onclick="readAloud10()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en10}}</button></td>
                @else
                <td>{{ $word->ja10}}</td>
                <td><button onclick="readAloud10()"  id="text" style="font-size:25px; padding:7px;">{{ $word->en10}}</button></td>
                @endif
            </tr>
        </tbody>
    </table>
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
    <div class="button"><a href="{{ route('listen',['id'=>$id]) }}">再チャレンジ！</a>
    </div>

</div>
@endsection
