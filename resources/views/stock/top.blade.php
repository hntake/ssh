<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫管理アプリ | 最初の30日間無料</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .features, .cta, .pricing {
            background: white;
            margin: 20px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .features ul {
            list-style: none;
            padding: 0;
        }
        .features ul li {
            background: url('check-icon.png') no-repeat left center;
            background-size: 20px;
            padding-left: 30px;
            margin: 10px 0;
        }
        .cta button {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
        }
        .cta button:hover {
            background-color: #0056b3;
        }
        footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            background-color: #333;
            color: white;
        }
        .illustration {
            text-align: center;
            margin: 20px 0;
        }
        .illustration img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>在庫管理アプリ - 簡単・便利・最初の30日間無料！</h1>
    </header>
    <div class="container">
        <section class="intro">
            <p>QRコードを使った管理と手動入力、どちらも対応可能な在庫管理アプリです。</p>
            <p>最初の30日間は完全無料でお試しいただけます。その後は月額500円でご利用可能です！</p>
        </section>
        <section class="illustration">
            <img src="/img/stock.png" alt="アプリの利用イメージ" style="width:30%;">
        </section>
        <section class="features">
            <h2>アプリの特徴</h2>
            <ul>
                <li><strong>在庫ラインのアラート機能</strong> - 設定した数値を下回るとアラートを表示し、在庫不足を防ぎます。</li>
                <li><strong>業者への自動注文機能</strong> - 取引業者のメールアドレスを登録し、注文数を設定するだけで簡単に注文メールを送信可能。</li>
                <li><strong>QRコードによる入出庫管理</strong> - QRコードを使用して簡単に在庫の入庫・出庫を管理できます。</li>
                <li>リアルタイムで在庫状況を確認</li>
                <li>手動入力でも素早く管理可能</li>
                <li>スマートフォン、タブレット、PC対応</li>
            </ul>
        </section>
        <section class="pricing">
            <h2>料金プラン</h2>
            <p><strong>最初の30日間は無料</strong>でご利用いただけます。</p>
            <p>その後は月額<strong>500円</strong>で、すべての機能をご利用可能です。</p>
        </section>
        <section class="cta">
            <h2>まずは無料でお試しください！</h2>
            <p>在庫管理がもっと簡単に。今すぐ登録して、無料期間をお楽しみください。</p>
            <button onclick="location.href='/stock/register'">無料で始める</button>        
        </section>
    </div>
    <footer>
        <p>© 2024 llco 在庫管理アプリ All Rights Reserved.</p>
    </footer>
</body>
</html>