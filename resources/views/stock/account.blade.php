<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
@extends('layouts.app2') <!-- 既存のレイアウトを使用 -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="side"> <!-- サイドバー -->
    <p>
    <h1>{{$stock->name}}</h1>
    </p>
    <nav class="sidebar">
        <p><a href="{{ route('products',['id'=>$stock->id]) }}">
                <h3>在庫一覧画面</h3>
            </a></p>
        <p><a href="{{ route('order_table',['id'=>$stock->id]) }}">
                <h3>注文一覧</h3>
            </a></p>
        <p><a href="{{ route('ship_table',['id'=>$stock->id]) }}">
                <h3>発送表一覧</h3>
            </a></p>
        <p><a href="{{ route('mail_box',['id'=>$stock->id]) }}">
            <h3>メールボックス</h3>
        </a></p>
        <p><a href="{{ route('out_table',['id'=>$stock->id]) }}">
            <h3>出庫表</h3>
        </a></p>
        <p><a href="{{ route('in_table',['id'=>$stock->id]) }}">
                <h3>入庫表</h3>
            </a></p>
        <p><a href="{{ route('qr_list',['id'=>$stock->id]) }}">
            <h3>QRコード一覧</h3>
        </a></p>
        <p><a href="{{ route('supplier',['id'=>$stock->id]) }}">
            <h3>取引先登録</h3>
        </a></p>
        <p><a href="{{ route('staff',['id'=>$stock->id]) }}">
            <h3>従業員登録</h3>
        </a></p>
        <p><a href="{{ route('account',['id'=>$stock->id]) }}">
            <h3>登録情報・支払い情報</h3>
        </a></p>
    </nav>
    <div class="button">
        <form action="{{ route('stock_logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>
<!-- モバイル専用ハンバーガーメニュー -->
<div class="mobile-menu">
    <div class="hamburger" id="hamburger">
        ☰ <!-- ハンバーガーアイコン -->
    </div>

    <!-- モバイル用メニュー -->
    <nav class="sidebar" id="mobileMenu">
        <p><a href="{{ route('products',['id'=>$stock->id]) }}"><h3>在庫一覧画面</h3></a></p>
        <p><a href="{{ route('order_table',['id'=>$stock->id]) }}"><h3>注文一覧</h3></a></p>
        <p><a href="{{ route('ship_table',['id'=>$stock->id]) }}"><h3>発送表一覧</h3></a></p>
        <p><a href="{{ route('mail_box',['id'=>$stock->id]) }}"><h3>メールボックス</h3></a></p>
        <p><a href="{{ route('out_table',['id'=>$stock->id]) }}"><h3>出庫表</h3></a></p>
        <p><a href="{{ route('in_table',['id'=>$stock->id]) }}"><h3>入庫表</h3></a></p>
        <p><a href="{{ route('qr_list',['id'=>$stock->id]) }}"><h3>QRコード一覧</h3></a></p>
        <p><a href="{{ route('supplier',['id'=>$stock->id]) }}"><h3>取引先登録</h3></a></p>
        <p><a href="{{ route('staff',['id'=>$stock->id]) }}"><h3>従業員登録</h3></a></p>
        <p><a href="{{ route('account',['id'=>$stock->id]) }}"><h3>登録情報・支払い情報</h3></a></p>
        <div class="button">
            <form action="{{ route('stock_logout') }}" method="post">
                @csrf <!-- CSRF保護 -->
                <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
            </form>
        </div>
    </nav>
</div>
<div class="container">
    <h1>アカウントページ</h1>
        <div class="card-body">
            <h5 class="card-title">アカウント情報</h5>
            <p><strong>メールアドレス:</strong> {{ $stock->email }}</p>
            <p><strong>会社名:</strong> {{ $stock->name }}</p>
            <p><strong>郵便番号:</strong> {{ $stock->postal }}</p>
            <p><strong>住所:</strong> {{ $stock->address }}</p>
            <p><strong>電話番号:</strong> {{ $stock->tel }}</p>

            <div class="d-flex justify-content-start mt-4">
                <!-- 修正ボタン -->
                <div class="button">
                    <a href="{{ route('account.edit',['id'=>$stock->id]) }}" class="btn btn-primary me-3">修正</a>
                </div>
                <!-- サブスク申込/提出ボタン -->
                @if ($subscription_status === 1)
                <div class="button">
                    <a href="{{ route('confirm-cancel',['id'=>$stock->id]) }}" class="btn btn-success">サブスク停止</a>
                </div>
                @else
                <div class="button">
                    <a href="{{ route('apply',['id'=>$stock->id]) }}" class="btn btn-secondary">サブスク申込</a>
                </div>
                @endif
            </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function () {
        mobileMenu.classList.toggle('show'); // トグルで表示/非表示を切り替える
    });
});
</script>