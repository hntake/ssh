@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->

<title>正答 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>

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
        <h1>テストID{{$word->id}}の正解です</h1>
        <thead>
            <tr>
                <th style="width:20%">番号</th>
                <th style="width:20%">問題</th>
                <th style="width:20%">答え</th>
            </tr>
        </thead>
        <tbody>
            <tr class="onetest">
                <td>1</td>
                <td>{{ $word->ja1}}</td>
                <td ><button onclick="readAloud1()" id="text" style="color:red;font-weight:bold;font-size:25px; padding:7px;" >{{ $word->en1}}</button></td>
            </tr>
            <tr class="onetest">
                <td>2</td>
                <td>{{ $word->ja2}}</td>
                <td ><button onclick="readAloud2()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en2}}</button></td>
            </tr>
            <tr class="onetest">
                <td>3</td>
                <td>{{ $word->ja3}}</td>
                <td ><button onclick="readAloud3()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en3}}</button></td>
            </tr>
            <tr class="onetest">
                <td>4</td>
                <td>{{ $word->ja4}}</td>
                <td ><button onclick="readAloud4()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en4}}</button></td>
            </tr>
            <tr class="onetest">
                <td>5</td>
                <td>{{ $word->ja5}}</td>
                <td ><button onclick="readAloud5()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en5}}</button></td>
            <tr class="onetest">
                <td>6</td>
                <td>{{ $word->ja6}}</td>
                <td ><button onclick="readAloud6()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en6}}</button></td>
            </tr>
            <tr class="onetest">
                <td>7</td>
                <td>{{ $word->ja7}}</td>
                <td ><button onclick="readAloud7()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en7}}</button></td>
            </tr>
            <tr class="onetest">
                <td>8</td>
                <td>{{ $word->ja8}}</td>
                <td ><button onclick="readAloud8()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en8}}</button></td>
            </tr>
            <tr class="onetest">
                <td>9</td>
                <td>{{ $word->ja9}}</td>
                <td ><button onclick="readAloud9()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;">{{ $word->en9}}</button></td>
            </tr>
            <tr class="onetest">
                <td>10</td>
                <td>{{ $word->ja10}}</td>
                <td ><button onclick="readAloud10()"  id="text" style="color:red;font-weight:bold; font-size:25px; padding:7px;" >{{ $word->en10}}</button></td>
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
            <script type="text/javascript">
                $('.button1').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected1').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button2').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected2').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button3').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected3').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button4').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected4').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button5').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected5').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button6').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected6').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button7').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected7').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button8').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected8').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button9').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected9').text(click);
                });
            </script>
            <script type="text/javascript">
                $('.button10').on('click', function(){
                    var click =  $(this).data('id');

                    $('#selected10').text(click);
                });
            </script>

    <div class="button"><a href="{{ route('test',['id'=>$id]) }}">受けてみよう！</a>
    </div>
    <form class="form-inline" action="{{route('alert',['id'=>$id])}}" method="POST">
        @csrf
        <div class="check">
            <button type="submit" style="padding:10px;">
                <i class="fa fa-plus"></i> テストの間違い報告はここをクリック！
            </button>
        </div>
    </form>
</div>
@endsection
