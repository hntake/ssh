<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>お問い合わせフォーム 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">





</head>
<div class="contact">

    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label>
                <input name="email" value="{{ old('email') }}" type="text">
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
                <p>（キャリアメールなどでドメイン指定受信を設定されている方は@itcha50.comから指定できるように設定してから送信してください。もしくはフリーメールのアドレスをご利用ください。）</p>
            </li>
            <li>
                <label>タイトル</label>
                <input name="title" value="{{ old('title') }}" type="text">
                @if ($errors->has('title'))
                <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
            </li>
            <li>
                <label>お問い合わせ内容</label><br>
                <textarea name="body" style="height: 200px; width:80%;">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </li>

            <button type="submit">
                入力内容確認
            </button>
    </form>
    </ul>
</div>

</html>
