@extends('layouts.app')

<title>Watch them! 国会議員監視サイト”</title>
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


<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
        <ul>
            <li><a href="{{ route('diet_party',['id'=>'jimin']) }}">
                    <h3 ontouchstart="">自民党</h3>
                </a></li>
            <li><a href="{{ route('diet_party',['id'=>'rikken']) }}">
                    <h3 ontouchstart="">立憲民主党</h3>
                </a></li>
            <li><a href="{{ route('diet_party',['id'=>'ishin']) }}">
                    <h3 ontouchstart="">日本維新の会</h3>
                </a></li>
            <li><a href="{{ route('diet_party',['id'=>'kyousan']) }}">
                    <h3 ontouchstart="">日本共産党</h3>
                </a></li>
            <li><a href="{{ route('diet_party',['id'=>'kokumin']) }}">
                    <h3 ontouchstart="">国民民主党</h3>
                </a></li> 
            <li><a href="{{ route('diet_party',['id'=>'reiwa']) }}">
                    <h3 ontouchstart="">れいわ新選組</h3>
                </a></li>    
            <li><a href="{{ route('diet_party',['id'=>'nhk']) }}">
                    <h3 ontouchstart="">NHK党</h3>
                </a></li> 
            <li><a href="{{ route('diet_party',['id'=>'other']) }}">
                    <h3 ontouchstart="">無所属</h3>
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

<div class="testtable-responsive">
    @if($id=='jimin')
    <p>自民党 議員一覧</p>
    @elseif($id=='rikken')
    <p>立憲民主党 議員一覧</p>
    @elseif($id=='ishin')
    <p>日本維新の会 議員一覧</p>
    @elseif($id=='kyousan')
    <p>日本共産党 議員一覧</p>
    @elseif($id=='koumei')
    <p>公明党 議員一覧</p>
    @elseif($id=='kokumin')
    <p>国民民主党 議員一覧</p>
    @elseif($id=='reiwa')
    <p>れいわ新選組 議員一覧</p>
    @elseif($id=='nhk')
    <p>NHK党 議員一覧</p>
    @else
    <p>無所属 議員一覧</p>
    @endif
    <table class="table-all">
        <ul>
            <li>
                <form method="GET" action="{{ route('search_id')}}">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">議員名</label>
                        <!--入力-->
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="searchId" placeholder="検索したい議員名を入力してください">
                        </div>
                        <div class="col-sm-auto">
                        <button type="submit" class="btn btn-primary ">議員検索</button>
                        </div>
                    </div>
                </form>
            </li>
            <!--sort button-->
            <li>
                <form action="{{ route('diet_sort') }}" method="GET">
                    @csrf
                    <select name="narabi">
                        <option value="asc">名前順(昇順)</option>
                        <option value="desc">名前順(降順)</option>
                        <option value="old">年齢順(高い順)</option>
                        <option value="young">名前順(若い順)</option>
                        <option value="scandal">不祥事多い順</option>
                        <option value="scandal">不祥事少ない順</option>
                    </select>
                    <div class="form-group">
                        <div class="button">
                            <input type="submit" value="で並び替え"></input>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
        <thead>
            <tr>
                <th style="width:5%">会派</th>
                <th style="width:10%">選挙区</th>
                <th style="width:20%">名前</th>
                <th style="width:5%">年齢</th>
                <th style="width:20%">不祥事数</th>
                <th></th>

            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($diets as $diet)
            <tr>
                <td>{{ $diet->type }}</td>
                <td>{{ $diet->area }}</td>
                <td>{{ $diet->name }}</td>
                <td>{{ $diet->age}}</td>
                <td>{{ $diet->scandal }}</td>
                <td>
                    <div class="button"><a href="{{ route('diet_each',['id'=>$diet->id]) }}">表示</a></div>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    {{ $diets->links() }}
</div>


@if(Route::has('auth.admin'))
<p>管理者の方は</p>
<a href="{{ url('admin') }}" class="center-button">管理者画面へ</a>
@endif
@endsection