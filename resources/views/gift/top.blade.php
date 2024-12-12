@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/gift.css') }}">

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="手数料なしで電子マネーシステムを導入可能！QRコードで簡単アクセスし、スマホでギフトカードを作成。店舗運営をサポートするeギフトカード販売サービスをお試しください。">
    <meta name="keywords" content="eギフトカード, 電子マネー, 手数料なし, QRコード, ギフトカード作成, 店舗運営サポート">
    <title>llco eギフトカード販売サービス | 手数料なしで電子マネー導入</title>    <link rel="stylesheet" href="styles.css">
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "eギフトカード販売サービス",
        "description": "手数料なしで電子マネーシステムを導入可能。QRコードで簡単アクセスし、スマホでギフトカードを作成できます。",
        "url": "{{ url()->current() }}",
        "priceRange": "8000JPY",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "日本",
            "addressCountry": "JP"
        },
        "sameAs": [
            "https://www.facebook.com/yourbusiness",
            "https://www.twitter.com/yourbusiness"
        ]
    }
    </script>
</head>
<body>
    <header class="header">
        <h1>eギフトカード販売サービス</h1>
        <p>手数料なしで電子マネーシステムを導入！</p>
    </header>

    <section class="features">
        <h2>サービスの特徴</h2>
        <ul>
            <li>店舗に設置したQRコードから簡単アクセス</li>
            <li>スマホでギフトカードを作成可能</li>
            <li>金額を店舗で支払い、すぐに利用可能</li>
            <li>作成したギフトカードはメールやLINEで送信</li>
            <li>電子マネーとして利用可能</li>
            <li>クレジットカードを使わないので手数料0円</li>
        </ul>
    </section>

    <section class="pricing">
        <h2>料金プラン</h2>
        <p><strong>システム利用料：無料</strong></p>
        <p>販促ポスター作成・利用代：<strong>年間8,000円から</strong></p>
        <p>初月無料お試しキャンペーン実施中！</p>
    </section>

    <section class="cta">
        <h2>今すぐお試しください！</h2>
        <p>店舗での電子マネー導入を手軽に始めるチャンス！</p>
        <div class="admin-button">
            <a href="/gift/register" class="button">申し込みはこちら</a>
            <a href="/contact" class="button">お問い合わせはこちら</a>
        </div>
    </section>

    <footer class="footer">
        <p>© 2024 llco eギフトカード All Rights Reserved.</p>
    </footer>
</body>
</html>