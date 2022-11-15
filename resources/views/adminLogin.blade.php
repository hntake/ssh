<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <title>管理者ログイン画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

</head>

<body>

    @if ($errors->any()) {{-- エラーがあれば出力する --}}
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
    @endif
    <div class="form">
        <h2>管理者専用ログイン</h2>

        <form method="POST" action="{{ route("admin.login") }}"> {{-- routeはここと同じ --}}
            @csrf
            <p>
                <label for="email">Mail</label>
                <input type="text" id="email" name="email">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </p>
            <p>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('←ログイン状態を維持する') }}
                </label>
            </p>
            <p class="submit"><input type="submit" name="commit" value="Login"></p>
        </form>
    </div>
    <!-- <li>
                <a href="{{route('admin.register')}}">
                    アカウント作成
                </a>
            </li> -->
</body>

</html>
