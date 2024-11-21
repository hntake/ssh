@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->
@section('content')

<div class="side"> <!-- サイドバー -->
    <p>
    <h1>cafe57</h1>
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
    <div class="buttom">
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

        <form action="{{ route('send2',['form_id'=>$form_id]) }}" method="POST">
            @csrf

            <p>送信先:{{$ship->supplier_name}}</p>


            <p>発注依頼<br>
                平素は大変お世話になっております。<br>
                注文表
            <table>
                <tr>
                    <th>品名</th>
                    <th>個数</th>
                </tr>
                <tr>
                    <th>{{$ship->product_name}}</th>
                    <th>{{$ship->new_order}}</th>
                </tr>
            </table>
            <p>希望納期:<input type="date" name="due_date" value="{{old('due_date')}}" value="2022-02-01"></p>
            @if ($errors->has('due_date'))
            <p>{{$errors->first('due_date')}}</p>
            @endif


            <p>担当名:<input type="text" name="attend" value="{{$orderForm->staff}}"></p>
            @if ($errors->has('attend'))
            <p>{{$errors->first('attend')}}</p>
            @endif

            <p>注文致します。ご手配のほど、宜しくお願い致します。</p>





            <p>
                <input type="submit" name="send" value="送信">
            </p>
            <p>
                <input type="submit" name="store" value="保存">
            </p>
        </form>
    </div>
</div>
</div>
@endsection
