@extends('layouts.app', ['authgroup'=>'admin'])
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<title>管理者専用画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="admincard">
                <div class="card-header">{{Auth::user()->school}}管理者 {{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
                <div class="school">
                    <p>利用履歴一覧</p>
                    <table class="admin">
                        <thead>
                            <tr>
                                <th style="width:7%">テストID</th>
                                <th style="width:7%">学年</th>
                                <th style="width:15%">教科書名</th>
                                <th style="width:15%">テスト名</th>
                                <th style="width:15%">作成者</th>
                                <th style="width:15%">利用者</th>
                                <th style="width:15%">利用日</th>
                                <th style="width:15%">利用テスト</th>

                            </tr>
                        </thead>
                        <tbody id="tbl">
                            @foreach ($histories as $history)
                            <tr>
                                <td>{{ $history->test_id }}</td>
                                <td>{{ $history->Type->type }}</td>
                                <td>{{ $history->Textbook->textbook }}</td>
                                <td>{{ $history->test_name }}</td>
                                <td>{{ $history->user_name }}</td>
                                <td>{{ $history->tested_name }}</td>
                                <td>{{\Carbon\Carbon::parse($history->created_at)->toDateString() }}</td>
                                <td>
                                    <div class="button"><a href="{{ route('test',['id'=>$history->test_id]) }}">表示</a></div>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{ $histories->links() }}
                </div>
                <div class="point_school">
                    <p>学内ポイントランキング</p>
                    <table class="admin_point">
                        <thead>
                            <tr>
                                <th style="width:20%">ユーザー名</th>
                                <th style="width:20%">総ポイント数</th>
                                <th style="width:20%">更新日時</th>
                            </tr>
                        </thead>
                        <tbody id="tbl">
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</a></td>
                                <td>{{ $user->point }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->toDateString()}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="individual">
            <div class="button"><a href="{{ route('individual',['id'=>Auth::user()->school])}}">個別データ検索へ</a></div>
            </div>
            <div class="admincard">

                    <!--検索フォーム-->
                    <div class="row">
                        <h3>データ抽出</h3>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_today',['id'=>Auth::user()->school])}}">
                                <button type="submit" class="btn ">直近24時間以内利用</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_week',['id'=>Auth::user()->school])}}">
                                <button type="submit" class="btn ">直近一週間利用</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_twoweeks',['id'=>Auth::user()->school])}}">
                                <button type="submit" class="btn  ">直近2週間以内利用</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_month',['id'=>Auth::user()->school])}}">
                                <button type="submit" class="btn">直近一か月利用</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
