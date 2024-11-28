@extends('layouts.app2')
<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->

<head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements(); 

        // カードエレメントを作成
        const card = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a',
                },
            },
            hidePostalCode: true,  // 郵便番号フィールドを非表示にする
        });

        // カードエレメントをHTMLにマウント
        card.mount('#card-element');

        // リアルタイムでエラーを表示
        card.on('change', function(event) {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // フォーム送信処理
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            // 名前を取得
            const cardholderName = document.getElementById('cardholder-name').value;

            // PaymentMethodを作成
            const {paymentMethod, error} = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: cardholderName,
                },
            });

            if (error) {
                // エラー表示
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                // PaymentMethod IDをサーバーに送信
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);

                console.log('PaymentMethod ID:', paymentMethod.id); // デバッグ用にPaymentMethod IDを確認

                form.submit();
            }
        });
    });
</script>
</head>

<div class="container">
    <h1>在庫アプリサブスクリプション申込</h1>
    <p>1ヶ月500円でサブスクリプションを開始します。</p>
    
    <!-- サブスクリプションフォーム -->
    <form id="payment-form" method="POST" action="{{ route('subscribe', $stock->id) }}">
        @csrf
        <input type="text" id="cardholder-name" class="form-control mb-3" placeholder="カード名義人" required>
        <!-- Stripeカード入力要素 -->
        <div id="card-element" class="form-control mb-3"></div>
        <div id="card-errors" class="text-danger"></div>

        <!-- サブミットボタン -->
        <button type="submit" class="btn btn-primary mt-3">サブスクリプション開始</button>
    </form>
</div>

@section('scripts')
<!-- 必要に応じて追加のJSコードをここに記載 -->
@endsection