@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->

<title>{{$diet->name}}議員個別画面 Watch them!国会議員監視サイト</title>

@section('content')

<body>
    <div class="header-logo-menu">
        <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
            <ul>
                    <li><a href="{{ url('diet/index') }}">
                            <h3 ontouchstart="">議員一覧画面に戻る</h3>
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
    <div class="left">
        <div class="profile">

            <h3>議員名：{{ $diet->name }}</h3>
            <h3>議院：{{ $diet->type }}</h3>
            <h3>会派：{{ $diet->party }}</h3>
            <h3>選挙区：{{ $diet->area }}</h3>
            <h3>@if($diet->age)
                        <td>{{ $diet->age}}歳</td>
                        @else
                        <td>
                        <form method="POST" action="{{route('update_diet',['id'=> $diet->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                            <input type="text" name="birthDay" id="birthDay" class="form-control" size="15" placeholder="誕生日を入力">
                            <div class="button"><input type="submit" value="更新">
                        </td>
                        </form>
                        @endif
                    </h3>
            <h3>当サイト登録不祥事度：{{ $diet->scandal }}</h3>
            {{ $now }}
            <p>時点</p>
            <div class="image">
                <tr class="cell">
                @if($diet->type=="衆議院")
                <img src="https://www.shugiin.go.jp/internet/itdb_giinprof.nsf/html/profile/{{$diet->image}}.jpg/$File/{{$diet->image}}.jpg" alt="代替テキスト">
                @else
                <img src="https://www.sangiin.go.jp/japanese/joho1/kousei/giin/photo/{{$diet->image}}.jpg" alt="代替テキスト">
                @endif
                </tr>
                <tr>
                @if($diet->bribe > 0)
            <img src="../../img/bribe.png" alt="裏金議員">
            @endif
            </tr>
            <tr>
            @if($diet->cult==1)
            <img src="../../img/cult.png" alt="壺議員">
            @endif
            </tr> 
            <tr>
            @if($diet->link > 0)
            <img src="../../img/list.png" alt="不祥事議員">
            @endif
            </tr>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="links">
            <h3>当サイトに投稿され承認された不詳記事一覧</h3>
            @if(count($links) > 0)
                @foreach($links as $link)
                    @if($link->approved==1)
                    <h3><a href="{{$link->address}}">{{$link->title}}</a></h3>
                    @endif
                @endforeach
            @else
            <p>現時点では当サイトには投稿されておりません</p>
            @endif
        </div>
        <div class="add">
            <img id="showFormBtn" src="../../img/add.png" alt="add" style="width:15%; height:15%; cursor:pointer;">
            <img id="showFormBtn" src="../../img/click.png" alt="不祥事議員" style="width:15%; height:15%; cursor:pointer;">

            <p>↑誰でも投稿できます！(管理サイドで承認後、反映されます)</p>
            <p>※ 当サイトでは個人の思想や意見に基づく発言は、不祥事の定義からは除外されています。他にも、牛歩等の議会戦術も除外します。</p>

        </div>
        <div id="formContainer" style="display: none;">
            <form action="{{ route('diet_post',['id'=>$diet->id]) }}" method="post">
                @csrf
                <div class="add-link">
                    <table>
                            <tbody>
                                <div class="form-group">
                                    <label for="title">記事タイトル:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="記事タイトル" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">リンクアドレス(※ソースがないものは投稿できません):</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="リンクアドレス" value="{{ old('address') }}">
                                </div>
                                <div class="form-group">
                                    <p>不祥事のジャンルを選んでください(※判定が難しい場合はその他を選んでください。)</p>
                                    {{ Form::select('genre', $genres, null, ['class' => 'form-control', 'id' => 'genre']) }}
                                </div>

                            </tbody>
                    </table>
                </div>
                <div class="check">
                    <button type="submit">
                        作成
                    </button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </form>
    </div>
    
</body>
<script>
    // ボタンのクリックイベントを設定
document.getElementById('showFormBtn').addEventListener('click', function() {
    // フォームの表示/非表示を切り替え
    var formContainer = document.getElementById('formContainer');
    if (formContainer.style.display === 'none') {
        formContainer.style.display = 'block';
    } else {
        formContainer.style.display = 'none';
    }
});

</script>
@endsection





