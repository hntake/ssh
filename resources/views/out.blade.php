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
    <div class="logout_buttom">
        <form action="{{ route('logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>
<!-- 持ち出し申請用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->


    <!-- 持ち出し申請フォーム -->
    <form action="{{ url('subtract') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="control-label">持ち出し申請</label>

            <div class="col-sm-6">
                <label>型番</label>
                <input type="text" name="product_id" id="product_id" class="form-control">
            </div>
            <!--エラー防止の為一時削除
             <div class="col-sm-6">
              <label>品目</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div> -->
            <div class="col-sm-6">
                <label>数量</label>
                <input type="text" name="out_amount" id="out_amount" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>従業員名</label>
                <input type="text" name="staff" id="staff" class="form-control">
            </div>

        </div>

        <!-- 備品登録ボタン -->
        <div class="form-group">
            <div class="button">
                <button type="submit">
                    <i class="fa fa-plus"></i> 申請する
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
