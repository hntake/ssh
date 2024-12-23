@extends('layouts.app2')

<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
@section('script')

@endsection

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
            <p><a href="{{ route('mail_box',['id'=>$stock->id]) }}">
                <h3>メールボックス</h3>
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
            <p><a href="{{ route('passcode.form',['id'=>$stock->id]) }}"><h3>従業員登録（管理者専用）</h3></a></p>

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
<!-- モバイル専用ハンバーガーメニュー -->
<div class="mobile-menu">
    <div class="hamburger" id="hamburger">
        ☰ <!-- ハンバーガーアイコン -->
    </div>

    <!-- モバイル用メニュー -->
    <nav class="sidebar" id="mobileMenu">
        <p><a href="{{ route('products',['id'=>$stock->id]) }}"><h3>在庫一覧画面</h3></a></p>
        <p><a href="{{ route('order_table',['id'=>$stock->id]) }}"><h3>注文一覧</h3></a></p>
        <p><a href="{{ route('ship_table',['id'=>$stock->id]) }}"><h3>発送表一覧</h3></a></p>
        <p><a href="{{ route('mail_box',['id'=>$stock->id]) }}"><h3>メールボックス</h3></a></p>
        <p><a href="{{ route('out_table',['id'=>$stock->id]) }}"><h3>出庫表</h3></a></p>
        <p><a href="{{ route('in_table',['id'=>$stock->id]) }}"><h3>入庫表</h3></a></p>
        <p><a href="{{ route('qr_list',['id'=>$stock->id]) }}"><h3>QRコード一覧</h3></a></p>
        <p><a href="{{ route('supplier',['id'=>$stock->id]) }}"><h3>取引先登録</h3></a></p>
        <p><a href="{{ route('passcode.form',['id'=>$stock->id]) }}"><h3>従業員登録（管理者専用）</h3></a></p>
        <p><a href="{{ route('account',['id'=>$stock->id]) }}"><h3>登録情報・支払い情報</h3></a></p>
        <div class="button">
            <form action="{{ route('stock_logout') }}" method="post">
                @csrf <!-- CSRF保護 -->
                <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
            </form>
        </div>
    </nav>
</div>
<!-- 持ち出し申請用パネル… -->
<div class="panel-body">
    <!-- エラーが存在する場合のみ表示 -->
    @if ($errors->has('staff'))
        <div class="alert alert-danger">
            {{ $errors->first('staff') }}
        </div>
    @endif
    <!-- 出庫と入庫の選択ボタン -->
    <div class="form-group">
        <p>入庫か出庫をクリック</p>
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
                <input type="number" name="out_amount" id="out_amount" class="form-control" value="1" min="1">
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
                <input type="number" name="in_amount" id="in_amount" class="form-control" value="1" min="1">
            </div>
            <div class="col-sm-6">
                <label>伝票番号</label>
                <input type="number" name="voucher" id="voucher" class="form-control" >
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', function () {
            mobileMenu.classList.toggle('show'); // トグルで表示/非表示を切り替える
        });
    });
    </script>
@endsection
