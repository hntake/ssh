<!-- resources/views/pdf/receipt.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>領収書</title>
    <style>
        @font-face {
            font-family: ipaexg;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipaexg;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        body {
            font-family: ipaexg !important;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }
        .header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content {
            font-size: 18px;
        }
        .footer {
            font-size: 12px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">領収書</div>
        <div class="content">
            <p>店舗名: ¥{{$gift->store->name }}</p>
            <p>金額: ¥{{ number_format($gift->price) }}</p>
            <p>発行日: {{ now()->format('Y年m月d日') }}</p>
        </div>
        <div class="footer">
            <p>ご利用いただきありがとうございます。</p>
        </div>
    </div>
</body>
</html>