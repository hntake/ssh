<!-- resources/views/store/verify.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/gift.css') }}">

@section('content')
<div class="container">
    <h1>ギフトカードの確認</h1>

    <!-- 残高表示 -->
    <div class="balance">
        <h2>残高: ¥{{ number_format($gift->balance) }}</h2>
    </div>

    <!-- 店舗コード入力フォーム -->
    <form action="{{ route('store_verify', ['uuid' => $gift->uuid]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="store_code">店舗コード:</label>
            <input type="text" id="store_code" name="store_code" class="form-control" placeholder="店舗コードを入力" required>
            @error('store_code')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">確認する</button>
    </form>

    <!-- 成功メッセージ -->
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection