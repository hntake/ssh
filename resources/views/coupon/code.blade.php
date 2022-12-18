<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>英単語テストでクーポンをゲットしよう！</title>
        <link rel="stylesheet" href="{{asset('../css/blog.css')}}">
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik+Dirt&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body>
    <div class="wrapper">




        <div class="test">
            <div class="guest">
                <h1>
                @if(!$store->image == null)
                    <img src="{{ asset('storage/' . $store->image) }}" alt="image">

                        @else
                    <img src="/img/welcome.png" alt="welcome">
                    @endif
                </h1>
                            <a href="{{('/')}}" target="_blank"><img src="/img/coupon.png" alt="coupon" style="width:100%; height:auto;"></a>
                            <span class="sp-none">
                                @if($store->type == 1)
                                <img src="/img/coupon100.png" alt="coupon">
                                @elseif($store->type == 2)
                                <img src="/img/coupon10.png" alt="coupon">
                                @elseif($store->type == 3)
                                <img src="/img/coupon5.png" alt="coupon">
                                @elseif($store->type == 4)
                                <img src="/img/coupon_drink.png" alt="coupon">
                                @else
                                <img src="/img/coupon_sweet.png" alt="coupon">
                                @endif
                            </span>

            </div>
        </div>
            <div>
                <form class="form-inline" action="{{route('coupon.code',['id'=>$id])}}" method="POST" autocomplete="off">
                    @csrf
                    QRコード下にある5桁のコードを入力して<br>テスト画面へ移動してください
                    <input type="text" id="code" name="code">
                    <div>
                        <button type="submit"  autocomplete="new-password">テスト画面へ</button>
                    </div>
                </form>
            </div>
            <div class="timelimit">
                <img src="/img/timelimit.png" alt="limit">
            </div>
            <div class="button">
            <a href="{{ url('policy')}}">プライバシーポリシー</a>
            </div>
    </div>
    <input type="hidden" name="id" value="{{$id}}">
    </body>

