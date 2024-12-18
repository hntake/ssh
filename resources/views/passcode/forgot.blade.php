<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスコードリセット</title>
</head>
<body>
    <h1>パスコードをリセット</h1>

    <form action="{{ route('passcode.sendResetLink') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="メールアドレス" required>
        <button type="submit">リセットリンクを送信</button>
    </form>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <!-- エラーメッセージ -->
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>