<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>クーポン利用ページ</title>
    <link rel="stylesheet" href="{{asset('../css/blog.css')}}">
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/coupon.css') }}"> <!-- word.cssと連携 -->

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
                {!! $store->name !!}クーポン<br>
                <div class="due">
                    クーポン利用期限<br>{{$tomorrow}}より<span style="color:red; font-weight:bold;">{{$due}}</span>
                </div>
                <div class="limit_time">
                    <p>クーポンを使う時まで<br><span style="color:red; font-weight:bold;">クリックしない</span>でください<br><br>
                        クリック後、30分を過ぎると<br><span style="color:red; font-weight:bold;">利用不可</span>となります。</p>
                    <p>1会計につき、1枚のみご利用頂けます。</p>
                    <p>ご利用は一回限りとなります。</p>

                </div>
            </div>
        </div>
        <form method="GET" action="{{ route('coupon.use',['id'=>$id,'coupon_id'=>$coupon_id])}}">
            @csrf
            クリックしてクーポンを表示します
            <br>
            <br>

            <button type="submit_button" name="action" value="submit">
                クーポン表示ページへ
            </button>
        </form>
        <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
        <input type="hidden" name="id" value="{{$id}}">

        <div class="timelimit">
            <img src="/img/timelimit2.png" alt="limit">
        </div>
    </div>

</body>
