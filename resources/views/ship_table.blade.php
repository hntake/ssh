@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->

@section('script')

@endsection

@section('content')

<div class="side"> <!-- サイドバー -->
    <p>
    <h1>cafe57</h1>
    </p>
    <nav class="sidebar">
        <p><a href="{{ url('products') }}">
                <h3>在庫一覧画面</h3>
            </a></p>
        <p><a href="{{ url('order_table') }}">
                <h3>注文一覧</h3>
            </a></p>
        <p><a href="{{ url('ship_table') }}">
            <h3>注文表一覧</h3>
        </a></p>
        <!-- <p><a href="{{ url('') }}"><h3>シフト申請画面</h3></a></p>
                <p><a href="{{ url('') }}">・シフト管理画面</a></p>
                <p><a href="{{ url('') }}">・勤怠一覧画面</a></p> -->
    </nav>
    <div class="logout_buttom">
        <form action="{{ route('logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>

<!--注文表一覧画面-->
<div class="table-responsive">
    <p>注文表一覧</p>
    <!--  //formからmailにそして、shipに名前変更// -->
    <form action="{{ route('ship') }}" method="GET">
        <table class="table-hover">
            <thead>
                <tr>
                    <th>注文表番号</th>
                    <th>取引先名</th>
                    <th>日付</th>
                    <th>従業員名</th>
                    <th>送信</th>


                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($ships as $ship)
                <tr>

                    <td style="width:20% "><a href="{{url('form_id/'.$ship->id)}}">{{ $ship->id }}</a></td>
                    <td style="width:20%">{{ $ship->supplier_name }}</td>
                    <td style="width:20%">{{ $ship->created_at }}</td>
                    <td style="width:20%">{{ $ship->staff }}</td>
                    @if($ship->status==1)
                    <td style="width:20%">送信済み</td>
                    @else
                    <td style="width:20%">未送信</td>
                    @endif


                    </td>
                </tr>
                @endforeach
                <!-- //formからmailにそしてshipに名前変更// -->

            </tbody>
            @yield('script')
        </table>
    </form>

</div>
@endsection
