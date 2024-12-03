<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫管理アプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .section-title {
            margin-top: 30px;
            border-bottom: 2px solid #343a40;
            padding-bottom: 5px;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">在庫管理アプリ</h1>

        <!-- 1. 在庫管理アプリとは？ -->
        <section>
            <h2 class="section-title">1. 在庫管理アプリとは？</h2>
            <p>このアプリでは、以下の機能を提供します。</p>
            <ul>
                <li>アイテムを登録し、在庫不足ラインを設定できます。設定したラインに達すると、登録メールに通知が送信されます。</li>
                <li>アイテムの出入りはQRコードで管理。</li>
                <li>アイテムごとの出入りをテーブル表示で確認できます。</li>
            </ul>
        </section>

        <!-- 2. 利用するには？ -->
        <section>
            <h2 class="section-title">2. 利用するには？</h2>
            <p>アプリの利用方法は以下の通りです。</p>
            <ul>
                <li>メールアドレスの登録が必要です。</li>
                <li>月額利用料は500円で、初月は無料でご利用いただけます。</li>
                <li>支払い方法は、クレジットカードまたは銀行振り込みに対応しています。</li>
            </ul>
        </section>

        <!-- 3. 登録はこちらから -->
        <section>
            <h2 class="section-title">3. 登録はこちらから</h2>
            <a href="{{ url('stock/register') }}" class="btn btn-primary">今すぐ登録</a>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>