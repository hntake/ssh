@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->

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

</div>

<div class="table-responsive">
<form action="{{  route('form',['id'=>'〇〇本舗']) }}" method="GET">
    <p>注文内容確認</p>
        <div>
            送信先：〇〇本舗
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>注文番号</th>
                        <th>品目</th>
                        <th>注文数量</th>
                        <th>注文日付</th>
                    </tr>
                </thead>
                <tbody id="tbl">
                    @foreach($ships as $ship)
                    @if($ship->supplier_name == "〇〇本舗")
                    <tr>
                        <td>{{ $ship->id }}</td>
                        <td>{{ $ship->product_name }}</td>
                        <td>{{ $ship->new_order }}</td>
                        <td>{{ $ship->created_at}}</td>
                        {{csrf_field()}}
                    @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
                <input type="submit" name="send" value="送信">
            </p>
        </div>
</form>
<form action="{{  route('form',['id'=>'△△工業']) }}" method="GET">
        <br>
        <br>
        <br>
        <div>
            送信先：△△工業
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>注文番号</th>
                        <th>品目</th>
                        <th>注文数量</th>
                        <th>注文日付</th>
                    </tr>
                </thead>
                <tbody id="tbl">
                    @foreach($ships as $ship)
                    @if($ship->supplier_name == "△△工業")
                    <tr>
                        <td>{{ $ship->id }}</td>
                        <td>{{ $ship->product_name }}</td>
                        <td>{{ $ship->new_order }}</td>
                        <td>{{ $ship->created_at}}</td>
                        {{csrf_field()}}
                    @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>
                <input type="submit" name="send" value="送信">
            </p>
        </div>
</form>

</div>
@endsection
