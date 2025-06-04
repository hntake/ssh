<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>無料PDF適格請求書作成サイト 請求書テンプレート</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="無料で登録もなく利用できるオンラインサービスで、簡単に適格請求書をPDF形式で作成しましょう。
        使いやすいインターフェースとカスタマイズ可能なテンプレートで、ビジネスの請求処理をスムーズに行います。簡単な入力フォームから情報を入力し、
        即座に請求書を生成します。">
        <!-- Fonts -->
        <link href="<https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap>" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@ITcha50">
        <meta name="twitter:title" content="無料の請求書ジェネレーター">
        <meta name="twitter:description" content="無料で登録もなく利用できるオンラインサービスを使って、簡単に適格請求書をPDF形式で作成しましょう。
                使いやすいインターフェースとカスタマイズ可能なテンプレートで、ビジネスの請求処理をスムーズに行います。簡単な入力フォームから情報を入力し、
                即座に請求書を生成します。">
        <meta name="twitter:image" content="https://eng50cha.com/img/open_invoice.png">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script> -->
    </head>
<body>
    <!-- Twitterシェアボタン -->

    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="無料の請求書ジェネレーター" data-url="{{url('invoice/open')}}">Tweet</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="container home">
        <div class="top">
            <img src="../img/open_invoice.png" alt="無料で適格請求書を作成するツールのロゴ" style="width:30%;">
                <h2>無料で登録もなく利用できるオンラインサービスを使って、簡単に適格請求書をPDF形式で作成しましょう。
                使いやすいインターフェースとカスタマイズ可能なテンプレートで、ビジネスの請求処理をスムーズに行います。簡単な入力フォームから情報を入力し、
                即座に請求書を生成します。</h2>
        </div>
        <div class="form">
            <h1>無料の請求書ジェネレーター</h1>
            <p style="text-align:center;">※必要な箇所だけ入力しましょう</p>
            <a href="{{url('invoice/open_r')}}" class="button">領収書ジェネレーターはこちら</a>
            <form action="{{ route('pdf_open') }}" method="GET">
                @csrf
                <div class="r-box">
                    <div class="form-block">
                        <label for="invoice_number">請求書No.</label>
                        <input type="text" id="invoice_number" name="invoice_number">
                    </div>
                    <div class="form-block">
                        <label for="billing-address">請求先</label>
                        <input type="text" id="billing-address" name="billing-address">
                    </div>
                    <div class="form-block">
                        <label for="billing-date">請求日</label>
                        <input type="date" id="billing-date" name="billing-date">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type1" class="col-md-4 col-form-label text-md-end">{{ __('内訳1') }}</label>
                        <input type="text" id="type1" name="type1">
                    </div>
                    <div class="form-block">
                        <label for="tax1"><input type="radio" id="tax1" name="category1" value="1" checked>税率10%</label>
                        <label for="tax2"><input type="radio" id="tax2" name="category1" value="2">税率8%</label>
                    </div>
                    <div class="form-block">
                        <label for="cost1">単価</label>
                        <input type="text" id="cost1" name="cost1">
                    </div>
                    <div class="form-block">
                            <label for="count1">数量</label>
                            <input type="text" id="count1" name="count1">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type2" class="col-md-4 col-form-label text-md-end">{{ __('内訳2') }}</label>
                        <input type="text" id="type2" name="type2">
                    </div>
                    <div class="form-block">
                        <label for="tax3"><input type="radio" id="tax3" name="category2" value="1" checked>税率10%</label>
                        <label for="tax4"><input type="radio" id="tax4" name="category2" value="2">税率8%</label>
                    </div>
                    <div class="form-block">
                        <label for="cost2">単価</label>
                        <input type="text" id="cost2" name="cost2">
                    </div>
                    <div class="form-block">
                            <label for="count2">数量</label>
                            <input type="text" id="count2" name="count2">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type3" class="col-md-4 col-form-label text-md-end">{{ __('内訳3') }}</label>
                        <input type="text" id="type3" name="type3">
                    </div>
                    <div class="form-block">
                        <label for="tax5"><input type="radio" id="tax5" name="category3" value="1" checked>税率10%</label>
                        <label for="tax6"><input type="radio" id="tax6" name="category3" value="2">税率8%</label>
                    </div>
                    <div class="form-block">
                        <label for="cost3">単価</label>
                        <input type="text" id="cost3" name="cost3">
                    </div>
                    <div class="form-block">
                            <label for="count3">数量</label>
                            <input type="text" id="count3" name="count3">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type4" class="col-md-4 col-form-label text-md-end">{{ __('内訳4') }}</label>
                        <input type="text" id="type4" name="type4">
                    </div>
                    <div class="form-block">
                        <label for="tax7"><input type="radio" id="tax7" name="category4" value="1" checked>税率10%</label>
                        <label for="tax8"><input type="radio" id="tax8" name="category4" value="2">税率8%</label>
                    </div>
                    <div class="form-block">
                        <label for="cost4">単価</label>
                        <input type="text" id="cost4" name="cost4">
                    </div>
                    <div class="form-block">
                            <label for="count4">数量</label>
                            <input type="text" id="count4" name="count4">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳5') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="tax9"><input type="radio" id="tax9" name="category5" value="1" checked>税率10%</label>
                        <label for="tax10"><input type="radio" id="tax10" name="category5" value="2">税率8%</label>
                    </div>
                    <div class="form-block">
                            <label for="cost5">単価</label>
                        <input type="text" id="cost5" name="cost5">
                    </div>
                    <div class="form-block">
                            <label for="count5">数量</label>
                            <input type="text" id="count5" name="count5">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                            <label for="company_name">会社名</label>
                            <input type="text" id="company_name" name="company_name">
                    </div>
                    <div class="form-block">
                            <label for="postal_number">郵便番号</label>
                            <input type="text" id="postal_number" name="postal_number">
                    </div> <div class="form-block">
                            <label for="address">住所</label>
                            <input type="text" id="address" name="address">
                    </div>
                    <div class="form-block">
                            <label for="phone_number">電話番号</label>
                            <input type="text" id="phone_number" name="phone_number">
                    </div>
                    <div class="form-block">
                            <label for="company_number">登録番号</label>
                            <input type="text" id="company_number" name="company_number">
                    </div>
                </div>
                <button type="submit">請求書作成</button>
            </form>
        </div>
        @auth
        @else
        <div class="offer">
            <p>無料登録すれば、会社情報や内訳を保存できて、更に入力が簡単になります！申込はこちら</p>

            <div class="register-button">
                    <a target="_blank" href="{{ route('register_index') }}" class="header_nav_itm_link">新規登録</a>
            </div>
        </div>
        @endauth
    </div>
    <footer class="site-footer">
        <div class="bc-sitemap-wrapper">
            <div class="sitemap clearfix">
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">関連情報</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('blog/index')}}">ブログ</a></li>
                            <l><a href="{{ url('news/index')}}">お知らせ</a></li>
                                <li><a href="{{ url('partner')}}">パートナー</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">サポート</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ route('contact.index')}}">お問い合わせ</a></li>
                            <li><a href="{{ url('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div id="nav_menu2" class="widget_nav_menu">
                    <h2 class="widget-title">会社情報</h2>
                    <div class="menu-site-map-1-container">
                        <ul id="menu-site-map-1" class="menu">
                            <li><a href="{{ url('policy')}}">プライバシー</a></li>
                            <li><a href="{{ url('rule')}}">利用規約</a></li>
                            <li><a href="{{ url('aboutus')}}">About Us</a></li>
                            <li><a href="{{ url('consumer')}}">特定商取引</a></li>
                        </ul>
                    </div>
                </div>
                <div class="site-info">
                    <div class="widget">
                        <div class="copy-right">
                            <span class="copy-right-text">© All rights reserved by llco</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>

    </footer>
</body>
</html>
