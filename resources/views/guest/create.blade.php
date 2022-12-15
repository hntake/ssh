<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>店舗登録画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
</head>

<body class="antialiased">

    <form method="POST" action="{{ route('guest.create') }}">
        @csrf
        <div>
            <label for="name">店舗名</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="name">クーポンタイプ</label>
            <input type="text" id="type" name="type">
        </div>
        <div>
            <label for="name_kana">かな</label>
            <input type="text" id="name_kana" name="name_kana">
        </div>
        <div>
            <label for="tel">電話番号</label>
            <input type="text" id="tel" name="tel">
        </div>
        <div>
            <label for="email">email</label>
            <input type="text" id="email" name="email">
        </div>
     
        <div>
            <button type="submit">UUID生成</button>
        </div>
    </form>
</body>

</html>
