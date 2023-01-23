@extends('layouts.app')

<title>利用クーポン記録画面 英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- word.cssと連携 -->


<div class="searchtable-responsive">


    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($coupons))
    <div class="test-hover" >
        <p>利用クーポン記録 全{{ $coupons->count() }}件</p>
        <table class="table table-hover" style="width:100%;">
            <thead style="background-color: #ffd900">
                <tr>
                    <th style="width:10%">クーポン番号</th>
                    <th style="width:10%">発行日</th>
                    <th style="width:5%">利用日</th>
                    <th style="width:10%">メールアドレス</th>
                </tr>
            </thead>
            @foreach($coupons as $coupon)
            <tr>
                <td>{{ $coupon->id }}</td>
                <td>{{$coupon->created_at }}</td>
                <td>{{$coupon->updated_at }}</td>
                @if($coupon->policy==1)
                <td>{{$coupon->email }}</td>
                @else
                <td>提供希望せず</td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $coupons->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
</div>
</div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
