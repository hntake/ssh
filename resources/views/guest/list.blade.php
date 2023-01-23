@extends('layouts.app')

<title>店舗リスト画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- word.cssと連携 -->


<div class="searchtable-responsive">


    <!--検索結果テーブル 検索された時のみ表示する-->
    @if (!empty($guests))
    <div class="test-hover" >
        <p>全{{ $guests->count() }}件</p>
        <table class="table table-hover" style="width:100%;">
            <thead style="background-color: #ffd900">
                <tr>
                    <th style="width:10%">店舗名</th>
                    <th style="width:10%">かな</th>
                    <th style="width:5%">CODE</th>
                    <th style="width:5%">タイプ</th>
                    <th style="width:10%">uuid</th>
                    <th style="width:10%">メールアドレス</th>
                    <th style="width:10%">電話番号</th>
                    <th style="width:5%"></th>
                    <th style="width:5%"></th>
                </tr>
            </thead>
            @foreach($guests as $guest)
            <tr>
                <td>{{ $guest->name }}</td>
                <td>{{$guest->name_kana }}</td>
                <td>{{$guest->code }}</td>
                <td>{{$guest->type }}</td>
                <td>{{$guest->uuid }}</td>
                <td>{{$guest->email }}</td>
                <td>{{$guest->tel }}</td>
                <td> <div class="pro_button" style="margin:0;"><a href="{{ route('edit_store_picture',['id'=> $guest->id]) }}">画像変更</a></div></td>
                <td> <div class="pro_button" style="margin:0;"><a href="{{ route('guest.used_coupon',['id'=> $guest->id]) }}">クーポン記録</a></div></td>
            </tr>
            @endforeach
        </table>
    </div>
    <!--テーブルここまで-->
    <!--ページネーション-->
    <div class="d-flex justify-content-center">
        {{-- appendsでカテゴリを選択したまま遷移 --}}
        {{ $guests->appends(request()->input())->links() }}
    </div>
    <!--ページネーションここまで-->
    @endif
</div>
</div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
