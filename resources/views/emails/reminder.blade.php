<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブスクリプションのご案内</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <p>{{ $userName }} 様、</p>
        <p>在庫アプリのご利用ありがとうございます。</p>
        <p>ご利用の無料期間が一週間後に終了いたします。</p>
        <p>引き続きご利用をご希望される場合は、アカウントよりサブスクリプションのお手続きをお願いいたします。</p>
        <p>月額料金は <strong>500円</strong> となります。</p>
        <a href="{{ route('stock.login') }}" class="btn btn-secondary">ログインページ</a>
        <p>今後ともよろしくお願いいたします。</p>
    </div>
</body>
</html>