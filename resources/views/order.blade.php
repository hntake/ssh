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
        <p><a href="{{ route('staff',['id'=>$stock->id]) }}">
        <h3>従業員登録</h3>
        </a></p>

        <p><a href="{{ route('account',['id'=>$stock->id]) }}">
            <h3>登録情報・支払い情報</h3>
        </a></p>
    </nav>
    <div class="button">
        <form action="{{ route('stock_logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>
<!-- 注文申請用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 注文申請フォーム -->
    <form action="{{ url('insert') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">注文申請</label>
            <form action="insert" id="new_order" method="POST">
                {{ csrf_field()}}
                <div class="col-sm-6">
                    <label>型番</label>
                    {{ $product->id  }}
                    <input type="hidden" name="product_id" value="{{ $product->id  }}" />
                </div>

                <div class="col-sm-6">
                    <label>品目</label>
                    {{ $product->product_name }}
                    <input type="hidden" name="product_name" value="{{ $product->product_name  }}" />
                </div>
                <div class="col-sm-6">
                    <label>数量</label>
                    <input type="text" name="new_order" value="{{$order_number}}" />
                </div>
                <div class="col-sm-6">
                    <label>従業員名</label>
                    <input type="text" name="staff" id="staff" class="form-control">
                </div>
        </div>

        <!-- 注文登録ボタン -->
        <div class="button">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> 申請する
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
