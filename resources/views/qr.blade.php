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

    <!-- 出庫と入庫の選択ボタン -->
    <div class="form-group">
        <button type="button" class="btn btn-primary" onclick="toggleForm('stock_out')">
            出庫申請
        </button>
        <button type="button" class="btn btn-success" onclick="toggleForm('stock_in')">
            入庫申請
        </button>
    </div>

    <!-- 出庫申請フォーム -->
    <form id="stock_out_form" action="{{ route('qr', ['id' => $product->id]) }}" method="post" style="display: none;">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="product-name" class="control-label">出庫申請</label>

            <div class="col-sm-6">
                <label>品目名</label>
                {{ $product->product_name }}
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

        <div class="form-group">
            <button type="submit" name="action" value="stock_out">
                <i class="fa fa-minus"></i> 出庫申請する
            </button>
        </div>
    </form>

    <!-- 入庫申請フォーム -->
    <form id="stock_in_form" action="{{ route('qr', ['id' => $product->id]) }}" method="post" style="display: none;">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="product-name" class="control-label">入庫申請</label>

            <div class="col-sm-6">
                <label>品目名</label>
                {{ $product->product_name }}
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

        <div class="form-group">
            <button type="submit" name="action" value="stock_in">
                <i class="fa fa-plus"></i> 入庫申請する
            </button>
        </div>
    </form>

    <script>
    // フォームを切り替える関数
    function toggleForm(action) {
        // すべてのフォームを非表示にする
        document.getElementById('stock_out_form').style.display = 'none';
        document.getElementById('stock_in_form').style.display = 'none';

        // クリックされたボタンに応じてフォームを表示
        if (action === 'stock_out') {
            document.getElementById('stock_out_form').style.display = 'block';
        } else if (action === 'stock_in') {
            document.getElementById('stock_in_form').style.display = 'block';
        }
    }
    </script>
@endsection
