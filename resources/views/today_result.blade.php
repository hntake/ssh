@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->
<meta http-equiv="Expires" content="0">


<title>テスト結果 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


<div class="testtable-responsive">
    <table class="table-all">
        <div class="score">
            <h2>得点</h2>
            {{$score}}点
        </div>
        @if(!$user->game_id ==NULL && $score>7)
        <div class="confirm">
            <form method="POST" action="{{ route('confirm',['id'=>$id,'test_id'=>$test_id])}}">
                @csrf
                <button class="confirm_button" name="action" value="submit" onclick="window.location.reload();">確認おねがいします！</button>
            </form>
        </div>
        @endif
        <div class="coupon">
            @if($score >7)
            <img id="imageArea" src="/img/good_job6.png" alt="gj1" style="width:50%; height:auto;">
            <script>
                const imageArea = document.getElementById('imageArea');
                const images = [
                    '/img/good_job4.png',
                    '/img/good_job5.png',
                    '/img/good_job6.png',
                ];

                const imageNo = Math.floor(Math.random() * images.length)
                imageArea.src = images[imageNo];
            </script>
            @else
            <a href="{{route('today_retest',['id'=>$id,'test_id'=>$test_id])}}"><img src="/img/again.png" alt="again" style="width:100%; height:auto;"></a>
            @endif

        </div>
        <thead>
            <div class="result-table">
                <h3>テスト結果</h3>
            </div>
            <tr>
                <th style="width:10%">番号</th>
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

</div>

@endsection
