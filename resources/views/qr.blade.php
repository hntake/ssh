@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
@section('content')

<div class="side"> <!-- サイドバー -->
    <p>
    <h1>{{$stock->name}}</h1>
    </p>
     <nav class="sidebar">
        <p><a href="{{ route('products',['id'=>$stock->id]) }}">
                <h3>在庫一覧画面</h3>
            </a></p>
        <p><a href="{{ route('order_table',['id'=>$stock->id]) }}">
                <h3>注文一覧</h3>
            </a></p>
        <p><a href="{{ route('ship_table',['id'=>$stock->id]) }}">
                <h3>発送表一覧</h3>
            </a></p>
        <p><a href="{{ route('out_table',['id'=>$stock->id]) }}">
            <h3>出庫表</h3>
        </a></p>
        <p><a href="{{ route('in_table',['id'=>$stock->id]) }}">
                <h3>入庫表</h3>
            </a></p>
        <p><a href="{{ route('qr_list',['id'=>$stock->id]) }}">
            <h3>QRコード一覧</h3>
        </a></p>
        <p><a href="{{ route('supplier',['id'=>$stock->id]) }}">
            <h3>取引先登録</h3>
        </a></p>
    </nav>
    <div class="buttom">
        <form action="{{ route('stock_logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>
<!-- 持ち出し申請用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 持ち出し申請フォーム -->
    <form action="{{route('qr',['id'=> $product->id])}}" method="post" class="float-right">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="control-label">出庫申請</label>

            <div class="col-sm-6">
                <label>品目名</label>
                {{$product->product_name}}
            </div>
            <div class="col-sm-6">
                <label>数量</label>
                1
            </div>
            <div class="col-sm-6">
                <label>従業員ID</label>
                <input type="text" name="staff" id="staff" class="form-control">
            </div>

        </div>

        <!-- 備品登録ボタン -->
        <div class="form-group">
            <div class="button">
            <button type="submit" name="action" value="stock_out">
                    <i class="fa fa-minus"></i> 出庫申請する
                </button>
            </div>
        </div>
    </form>
    <!-- 入庫申請用フォーム -->
    <form action="{{ route('qr', ['id'=> $product->id]) }}" method="post" class="float-right">
        {{ csrf_field() }}

        <!-- 入庫申請 -->
        <div class="form-group">
            <label for="product-name" class="control-label">出庫・入庫申請</label>

            <div class="col-sm-6">
                <label>品目名</label>
                {{$product->product_name}}
            </div>
            <div class="col-sm-6">
                <label>数量</label>
                1
            </div>
            <div class="col-sm-6">
                <label>従業員ID</label>
                <input type="text" name="staff" id="staff" class="form-control">
            </div>
        </div>

        <!-- 入庫申請ボタン -->
        <div class="form-group">
            <div class="button">
                <button type="submit" name="action" value="stock_in">
                    <i class="fa fa-plus"></i> 入庫申請する
                </button>
            </div>
        </div>
    </form>
    <a href="{{ route('staff',['id'=>$stock->id,'qr' =>$product->id]) }}">
                <h3>従業員登録画面</h3>
            </a>
</div>
@endsection
