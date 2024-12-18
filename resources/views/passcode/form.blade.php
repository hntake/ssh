<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスコード入力</title>
</head>
<body>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <h1>パスコードを入力してください</h1>
    <form action="{{ route('passcode.verify',['id'=>$id]) }}" method="POST">
        @csrf
        <input type="text" name="passcode" placeholder="4桁のパスコード" maxlength="4" pattern="\d{4}" required>        
        <button type="submit">認証</button>
    </form>

    <hr>

    <!-- パスコードリセット遷移ボタン -->
    <h2>パスコードを忘れましたか？</h2>
    <p>パスコードリセットページに遷移します。</p>
    <a href="{{ route('passcode.forgot') }}">リセットページへ遷移</a>

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