@extends('layouts.app')

<title>目標設定ページ　英語学習サイト”エイゴメ”</title>

@section('content')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- word.cssと連携 -->

<div class="header-logo-menu">
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <ul>
                <li><a href="{{ url('all_list') }}">
                        <h3>テスト一覧</h3>
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

<div class="searchtable-responsive">
    <div class="comment">
        <br>
        <form class="form-inline" action="{{route('goal',['id'=>$id])}}" method="POST">
                @csrf
                <input type="text" name="point" id="point" class="form-control" size="50" placeholder="" value="{{ old('point') }}" style="width: 400px; height: 100px;">
                <input type="text" name="goal" id="goal" class="form-control" size="150" placeholder="" value="{{ old('‘goal') }}" style="width: 400px; height: 100px;">
                <div class="check">
                    <button type="submit">
                        変更
                    </button>
                </div>
            </form>



    </div>
</div>
</main>
@endsection
<a href="#" class="gotop">トップへ</a>
