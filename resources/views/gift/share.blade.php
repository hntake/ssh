<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/gift.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <title>ギフトカード表示ページ</title>
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
</head>
<body>
<div class="container">
    <h2>ギフトカードご購入ありがとうございます</h2>
    <div class="certificate">
        <img src="/img/Certificate.png" alt="Certificate Image" >
        <h4>{{$gift->store->name}}</h4>
        <h3>¥{{ $gift->price }}</h3> <!-- ギフトカードの金額を表示 -->
    </div>
    <div class="qrcode">
        {!! QrCode::size(150)->generate(url('gift/use/' . $gift->uuid)) !!} <!-- UUIDでQRコード生成 -->
    </div>

    <!-- 送信方法の選択 -->
    <div class="send-options">
        <label><input type="radio" name="send_method" value="email" checked> メールで送る</label>
        <label><input type="radio" name="send_method" value="line"> LINEで送る</label>
    </div>

    <!-- メール送信フォーム -->
    <form id="email-form" action="{{ route('gift_mail',['id'=>$gift->id]) }}" method="POST">
        @csrf
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">ギフトカードをメールで送る</button>
    </form>

    <!-- LINEで共有するボタン -->
    <div id="line-share" class="line-share" style="display:none;">
        <a href="https://line.me/R/msg/text/?ギフトカードを受け取ってください！%0A{{ urlencode(url('gift/use/' . $gift->uuid)) }}" target="_blank">
            <img src="/img/line-share-button.png" alt="LINEで送る" style="width: 200px;">
        </a>
    </div>
</div>

<script>
    document.querySelectorAll('input[name="send_method"]').forEach(function(elem) {
        elem.addEventListener('change', function() {
            if (this.value === 'email') {
                document.getElementById('email-form').style.display = 'block';
                document.getElementById('line-share').style.display = 'none';
            } else {
                document.getElementById('email-form').style.display = 'none';
                document.getElementById('line-share').style.display = 'block';
            }
        });
    });
</script>
</body>
</html>