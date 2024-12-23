<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>llco eギフトカード申し込みページ</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">





</head>
<div class="contact">
    <h2>eギフトカード申し込み</h2>
    <form method="POST" action="{{ route('gift_confirm') }}">
        @csrf
        <ul>
            <li>
                <label>メールアドレス</label>
                <input name="email" value="{{ old('email') }}" type="text">
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </li>
            <li>
                <label>担当者様お名前</label>
                <input name="name" value="{{ old('name') }}" type="text">
                @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
            </li>
            <li>
                <label>店舗・会社名</label>
                <input name="group" value="{{ old('group') }}" type="text">
                @if ($errors->has('group'))
                <p class="error-message">{{ $errors->first('group') }}</p>
                @endif
            </li>
            <li>
                <label>電話番号</label>
                <input name="phone" value="{{ old('phone') }}" type="text">
                @if ($errors->has('phone'))
                <p class="error-message">{{ $errors->first('phone') }}</p>
                @endif
            </li>
            <li>
                <label>ご質問などございましたら、こちらにご記入下さい。</label><br>
                <textarea name="body" style="height: 200px; width:80%;">{{ old('body') }}</textarea>
            </li>

            <button type="submit">
                入力内容確認
            </button>
    </form>
    </ul>
    <p>申込後24時間以内に支払い案内メールが送られます。</p>
</div>
<div class="top">

    <a href="{{ url('/gift/top') }}">
        <h3>トップページに戻る</h3>
    </a>
</div>

</html>
