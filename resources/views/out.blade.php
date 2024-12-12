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
        <p><a href="{{ route('staff',['id'=>$stock->id]) }}"><h3>従業員登録</h3></a></p>
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
    <!-- 持ち出し申請フォーム -->
    <form action="{{ route('subtract', ['id' => $stock->id]) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 備品データ名 -->
        <div class="form-group">
            <label for="product-name" class="control-label">
                {{ $action === 'stock_out' ? '出庫申請' : '入庫申請' }}
            </label>

            @foreach($products as $product)
                <div class="col-sm-6">
                    <label>{{ $product->product_name }}</label>
                    <input type="checkbox" name="product_ids[]" value="{{ $product->id }}" onclick="toggleQuantityField({{ $product->id }})">
                    
                    <!-- 数量入力欄（デフォルトで非表示） -->
                    <div id="quantity-field-{{ $product->id }}" style="display: none; margin-top: 5px;">
                        <label>数量</label>
                        <input type="number" name="quantities[{{ $product->id }}]" class="form-control" min="1" placeholder="数量を入力してください">
                    </div>

                </div>
            @endforeach

            <div class="col-sm-6">
                <label>従業員名</label>
                <input type="text" name="staff" id="staff" class="form-control">
            </div>

                <!-- 入庫申請の場合に伝票番号入力欄を表示 -->
                @if($action === 'stock_in')
            <div class="col-sm-6">
                <label>伝票番号</label>
                <input type="text" name="invoice_number" class="form-control" placeholder="伝票番号を入力してください">
            </div>
            @endif
        </div>

        <!-- 申請ボタン -->
        <div class="form-group">
            <div class="button">
                <button type="submit" name="action" value="{{ $action }}">
                    <i class="fa {{ $action === 'stock_out' ? 'fa-minus' : 'fa-plus' }}"></i>
                    {{ $action === 'stock_out' ? '出庫申請する' : '入庫申請する' }}
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    function toggleQuantityField(productId) {
        const quantityField = document.getElementById(`quantity-field-${productId}`);
        
        // チェックされているかどうかで表示・非表示を切り替える
        if (quantityField.style.display === "none") {
            quantityField.style.display = "block";
        } else {
            quantityField.style.display = "none";
        }
    }
</script>
<script>
    const quantityFieldsContainer = document.getElementById('quantity-fields');

    document.getElementById('product_ids').addEventListener('change', function () {
        const selectedProducts = Array.from(this.selectedOptions);

        // Clear existing quantity fields not in the selected options
        Array.from(quantityFieldsContainer.children).forEach(child => {
            const fieldId = child.getAttribute('data-product-id');
            if (!selectedProducts.some(option => option.value === fieldId)) {
                child.remove();
            }
        });

        // Add quantity fields for newly selected products
        selectedProducts.forEach(option => {
            const productId = option.value;
            const productName = option.text;

            // Check if the field already exists
            if (!document.querySelector(`[data-product-id="${productId}"]`)) {
                // Create a container for each selected product
                const fieldContainer = document.createElement('div');
                fieldContainer.className = 'form-group';
                fieldContainer.setAttribute('data-product-id', productId);
                fieldContainer.innerHTML = `
                    <label>${productName} 数量</label>
                    <input type="number" name="out_amount[${productId}]" class="form-control" min="1" placeholder="数量を入力してください">
                `;

                quantityFieldsContainer.appendChild(fieldContainer);
            }
        });
    });
</script>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function () {
        mobileMenu.classList.toggle('show'); // トグルで表示/非表示を切り替える
    });
});
</script>