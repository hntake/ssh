@extends('layouts.app')
<title>新規登録画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

@section('content')
<div class="top">
    <a href="{{ url('/') }}">
        <h3>トップページに戻る</h3>
    </a>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">{{ __('登録画面') }}</div>
            <div class="sampleform">
                <a href="img/sample1.png" target=_blank>記入例</a>
            </div>
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="store">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('プロフィール写真') }}</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="r-box ">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前 ※必須') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="r-box">
                            <label for="school1" class="col-md-4 col-form-label text-md-end">{{ __('クラス番号') }}</label>
                            <p>（学校や塾で番号をもらった人は、000000を削除して、その番号を入力して下さい）</p>
                            <div class="col-md-6">
                                <input id="school1" type="text" class="form-control " name="school1" value="00000{{ old('school1') }}" autocomplete="school1" autofocus>
                            </div>
                        </div>
                        <div class="r-box">
                            <label for="school2" class="col-md-4 col-form-label text-md-end">{{ __('クラス番号その２') }}</label>
                            <p>（二か所から番号をもらっているなら、ここにもう一つの番号を入力して下さい）</p>
                            <div class="col-md-6">
                                <input id="school2" type="text" class="form-control " name="school2" value="00000{{ old('school2') }}" autocomplete="school2" autofocus>
                            </div>
                        </div>
                        <div class="r-box">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('学年') }}</label>

                            <div class="col-md-6">
                                <select name="year">
                                    @foreach(config('year') as $key => $nen)
                                    <option value="{{ $nen}}" {{ old('year') === $nen ? "selected" : ""}}>{{ $nen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="r-box">
                            <label for="place" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                            <div class="col-md-6">
                                <select name="place">
                                    @foreach(config('pref') as $key => $value)
                                    <option value="{{ $value}}" {{ old('place') === $value ? "selected" : ""}}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="r-box">
                            <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('ユーザーネーム ※必須') }}</label>
                            <p>（他の人と同じにならないようなユーザー名にしましょう。最長10文字まで）</p>
                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>

                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="r-box">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address ※必須') }}</label>
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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password ※必須 8桁以上') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password ※必須') }}</label>

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
<div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="https://eng50cha.com/register" data-color="default" data-size="small" data-count="false" data-ver="3" style="display: none;"></div>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="英単語強化サイト・エイゴメ登録無料！" data-show-count="false">Tweet</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
