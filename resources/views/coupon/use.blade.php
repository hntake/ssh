<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>クーポン取得画面</title>
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
                <span class="sp-none">
                    @if($store->type == 1)
                    <img src="/img/coupon100_use.png" alt="coupon">
                    @elseif($store->type == 2)
                    <img src="/img/coupon10_use.png" alt="coupon">
                    @elseif($store->type == 3)
                    <img src="/img/coupon5_use.png" alt="coupon">
                    @elseif($store->type == 4)
                    <img src="/img/coupon_drink_use.png" alt="coupon">
                    @else
                    <img src="/img/coupon_sweet_use.png" alt="coupon">
                    @endif
                </span>
            </div>
            <div class="due">
            クーポン利用期限<br>{{$tomorrow}}より<span style="color:red; font-weight:bold;">{{$due}}</span>
            </div>
            <div class="time-container">
                    <p id="timer"></p>
            </div>
        </div>
            <div>
                <form class="form-inline" action="{{route('coupon.used',['id'=>$id,'coupon_id'=>$coupon_id])}}" method="POST" autocomplete="off">
                    @csrf
                    <div>
                        <button type="submit"  autocomplete="new-password">クーポンを使う</button>
                    </div>
                    <div class="next">
                        <h3 style="color:red; font-weight:bold;">次の画面をお店の方に見せてください</h3>
                    </div>
                </form>
            </div>

    </div>
    <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
    <input type="hidden" name="id" value="{{$id}}">
    <script>
    window.addEventListener('DOMContentLoaded', ()=>{
    const t0=30*60*1000;
    const t1=new Date().getTime();
    setInterval(()=>{
        const t2=new Date().getTime();
        const t3=t0+t1-t2
        const m=(parseInt(t3/60/1000)).toString().padStart(2,'0');
        const s=(parseInt(t3/1000)%60).toString().padStart(2,'0');
        const ms=(parseInt(t3/10)%100).toString().padStart(2,'0');
        timer.textContent=`${m}:${s}.${ms}`;
    },10);
    });
    </script>
    </body>

