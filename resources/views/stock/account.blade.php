<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
@extends('layouts.app2') <!-- 既存のレイアウトを使用 -->
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
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