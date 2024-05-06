@extends('layouts.app')

<title>Watch them! 国会議員監視サイト</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="このサイトでは、現役国会議員のデータをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
<meta name="keywords" content="自民党  裏金問題 統一教会 落選運動 国会議員 年齢順 衆議院 参議院 議員一覧">
<meta name="author" content="llco">
<meta name="robots" content="index, follow">
@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->

<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
<body>
        @if(!empty($links))
            <p>承認待ち不詳記事一覧</p>
            <div class="links">

            @foreach($links as $link)
                <tr>
                    <td>
                        <h3><a href="{{$link->address}}">{{$link->title}}</a></h3>
                        <h3><a href="{{$link->address}}">{{$link->diet_id}}</a></h3>

                    </td>
                    <td>
                        {{$link->Genre->genre}}
                    </td>
                    <td>
                    <form action="{{ route('diet_approve',['id'=>$link->id]) }}" method="post">
                    @csrf
                        <div class="check">
                            <button type="submit">
                                承認
                            </button>
                        </div>
                    </td>
                    </form>
                    <div class="test_button">
                            <a href="{{ route('delete_link',['id'=> $link->id]) }}" >削除する</a>

                        </div>
                </tr>
            @endforeach
            </div>

        @endif
</body>
@endsection