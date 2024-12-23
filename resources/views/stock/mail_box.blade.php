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
<!--発送表一覧画面-->
<div class="table-responsive">
    <p>メールボックス</p>
    <table class="table-hover">
            <thead>
                <tr>
                    <th>メール番号</th>
                    <th>取引先名</th>
                    <th>送信日付</th>
                    <th>納期期限</th>
                    <th>従業員名</th>
                    <th>状況</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody id="tbl">
                @foreach ($orderForms as $orderForm)
                <td style="width:10% "><a href="{{ route('form_id', ['id' => $orderForm->id]) }}">{{ $orderForm->id }}</a></td>
                <td style="width:20%">{{ $orderForm->supplier_name }}</td>
                <td style="width:20%">{{ $orderForm->created_at }}</td>
                    <td style="width:20%">{{ $orderForm->due_date }}</td>
                    <td style="width:20%">{{ $orderForm->staff }}</td>
                    @if($orderForm->status==1)
                    <td style="width:20%; text-align:center;"><i class="fa-regular fa-envelope"></i></td>
                    @elseif($orderForm->status==2)
                    <td style="width:20%">保存</td>
                    @else
                    <td style="width:20%">未送信</td>
                    @endif
                    <td>
                    <a href="{{ route('delete_orderForm',['id'=> $orderForm->id]) }}" >削除する</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            @yield('script')
        </table>
        <div class="d-flex justify-content-center">
        {{ $orderForms->links('vendor.pagination.bootstrap-4') }}        
        </div>
</div>

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