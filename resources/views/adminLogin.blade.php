<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <title>管理者ログイン画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>

    </head>
    <body>

        @if ($errors->any())  {{--  エラーがあれば出力する --}}
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif
        <div class="form">
            <h2>管理者専用ログイン</h2>

            <form method="POST" action="{{ route("admin.login") }}">  {{--  routeはここと同じ --}}
                @csrf
                <ul>
                    <li>
                        <label for="email">Mail</label>
                        <input type="text" id="email" name="email">
                    </li>
                    <li>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </li>
                    <li>
                        <button type="submit">Login</button>

                    </li>
                </ul>
            </form>
        </div>
          <!-- <li>
                <a href="{{route('admin.register')}}">
                    アカウント作成
                </a>
            </li> -->
    </body>
</html>
