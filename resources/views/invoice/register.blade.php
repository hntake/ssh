@extends('layouts.app')
<title>新規登録画面 </title>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

@section('content')
<div class="top">
    <a href="{{ url('/invoice/open') }}">
        <h3 style="text-decoration: none; color: #090;">トップページに戻る</h3>
    </a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('仮登録画面') }}</div>
            
            <div class="card">

            <div class="register-box">
                <form method="POST" action="{{ route('register_invoice') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="r-box">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address ') }}</label><span style="font-weight:bold;">※必須</span>
                            <p style="text-align: left; width: 80%;">（登録したメールアドレスに@itcha50.comより<span style="color:red;">認証メール</span>が送信されます。間違いがないように気を付けて入力してください。）</p>
                            <p style="text-align: left; width: 80%;">(docomo、au、softbankなど各キャリアのセキュリティ設定により受信拒否と認識されているか、迷惑メール対策などでドメイン指定受信を設定している場合に、メールが正しく届かないことがございます。<span style="color:red;">gmailなどのフリーメールでの登録</span>をおすすめします。)</p>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="r-box">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード 8桁以上') }}</label><span style="font-weight:bold;">※必須</span>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="r-box">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワードの確認入力Password ') }}</label><span style="font-weight:bold;">※必須</span>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録する') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

