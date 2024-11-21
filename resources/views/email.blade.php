<style>
body {
font-family: Arial, sans-serif;
margin: 20px;
line-height: 1.6;
}
h1 {
color: #2c3e50;
font-size: 24px;
margin-bottom: 10px;
}
p {
font-size: 16px;
color: #34495e;
}
.highlight {
font-weight: bold;
color: #e74c3c;
}
.contact-info {
margin-top: 20px;
font-size: 14px;
color: #7f8c8d;
}
</style>

<h1>発注依頼</h1>

<p>送信先：<span class="highlight">{{ $ships->first()->supplier_name }}様</span></p>
<p>平素は大変お世話になっております。<br>
以下、ご手配のほど、宜しくお願い致します。</p>
<table>
        <tr>
            <th>品名</th>
            <th>個数</th>
        </tr>
        @foreach ($ships as $ship )
        <tr>
        <th>{{$ship->product_name}}</th>
        <th>{{$ship->new_order}}</th>
        </tr>
        @endforeach
</table>

<p>希望納期：<span class="highlight">{!! nl2br( $data['due_date'] ) !!}</span></p>
<p>担当名：<span class="highlight">{!! nl2br( $data['attend'] ) !!}</span></p>

<div class="contact-info">
    <p>{!! nl2br( $stock['name'] ) !!}</p>
    <p>{!! nl2br( $stock['email'] ) !!}</p>
    <p>{!! nl2br( $stock['tel'] ) !!}</p>
    <p>〒{!! nl2br( $stock['postal'] ) !!}</p>
    <p>{!! nl2br( $stock['address'] ) !!}</p>
</div>