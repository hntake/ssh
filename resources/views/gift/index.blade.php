<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/gift.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <title>ギフトカード販売ページ</title>
    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
        }
        input[type="number"], input[type="email"], textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }
        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1>ギフトカードの贈り方と受け取り方</h1>
        <p>ギフトカードは、贈りたい金額を入力し、受け取り主のメールアドレスとメッセージを送信するだけで簡単に贈ることができます。受け取り主は、店舗でギフトカードを利用してお買い物を楽しめます。</p>

        <h2>{{$store->name}}ギフトカードを作成する</h2>
        <form action="{{ route('gift_purchase',['uuid'=>$store->uuid]) }}" method="POST">
            @csrf
            <label for="price">金額 (円):</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div style="color: red;">{{ $message }}</div>
            @enderror

            <button type="submit">ギフトカードを作成する</button>
        </form>
    </div>
</body>
</html>