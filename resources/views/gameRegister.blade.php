<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>親子機能登録画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
</head>

<body class="antialiased">
    <a class="button" href="{{ route('admin.login') }}">{{ __('ログインする') }}</a>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
    @endif

    @isset($registered)
    <div>登録に成功しました。メールアドレス：{{ $registered_email }}</div>
    @endisset

    <form method="POST" action="{{ route('game.register') }}">
        @csrf
        <div>
            <label for="user_id">user_id</label>
            <input type="text" id="user_id" name="user_id">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>

</html>
