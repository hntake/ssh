<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスコードリセット</title>
</head>
<body>
    <h1>新しいパスコードを設定してください</h1>
    <form action="{{ route('passcode.reset') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="text" name="passcode" placeholder="4桁の新しいパスコード" maxlength="4" required>
        <button type="submit">リセット</button>
    </form>
</body>
</html>