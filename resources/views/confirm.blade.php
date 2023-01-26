@extends('layouts.app')

        <title>Today's TEST 確認ページ  英語学習サイト”エイゴメ”</title>

        @section('content')
        <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->

        <link rel="stylesheet" href="{{ asset('css/test.css') }}"> <!-- word.cssと連携 -->
        <link rel="stylesheet" href="{{ asset('css/calendar.css') }}"> <!-- word.cssと連携 -->
    <body>
    <div class="wrapper">

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
                <li><a href="{{ url('today') }}">
                        <h3>Today's TEST</h3>
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
                <li><a href="{{ url('admin') }}">
                        <h3>管理者画面に戻る</h3>
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


<div class="confirm">
        <div class="total">
            <img src="/img/total.png" alt="total" >
            <ul>
                <li>
                    <div class="number">{{$total}}</div>
                </li>
                @if(!$game->goal ==NULL)
                <li>
                    <div class="fish">
                        目標ポイント{{$game->goal_point}}<br>
                        {{$game->goal}}
                    </div>
                </li>
                @endif
                <li>
                <img id="imageArea" src="/img/good_job1.png" alt="gj1">
                <script>
                    const imageArea = document.getElementById('imageArea');
                    const images = [
                        '/img/good_job1.png',
                        '/img/good_job2.png',
                        '/img/good_job3.png',
                       ];

                    const imageNo = Math.floor( Math.random() * images.length)
                    imageArea.src = images[imageNo];
                 </script>
                </li>
            </ul>
        </div>
        <div class="goal">

        </div>
        <div class="testtable-responsive">
            <div class="title">My Record</div>
            <table class="table-all">
                <thead style="display:contents;">
                    <tr>
                        <th style="width:20%">日付</th>
                        <th style="width:20%">学年</th>
                        <th style="width:20%">テスト名</th>
                    </tr>
                </thead>
                <tbody id="tbl">
                    @foreach ($points as $point)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($point->created_at)->toDateString() }}</td>
                        <td>{{ $point->Type->type }}</td>
                        <td>{{ $point->test_name }}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <script>
        $(function() {
        history.pushState(null, null, null);

        $(window).on("popstate", function(){
            history.pushState(null, null, null);
        });
        });
    </script>
 </body>





