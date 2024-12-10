@extends('layouts.app2')

<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
@section('content')

<div class="side"> <!-- サイドバー -->
    <p>
    <h1>{{$company->name}}</h1>
    </p>
    <nav class="sidebar">
        <p><a href="{{ route('products',['id'=>$company->id]) }}">
                <h3>在庫一覧画面</h3>
            </a></p>
        <p><a href="{{ route('order_table',['id'=>$company->id]) }}">
                <h3>注文一覧</h3>
            </a></p>
        <p><a href="{{ route('ship_table',['id'=>$company->id]) }}">
                <h3>発送表一覧</h3>
            </a></p>
    </nav>
    <div class="button">
        <form action="{{ route('stock_logout') }}" method="post">
            @csrf <!-- CSRF保護 -->
            <input type="submit" value="ログアウト"> <!-- ログアウトしてログイン画面に戻る -->
        </form>
    </div>
</div>

<!-- 送信メールフォームパネル… -->
<div class="panel-body">


    @if (Session::has('success'))
    <div id="sample">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif

    <div class="form-group">
    <label for="product-name" class="col-sm-3 control-label">注文メール送信フォーム</label>

    <form action="{{ route('send2', ['id' => $orderForm->id]) }}" method="POST">
        @csrf

        <p>送信先: {{$orderForm->supplier_name}}</p>

        <p>発注依頼<br>
            平素は大変お世話になっております。<br>
            注文表
        </p>

        <table>
            <tr>
                <th>品名</th>
                <th>個数</th>
            </tr>
            @for ($i = 1; $i <= 10; $i++)
            @php
                $itemField = "item$i"; // item1, item2, ..., item10
                $newOrderField = "new_order$i"; // new_order1, new_order2, ..., new_order10
            @endphp

            @if (!empty($orderForm->$itemField)) {{-- itemフィールドが空でない場合のみ表示 --}}
            <tr>
                <td>{{ $orderForm->$itemField }}</td>
                <td>{{ $orderForm->$newOrderField }}</td>
            </tr>
            @endif
        @endfor
        </table>

        <p>希望納期: <input type="date" name="due_date" value="{{ $orderForm->due_date }}"></p>
        @if ($errors->has('due_date'))
            <p class="error">{{$errors->first('due_date')}}</p>
        @endif

        <p>担当名: <input type="text" name="staff" value="{{$orderForm->staff}}"></p>
        @if ($errors->has('staff'))
            <p class="error">{{$errors->first('staff')}}</p>
        @endif

        <p>注文致します。ご手配のほど、宜しくお願い致します。</p>

        @if($orderForm->status == 0 || $orderForm->status == 2)
            <p>
                <input type="submit" name="store" value="保存">
                <input type="submit" name="send" value="送信">
            </p>
        @endif
    </form>
</div>
</div>
</div>
@endsection
