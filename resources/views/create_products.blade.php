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
<!-- 備品登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->

    <!-- 新備品フォーム -->
    <form action="{{ route('update',['id'=>$stock->id]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="col-sm-3 control-label">備品登録画面</label>


            <div class="col-sm-6">
                <label>品目</label>
                <input type="text" name="product_name" id="product_name" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>登録数</label>
                <input type="text" name="stock" id="stock" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>発注ライン</label>
                <input type="text" name="order" id="order" class="form-control">
            </div>
            <div class="col-sm-6">
                <label>取引先</label>
                <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="addNewSupplier()">新規登録</button>
                    </div>
                <div class="input-group" style="margin-top:20px;">
                    <input type="text" name="supplier_name" id="supplier_name" class="form-control" 
                        placeholder="取引先選択" onclick="toggleSupplierList()" readonly>
                </div>
                <ul id="supplier_list" class="list-group" 
                    style="display:none;  list-style-type: none; z-index: 1000; background: white; border: 1px solid #ccc; width: 100%;">
                    <?php foreach ($suppliers as $supplier): ?>
                        <li class="list-group-item" onclick="selectSupplier('<?php echo htmlspecialchars($supplier->name, ENT_QUOTES, 'UTF-8'); ?>')">
                            <?php echo htmlspecialchars($supplier->name, ENT_QUOTES, 'UTF-8'); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
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
<script>
    function toggleSupplierList() {
    const supplierList = document.getElementById('supplier_list');
    supplierList.style.display = supplierList.style.display === 'none' ? 'block' : 'none';
    }

    function selectSupplier(supplierName) {
        document.getElementById('supplier_name').value = supplierName;
        document.getElementById('supplier_list').style.display = 'none'; // リストを非表示にする
    }
    function getIdFromPath() {
        const path = window.location.pathname;
        const match = path.match(/\/(\d+)$/); // 最後の数字を抽出
        return match ? match[1] : null;
    }
    function addNewSupplier() {
        const id = getIdFromPath(); // パスからidを取得
        if (id) {
            // 絶対パスを指定して遷移
            window.location.href = `/stock/supplier_register/${id}`;
        } else {
            alert("IDが見つかりませんでした。");
        }
    }
    function getParameterByName(name) {
        const url = window.location.href;
        const regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)');
        const results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
</script>
@endsection
