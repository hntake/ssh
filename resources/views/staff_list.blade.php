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
    <p>従業員表</p>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID番号</th>
                <th>従業員名</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody id="tbl">
            @foreach ($staffs as $staff)
            <tr>
                <td style="width:20%">{{ $staff->id }}</td>
                <td style="width:20%">{{ $staff->name }}</td>
                <td>
                    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm btn-primary">編集</a>
                    <form action="{{ route('staff.delete', $staff->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('削除してもよろしいですか？')">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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