<!-- 在庫一覧画面のView -->

@extends('layouts.app2')
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
<!-- 取引先登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 新備品フォーム -->
    <form action="{{ route('staff_register',['id'=>$stock->id,'qr' =>$qr]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="name" class="col-sm-3 control-label">従業員登録画面</label>


            <div class="col-sm-6">
                <label>従業員名</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>

        <!-- 備品登録ボタン -->
        <div class="form-group">
            <div class="button">
                <button type="submit">
                    登録する
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
