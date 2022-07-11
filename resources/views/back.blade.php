@extends('layouts.app', ['authgroup'=>'admin'])
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<title>管理者専用画面 自分の英単語テストを作って公開しよう！英語学習サイト”エーゴメ”</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="admincard">
                <div class="card-header">{{ Auth::user()->school }}{{ __('専用画面') }}</div>
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
                                <th style="width:5%">テストID</th>
                                <th style="width:5%">学年</th>
                                <th style="width:15%">教科書名</th>
                                <th style="width:15%">テスト名</th>
                                <th style="width:15%">作成者</th>
                                <th style="width:15%">利用者</th>
                                <th style="width:15%">利用日</th>
                                <th style="width:15%"></th>

                            </tr>
                        </thead>
                        <tbody id="tbl">
                            <tr>
                                @foreach ($histories as $history)
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
                <div class="school">
                    <table class="admin">
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
                                <td><a href="{{route('mypicture',['id'=>$user->id])}}">{{ $user->name }}</a></td>
                                <td>{{ $user->point }}</td>
                                <td>{{ \Carbon\Carbon::parse($user->updated_at)->toDateString()}}</td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="select">
                    <!--検索フォーム-->
                    <div class="row">
                        <h3>データ抽出</h3>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_onehour')}}">
                                <button type="submit" class="btn btn-primary ">1時間</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_today')}}">
                                <button type="submit" class="btn btn-primary ">24時間</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_week')}}">
                                <button type="submit" class="btn btn-primary ">一週間</button>
                            </form>
                        </div>
                        <div class="col-sm">
                            <form method="GET" action="{{ route('select_month')}}">
                                <button type="submit" class="btn btn-primary ">一か月</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
