@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>マイプロフィール画面 自分の英単語テストを作って公開しよう！英語学習サイト”エイゴメ”</title>

@section('content')


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('home') }}">
                        <h3>ホーム画面に戻る</h3>
                    </a></li>
                <li><a href="{{ url('history') }}">
                        <h3>全履歴</h3>
                    </a></li>
                <li><a href="{{ url('profile') }}">
                        <h3>Myページ</h3>
                    </a></li>
                <li><a href="{{ url('all_list') }}">
                        <h3>テスト一覧</h3>
                    </a></li>
                <li><a href="{{ url('create') }}">
                        <h3>新規作成</h3>
                    </a></li>
                <li><a href="{{ url('search_result') }}">
                        <h3>テスト検索</h3>
                    </a></li>
                <li><a href="{{ url('search_user') }}">
                        <h3>ユーザー検索</h3>
                    </a></li>
            </ul>
        </div>
        <script>
            $(function() {
                $('#nav-content li a').on('click', function(event) {
                    $('#nav-input').prop('checked', false);
                });
            });
        </script>
    </div>
</div>
<div class="profile">

    <h3>ユーザー名：{{ $user->user_name }}</h3>
    @if(!$user->place==null)
    <h3>エリア：{{ $user->place }}</h3>
    @else
    <h3>エリア：未選択</h3>
    @endif
    <h3>クラス番号：{{ $user->school1}}</h3>
    @if(!$user->school2==null)
    <h3>クラス番号2：{{ $user->school2}}</h3>
    @endif
    @if(!$user->year==null)
    <h3>学年：{{ $user->year }}</h3>
    @else
    <h3>学年：未選択</h3>
    @endif
    {{ $user->updated_at }}
    <p>時点</p>
    <h3>レベル :{{$user->level}}</h3>
    <p>総ポイント数（{{ $user->point }}）</p>
    <p>フォロワー数（{{ $count }}）</p>
    <div class="image">
        <tr class="cell">
            @if(!$user->image == null)
            <td><img src="{{ asset('storage/' . $user->image) }}" alt="image">
            <td>
                @else
            <td><img src="/img/icon_man.png" alt="man_icon"></td>
            @endif
        </tr>
    </div>
    <div class="pro_button"><a href="{{ route('edit_user',['id'=> $user->id]) }}">プロフィール編集</a></div>
    <div class="pro_button"><a href="{{ route('edit_picture',['id'=> $user->id]) }}">プロフィール画像変更</a></div>
    <div class="pro_button">
        {{-- 削除ボタン --}}
        <form action="{{route('delete_user',['id'=> $user->id])}}" method="post" class="float-right">
            @csrf
            @method('delete')
            <input type="submit" value="登録削除" onclick='return confirm("削除しますか？");'>
        </form>
    </div>
</div>
<div class="wrap">
    <div class="table-responsive">
        <p>作成一覧</p>
        <table class="table-all">
            <thead>
                <tr>
                    <th style="width:10%">学年</th>
                    <th style="width:20%">教科書名</th>
                    <th style="width:20%">テスト名</th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($words as $word)
                <tr>
                    <td>{{ $word->Type->type }}</td>
                    <td>{{ $word->Textbook->textbook }}</td>
                    <td>{{ $word->test_name }}</td>
                    <td>
                        <div class="button"><a href="{{ route('test',['id'=>$word->id]) }}">表示</a></div>
                    </td>
                    <td>
                        <div class="button"><a href="{{ route('edit',['id'=>$word->id]) }}">編集</a></div>
                    </td>
                    <td>
                        <div class="button"><a href="{{ route('delete_list',['id'=> $word->id]) }}">削除</a></div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
    <!--フォロー一覧-->
    <div class="table-responsive">
        <p>フォロー一覧</p>
        <table class="table-all">
            <thead>
                <tr>
                    <th style="width:10%">ユーザー名</th>
                    <th style="width:15%"></th>
                    <th style="width:15%"></th>
                </tr>
            </thead>
            <tbody id="tbl">
                @foreach(array_map(NULL, $followers, $niceids,$images) as [ $follower, $niceid, $image ])
                <tr>
                    <td>{{ $follower }}</td>
                    @if(!$image == null)
                    <td><img src="{{ asset('storage/' . $image) }}" alt="image">
                        @else
                    <td><img src="/img/icon_man.png" alt="man_icon"></td>
                    @endif
                    <td>
                        <div class="button"><a href="{{ route('mypicture',['id'=>$niceid]) }}">表示</a></div>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
