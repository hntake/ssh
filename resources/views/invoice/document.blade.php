<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>請求書PDF</title>
    <style type="text/css">
        @font-face {
            font-family: ipaexg;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipaexg;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        body {
            font-family: ipaexg !important;
        }
         .table1 th,td {
    padding: 10px;
}
 .row1 {
    position: relative;
    margin-top: 30px;
}
 .table2 {
    position: absolute;
    top: 0;
    left: 0;
    width: 60%;
    border-collapse: collapse;
}
 .table2 th,td {
    padding: 10px;
}
 .blank {
    width: 10%;
}
 .address {
    position: absolute;
    top: 0;
    right: 0;
    width: 30%;
    padding: 0;
}
 .address p:first-child {
    margin: 0;
}
 .table3 {
    position: absolute;
    top: 200px;
    border-collapse: collapse;
    border-bottom: 1px solid black;
}
 .table3 th,td {
    padding: 10px;
}
 .table4 {
    position: absolute;
    top: 300px;
    border-collapse: collapse;
    width: 100%;
}
 .table4 th,td {
    padding: 10px;
}
    </style>
</head>
<body>
    <div class="container pdf">
        <h1>請求書</h1>
        <table class="table1">
            <tr>
                <td>{{ $billing_address }} 御中</td>
                <td>請求日  {{ $billing_date }}</td>
            </tr>
            <br>
            <br>

            <tr>
                <td>下記の通り、ご請求申し上げます。</td>
            </tr>
        </table>
        <br>
        <br>
        <div class="row1">
            <table class="table2">
                <tr>
                    <th class="table-title left">件名</th>
                    <td>{{ $project_name }}</td>
                </tr>


            </table>
            <div class="blank"></div>

            <table class="table3">
                <tr>
                    <th style="font-size: 1.3em;">合計</th>
                    <td style="font-size: 1.3em;">{{ number_format(((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 + (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 )* 1.1) }}円（税込）</td>
                </tr>
            </table>
            <table class="table4">
                <thead>
                    <tr>
                        <th class="table-title">内訳</th>
                        <th class="table-title">単価</th>
                        <th class="table-title">数量</th>
                        <th class="table-title">金額</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="left">{{ $type1 }}</td>
                        <td class="right">{{ number_format((int)$cost1) }}円</td>
                        <td class="right">{{ number_format((int)$count1) }}</td>
                        <td class="right">{{ number_format((int)$cost1*(int)$count1) }}円</td>
                    </tr>
                    @if(isset($type2))
                    <tr>
                        <td class="left">{{ $type2 }}</td>
                        <td class="right">{{ number_format((int)$cost2) }}円</td>
                        <td class="right">{{ number_format((int)$count2) }}</td>
                        <td class="right">{{ number_format((int)$cost2*(int)$count2) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type3))
                    <tr>
                        <td class="left">{{ $type3 }}</td>
                        <td class="right">{{ number_format((int)$cost3) }}円</td>
                        <td class="right">{{ number_format((int)$count3) }}</td>
                        <td class="right">{{ number_format((int)$cost3*(int)$count3 ) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type4))
                    <tr>
                        <td class="left">{{ $type4 }}</td>
                        <td class="right">{{ number_format((int)$cost4) }}円</td>
                        <td class="right">{{ number_format((int)$count4) }}</td>
                        <td class="right">{{ number_format((int)$cost4*(int)$count4) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type5))
                    <tr>
                        <td class="left">{{ $type5 }}</td>
                        <td class="right">{{ number_format((int)$cost5) }}円</td>
                        <td class="right">{{ number_format((int)$count5) }}</td>
                        <td class="right">{{ number_format((int)$cost5*(int)$count5) }}円</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="left"></td>
                        <td class="right"></td>
                        <td class="center table-title bold">小計</td>
                        <td class="right">{{ number_format((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 + (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 ) }}円</td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td class="right"></td>
                        <td class="center table-title bold">消費税</td>
                        <td class="right">{{ number_format(((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 + (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 ) * 0.1) }}円</td>
                    </tr>
                    <tr>
                        <td class="left"></td>
                        <td class="right"></td>
                        <td class="center table-title bold">合計</td>
                        <td class="right">{{ number_format(((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 + (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 )* 1.1) }}円</td>
                    </tr>
                </tbody>
            </table>
            <div class="address">
                <p>Webサービス会社 llco</p>
                <p>〒699-0702</p>
                <p>島根県出雲市大社町杵築北2729</p>
                <p>TEL: 070-4225-0615</p>
            </div>
        </div>
    </div>
</body>
</html>
