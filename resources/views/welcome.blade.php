<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="button">Home</a>
                    @else
                    <div class="login-button">
                        <a href="{{ route('login') }}" class="button">ログイン</a>
                        <P>今日もポイント貯めよう！!</P>
                    </div>
                    <div class="register-button">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="button">新規登録</a>
                        <p>登録してポイントを貯めよう!</p>
                    </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="top">
            <img src="img/title.png" alt="top" >
        </div>
            <div class="rule">
                <h2 style="font-family: 'Noto Sans JP', sans-serif;">
                ルールを守って楽しく学ぼう
                </h2>
                <!-- モニター段階では表示しない -->
               <!--  <h3>
                   ログインせずにテストを受けてみるなら<br>
                   ここをクリック！
                   <a href="{{ url('search_result') }}" class="center-button">検索</a>
                </h3> -->
            </div>
            <div class="llco">
                <img src="img/llco.png" alt="llco">
            </div>



        </div>
    </body>
</html>
