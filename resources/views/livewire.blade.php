@extends('layouts.app')

<title>テスト学習画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
@section('content')
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->

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
     <!--    @if (!empty($word)) -->
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
                        <td><button onclick="readAloud1()"  id="text" >{{ $word->en1}}</button></td>
                        <td style="color:red;">
                        <button class='button1' data-id='{{$word->ja1}}'>日本語で</button>
                        <p id='selected1'></p>
                        </td>
                    </tr>
                    <tr class="onetest">
                         <td>2</td>
                         <td><button onclick="readAloud2()"  id="text" >{{ $word->en2}}</button></td>
                        <td style="color:red;">
                        <button class='button2' data-id='{{$word->ja2}}'>日本語で</button>
                        <p id='selected2'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                        <td>3</td>
                        <td><button onclick="readAloud3()"  id="text" >{{ $word->en3}}</button></td>
                        <td style="color:red;">
                        <button class='button3' data-id='{{$word->ja3}}'>日本語で</button>
                        <p id='selected3'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>4</td>
                    <td><button onclick="readAloud4()"  id="text" >{{ $word->en4}}</button></td>
                        <td style="color:red;">
                        <button class='button4' data-id='{{$word->ja4}}'>日本語で</button>
                        <p id='selected4'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>5</td>
                    <td><button onclick="readAloud5()"  id="text" >{{ $word->en5}}</button></td>
                        <td style="color:red;">
                        <button class='button5' data-id='{{$word->ja5}}'>日本語で</button>
                        <p id='selected5'></p>                        </td>
                    <tr class="onetest">
                    <td>6</td>
                    <td><button onclick="readAloud6()"  id="text" >{{ $word->en6}}</button></td>
                        <td style="color:red;">
                        <button class='button6' data-id='{{$word->ja6}}'>日本語で</button>
                        <p id='selected6'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>7</td>
                    <td><button onclick="readAloud7()"  id="text" >{{ $word->en7}}</button></td>
                        <td style="color:red;">
                        <button class='button7' data-id='{{$word->ja7}}'>日本語で</button>
                        <p id='selected7'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>8</td>
                    <td><button onclick="readAloud8()"  id="text" >{{ $word->en8}}</button></td>
                        <td style="color:red;">
                        <button class='button8' data-id='{{$word->ja8}}'>日本語で</button>
                        <p id='selected8'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>9</td>
                    <td><button onclick="readAloud9()"  id="text" >{{ $word->en9}}</button></td>
                        <td style="color:red;">
                        <button class='button9' data-id='{{$word->ja9}}'>日本語で</button>
                        <p id='selected9'></p>                        </td>
                    </tr>
                    <tr class="onetest">
                    <td>10</td>
                    <td><button onclick="readAloud10()"  id="text" >{{ $word->en10}}</button></td>
                        <td style="color:red;">
                        <button class='button10' data-id='{{$word->ja10}}'>日本語で</button>
                        <p id='selected10'></p>                        </td>
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




    <div class="button"><a href="{{ route('test',['id'=>$id]) }}">テストを受ける</a></div>

 </div>


<!-- @else
<p>テストは削除されました。</p> -->
@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
@endif
@endsection
