@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/guest.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/coupon.css') }}"> <!-- word.cssと連携 -->

<meta http-equiv="Expires" content="0">


<title>テスト結果 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


<div class="testtable-responsive">
    <table class="table-all">
        <div class="score">
            <h2>得点</h2>
            {{$score}}点
            <p style="text-align:left;">エイゴメのテストは、色々な人によって作られたテストです。正答に間違いがある事もありますのでご了承ください</p>
        </div>
        <div class="coupon">
            @if($score >7)
            <form method="POST" action="{{ route('coupon.confirm',['coupon_id'=>$coupon_id])}}">
                @csrf
                @if($store->due == 1)
                <img src="/img/coupon_get.png" alt="coupon" style="width:100%; height:auto;">
                @elseif($store->due == 2)
                <img src="/img/coupon_get_60.png" alt="coupon" style="width:100%; height:auto;">
                @else
                <img src="/img/coupon_get_180.png" alt="coupon" style="width:100%; height:auto;">
                @endif
                <div class="tooltip">
                    <input id="email" name="email" placeholder type="text" value="{{ old('email') }}">
                    <br>
                    <span class="tooltiptext">Eメールアドレスを入力してください。</span>
                    <input class="submit" type="submit" name="submitEmail" value="入力内容確認"><br><span style="color:red; font-weight:bold;">
                    当店からのメールレターを希望される方はこちらをチェックしてください</span>
                    <input id="policy_id" type="checkbox" name="policy_id" value="1">
                </div>
            </form>
            @else
            <a href="{{route('coupon.retest',['coupon_id'=>$coupon_id,'test_id'=>$test_id])}}"><img src="/img/again.png" alt="again" style="width:100%; height:auto;"></a>
            @endif
        </div>
        <thead>
            <div class="result-table">
                <h3>テスト結果 正解</h3>
            </div>
            <tr>
                <th style="width:20%">番号</th>
                <th style="width:20%">結果</th>
                <th style="width:20%">問題</th>
                <th style="width:20%">正答</th>
            </tr>
        </thead>
        <tbody>
            <tr class="onetest">
                <td>1</td>
                <td> {{$result1}}</td>
                @if($result1 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja1}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en1}}</td>
                @else
                <td>{{ $word->ja1}}</td>
                <td>{{ $word->en1}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>2</td>
                <td> {{$result2}}</td>
                @if($result2 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja2}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en2}}</td>
                @else
                <td>{{ $word->ja2}}</td>
                <td>{{ $word->en2}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>3</td>
                <td> {{$result3}}</td>
                @if($result3 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja3}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en3}}</td>
                @else
                <td>{{ $word->ja3}}</td>
                <td>{{ $word->en3}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>4</td>
                <td> {{$result4}}</td>
                @if($result4 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja4}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en4}}</td>
                @else
                <td>{{ $word->ja4}}</td>
                <td>{{ $word->en4}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>5</td>
                <td> {{$result5}}</td>
                @if($result5 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja5}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en5}}</td>
                @else
                <td>{{ $word->ja5}}</td>
                <td>{{ $word->en5}}</td>
                @endif
            <tr class="onetest">
                <td>6</td>
                <td> {{$result6}}</td>
                @if($result6 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja6}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en6}}</td>
                @else
                <td>{{ $word->ja6}}</td>
                <td>{{ $word->en6}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>7</td>
                <td> {{$result7}}</td>
                @if($result7 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja7}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en7}}</td>
                @else
                <td>{{ $word->ja7}}</td>
                <td>{{ $word->en7}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>8</td>
                <td> {{$result8}}</td>
                @if($result8 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja8}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en8}}</td>
                @else
                <td>{{ $word->ja8}}</td>
                <td>{{ $word->en8}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>9</td>
                <td> {{$result9}}</td>
                @if($result9 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja9}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en9}}</td>
                @else
                <td>{{ $word->ja9}}</td>
                <td>{{ $word->en9}}</td>
                @endif
            </tr>
            <tr class="onetest">
                <td>10</td>
                <td> {{$result10}}</td>
                @if($result10 === 'X')
                <td style="color:red;font-weight:bold;">{{ $word->ja10}}</td>
                <td style="color:red;font-weight:bold;">{{ $word->en10}}</td>
                @else
                <td>{{ $word->ja10}}</td>
                <td>{{ $word->en10}}</td>
                @endif
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
    <input type="hidden" name="test_id" value="{{$test_id}}">


</div>
@endsection
