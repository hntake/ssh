@extends('layouts.app')
<title>ログイン画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<style>
    .login_banner{
        display:flex;
    }.login{
        width:40%;
    }

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <br>
        <div class="for_user">
            <p>会員の方は以下からログイン願います</p>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font:bold; color:darkgray;">{{ __('ログインする') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="error">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="error">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('←ログイン状態を維持する') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ログインする') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れましたか?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="register-button" style="margin-top:10px;border-radius:unset;padding-top:0px;padding-bottom:10px;">
                    <p>登録してエイゴメの全ての機能を使おう！(完全無料)</p>
                    <a href="{{ route('register') }}" class="button">新規登録</a>
                </div>
            </div>
            <div class="login_banner">
                <div class="login">
                    <a href="{{ url('/invoice/login') }}"><h3 style="color:coral; font:bold;">請求書作成サイトのログインはこちらから</h3> 
                    <img src="/img/open_invoice.png" alt="請求書作成" style="width:60%; height:auto;"></a>
                </div>
                <div class="login">
                    <a href="{{ url('/stock/login') }}"><h3 style="color:coral; font:bold;">在庫アプリのログインはこちらから</h3> 
                    <img src="/img/stock.png" alt="在庫アプリ" style="width:30%; height:auto;"></a>
                </div>
            </div>
            <div class="coupon-img">
                <h3 style="color:coral; font:bold;">クーポンテストご利用の方は、<br>お店にありますQRコードから再度お入りください。</h3>
                <a href="{{ url('/') }}"> <img src="/img/coupon.png" alt="coupon" style="width:100%; height:auto;"></a>
            </div>
        </div>
    </div>
    <div class="news">
        <p>ログインのトラブルなどはこちらから</p>
        <a href="{{ url('faq') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: blue;margin: 0 auto;">FAQ質問集</a>
    </div>
</div>
@endsection
