@extends('layouts.app2')

<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->

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

<!--発送表一覧画面-->
<div class="table-responsive">
    <p>発送表一覧</p>
    <form action="{{ route('form') }}" method="POST">
    @csrf
        <table class="table-hover">
            <thead>
                <tr>
                    <th>注文表番号</th>
                    <th>品目名</th>
                    <th>取引先名</th>
                    <th>数量</th>
                    <th>日付</th>
                    <th>従業員名</th>
                    <th>状況</th>
                    <th>選択</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($ships as $ship)
                <tr data-supplier="{{ $ship->supplier_name }}">
                <td style="width:20% "><a href="{{ route('form_id', ['id' => $ship->id]) }}">{{ $ship->id }}</a></td>
                <td style="width:20%">{{ $ship->product_name }}</td>
                    <td style="width:20%">{{ $ship->supplier_name }}</td>
                    <td style="width:20%">{{ $ship->new_order }}</td>
                    <td style="width:20%">{{ $ship->created_at }}</td>
                    <td style="width:20%">{{ $ship->staff }}</td>                        
                    @if($ship->status==1)
                    <td style="width:20%">送信済み</td>
                    <td></td>
                    @else
                    <td style="width:20%">未送信</td>
                    </td>
                    <td>
                    <input type="checkbox" name="selected_orders[]" value="{{ $ship->id }}" class="supplier-checkbox" data-supplier="{{ $ship->supplier_name }}"> <!-- 一括チェック用 -->
                    </td>
                    @endif
                    <td>
                    <a href="{{ route('delete_ship',['id'=> $ship->id]) }}" >削除する</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @yield('script')
        </table>
        <!-- 送信ボタンを追加 -->
        <div class="button">
            <input type="submit" value="選択した注文を送信">
            <button type="button" id="clear-selection">選択解除</button>
        </div>
    </form>
</div>
<script>
    document.querySelectorAll('.supplier-checkbox').forEach(function(supplierCheckbox) {
        supplierCheckbox.addEventListener('change', function() {
            const supplierName = this.dataset.supplier;
            const isChecked = this.checked;
            document.querySelectorAll(`tr[data-supplier="${supplierName}"] input[type="checkbox"][name*="order"]`).forEach(function(orderCheckbox) {
                orderCheckbox.checked = isChecked;
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.supplier-checkbox');
        const clearButton = document.getElementById('clear-selection');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                // 現在チェックされているチェックボックスのsupplierを取得
                const selectedSupplier = checkbox.checked ? checkbox.dataset.supplier : null;

                checkboxes.forEach(cb => {
                    // 選択中のsupplierと異なる場合は無効化、同じ場合は有効化
                    if (selectedSupplier && cb.dataset.supplier !== selectedSupplier) {
                        cb.disabled = true;
                    } else {
                        cb.disabled = false;
                    }
                });
            });
        });
        // 選択解除ボタンの動作
        clearButton.addEventListener('click', () => {
            checkboxes.forEach(cb => {
                cb.checked = false; // チェック解除
                cb.disabled = false; // 再度有効化
            });
        });
    });
</script>
@endsection
