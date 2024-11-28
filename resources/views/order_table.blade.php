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
    <p>注文一覧表</p>
    <!-- フォーム送信先を ship_table に変更 -->
    <form action="{{ route('ship',['id'=>$stock->id]) }}" method="POST">
            @csrf
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>型番</th>
                    <th>品目</th>
                    <th>数量</th>
                    <th>従業員名</th>
                    <th>取引先名</th>
                    <th>注文選択</th>
                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($orders as $order)
                <tr>
                    <td style="width:20%">{{ $order->product_id }}</td>
                    <td style="width:20%">{{ $order->product_name }}</td>
                    <td style="width:20%">{{ $order->new_order }}</td>
                    <td style="width:20%">{{ $order->staff }}</td>
                    <td style="width:20%">{{ $order->supplier_name }}</td>
                    <td>
                        <div class="radio" style="width: 20%">
                        @if($order->status == 0)
                        <p><input type="checkbox" name="selected_orders[]" value="{{ $order->id }}">
                                注文する
                            </p>
                        @elseif($order->status == 1)
                            <p>メール作成中</p>
                        @else
                            <p>注文済み</p>
                        @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- 送信ボタンの表示を制御 -->
        @if($orders->contains('status', 0))
        <div class="button">
            <input type="submit" value="注文表に送信">
        </div>
        @endif
    </form>
</div>
<script>
    function handleCheckboxChange(checkbox, id) {
    const hiddenField = document.getElementById(`hidden-status-${id}`);
    if (checkbox.checked) {
        hiddenField.value = "1"; // チェックされた場合、値を 1 に変更
    } else {
        hiddenField.value = "0"; // チェックが外された場合、値を 0 に変更
    }
}
</script>
@endsection
