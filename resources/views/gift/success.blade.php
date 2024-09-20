<!-- resources/views/store/success.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/gift.css') }}">

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h1 class="display-4 text-success mb-4">店舗コードが確認されました</h1>

                    <p class="fs-5 mb-3">このギフトカードの残高:</p>
                    <h2 class="fw-bold text-primary mb-4">¥{{ number_format($gift->balance) }}</h2>
                    @if(session('purchase'))
                        @if(session('purchase')->amount > 0)
                            <p class="fs-5 mb-3 text-success">支払われた金額: ¥{{ number_format(session('purchase')->amount) }}</p>
                        @endif
                    @endif

                    <p class="lead mb-4">店舗コードの確認が完了しました。ギフトカードを使用して決済を行えます。</p>
                    <p class="mb-4">顧客の支払いを確認したら、下の更新ボタンを押して決済を確認してください。</p>

                    <!-- 更新ボタン -->
                    <form method="POST" action="{{ route('updateBalance', ['uuid' => $gift->uuid]) }}">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary shadow-sm">
                            <i class="fas fa-sync-alt me-2"></i> 更新
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection