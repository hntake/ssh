@extends('layouts.app2')

<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->

@section('content')
<div class="container">
    <h1>アカウント情報を修正</h1>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('account.update',['id'=>$stock->id]) }}">
                @csrf
                <!-- メールアドレス -->
                <div class="mb-3">
                    <label for="email" class="form-label">メールアドレス</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $stock->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 会社名 -->
                <div class="mb-3">
                    <label for="name" class="form-label">会社名</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $stock->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- 郵便番号 -->
                <div class="mb-3">
                    <label for="postal" class="form-label">郵便番号</label>
                    <input type="text" class="form-control @error('postal') is-invalid @enderror" id="postal" name="postal" value="{{ old('postal', $stock->postal) }}">
                    @error('postal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- 住所 -->
                <div class="mb-3">
                    <label for="address" class="form-label">住所</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $stock->address) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 電話番号 -->
                <div class="mb-3">
                    <label for="tel" class="form-label">電話番号</label>
                    <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{ old('tel', $stock->tel) }}">
                    @error('tel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ボタン -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('account',['id'=>$stock->id]) }}" class="btn btn-secondary">キャンセル</a>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection