<!-- resources/views/gift/show.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/gift.css') }}">

@section('content')
<div class="container">
    <h1>ギフトカード</h1>
    <h2>{{$gift->store->name}}</h2>
    <!-- 残高表示 -->
    <div class="balance">
        <h3>残高: ¥{{ number_format($gift->balance) }}</h3>
    </div>

    <!-- QRコード表示 -->
    <div class="qrcode">
        {!! QrCode::size(250)->generate(url('gift/verify/' . $gift->uuid)) !!}
    </div>

    <!-- 支払いフォーム -->
    <form action="{{ route('gift_pay', ['uuid' => $gift->uuid]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">使用する金額:</label>
            <input type="number" id="amount" name="amount" class="form-control" placeholder="金額を入力" value="{{ old('amount') }}" required>
            @error('amount')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">支払う</button>
    </form>

    <!-- 支払い成功メッセージ -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection