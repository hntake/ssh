<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスコード入力</title>
</head>
<body>
    <h1>パスコードを入力してください</h1>
    <form action="{{ route('passcode.verify',['id'=>$id]) }}" method="POST">
        @csrf
        <input type="text" name="passcode" placeholder="4桁のパスコード" maxlength="4" required>
        <button type="submit">送信</button>
    </form>
    @if ($errors->has('passcode'))
        <p style="color: red;">{{ $errors->first('passcode') }}</p>
    @endif
</body>
</html>