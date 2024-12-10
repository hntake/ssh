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
<div class="table-responsive">
    <p>在庫一覧表</p>
    <table class="table-hover">
        <thead>
            <tr>
                <th style="width:10%">型番</th>
                <th style="width:30%">品目</th>
                <th style="width:20%">取引先</th>
                <th style="width:10%">在庫数</th>
                <th style="width:10%">発注ライン</th>
                <th style="width:10%">アラート</th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td class="editable" data-id="{{ $product->id }}" data-column="supplier_name">{{ $product->supplier_name }}</td>
                <td>{{ $product->stock }}</td>
                <td class="editable" data-id="{{ $product->id }}" data-column="order">{{ $product->order }}</td>
                <!-- <アラートボタン表示> -->
                <td class="alert"> 
                @if( $product->stock < $product->order  && $product->status == 1)
                    <p>済</p>
                @elseif($product->stock < $product->order )
                    <a href="{{ route('order', $product->id) }}">{{$product->id}}</a>
                @endif
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button">
        <a href="{{ route('create_products',['id'=>$stock->id])}}">備品登録</a>
    <!-- 入庫申請リンク -->
    <a href="{{ route('store', ['id' => $stock->id, 'action' => 'stock_in']) }}">入庫申請</a>

    <!-- 出庫申請リンク -->
    <a href="{{ route('store', ['id' => $stock->id, 'action' => 'stock_out']) }}">出庫申請</a>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editableCells = document.querySelectorAll('.editable');
        
        editableCells.forEach(cell => {
            cell.addEventListener('click', function () {
                const currentValue = this.textContent;
                const productId = this.getAttribute('data-id');
                const column = this.getAttribute('data-column');
                
                const input = document.createElement('input');
                input.type = column === 'stock' || column === 'order' ? 'number' : 'text';
                input.value = currentValue;
                input.classList.add('editable-input');
                
                input.addEventListener('blur', () => saveChange(input, cell, productId, column));
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter') saveChange(input, cell, productId, column);
                });
                
                this.textContent = '';
                this.appendChild(input);
                input.focus();
            });
        });
        
        function saveChange(input, cell, productId, column) {
            const newValue = input.value;
            fetch(`/update-product/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ [column]: newValue })
            }).then(response => {
                console.log(response); // レスポンスを確認するためのログ
                return response.json();                
            }).then(data => {
                cell.textContent = data[column];
                }).catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection
