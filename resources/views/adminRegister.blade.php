<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理者登録画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>
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

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <div>
            <label for="school">School</label>
            <input type="text" id="school" name="school">
        </div>
        <div>
            <label for="email">Mail</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">Password(confirmed)</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <div>
            <label for="admin_level">AdminLevel</label>
            <input type="text" id="admin_level" name="admin_level">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
