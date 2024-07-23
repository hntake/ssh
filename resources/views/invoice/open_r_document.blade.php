<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>領収書PDF</title>
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
h1{
    text-align:center;
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
.table0 {
    position: absolute;
    top: 55;
    right: 0;
    width: 50%;
    padding: 0;
}
.address {
    position: absolute;
    top: -20;
    right: 0;
    width: 30%;
    padding: 0;
}
.address p:first-child {
    margin: 0;
}
.table3 {
    position: absolute;
    top: 150px;
    border-collapse: collapse;
    border-bottom: 1px solid black;
}
.table3 th,td {
    padding: 10px;
}
.table4 {
    position: absolute;
    top: 200px;
    border-collapse: collapse;
    width: 100%;
    border-bottom: 1px solid black;
}
.table4 th,td {
    padding: 10px;
}
.table5 {
    position: absolute;
    top: 50px;
    border-collapse: collapse;
    width: 100%;
    border-bottom: 1px solid black;
}
.table5 th,td {
    padding: 10px;
}
    </style>
</head>
<body>
    <div class="container pdf">
    <h1>領収書</h1>
        <table class="table1">
            <tr>
                @if($type==1)
                <td>{{ $billing_address }} 御中</td>
                @else
                <td>{{ $billing_address }} 様</td>
                @endif
            </tr>
        </table>
        <table class="table5">
            <tr>
                <td>発行日  {{ $billing_date }}</td>
            </tr>
        </table>
        <br>
        <br>
        <div class="row1">
            <div class="blank"></div>

            <table class="table3">
                <tr>
                    <th style="font-size: 1.3em;">合計</th>
                    <td style="font-size: 1.3em;">{{ number_format((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 +
                    (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 +(int)$ten*0.1 + (int)$eight*0.08)}}円（税込）</td>
                </tr>
            </table>
            <table class="table2">
                <tr >
                    <td>但し</td>
                </tr>
                <tr >
                    <td>{{ $project_name }}として</td>
                </tr>
                <tr>
                    <td>上記、正に領収いたしました。</td>
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
                        @if($category1==1)
                        <td class="right">10%</td>
                        @elseif($category1==2)
                        <td class="right">8%</td>
                        @else
                        <td class="right">税込</td>
                        @endif
                        <td class="right">{{ number_format((int)$cost1) }}円</td>
                        <td class="right">{{ number_format((int)$count1) }}</td>
                        <td class="right">{{ number_format((int)$cost1*(int)$count1) }}円</td>
                    </tr>
                    @if(isset($type2))
                    <tr>
                        <td class="left">{{ $type2 }}</td>
                        @if($category2==1)
                        <td class="right">10%</td>
                        @elseif($category2==2)
                        <td class="right">8%</td>
                        @else
                        <td class="right">税込</td>
                        @endif
                        <td class="right">{{ number_format((int)$cost2) }}円</td>
                        <td class="right">{{ number_format((int)$count2) }}</td>
                        <td class="right">{{ number_format((int)$cost2*(int)$count2) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type3))
                    <tr>
                        <td class="left">{{ $type3 }}</td>
                        @if($category3==1)
                        <td class="right">10%</td>
                        @elseif($category3==2)
                        <td class="right">8%</td>
                        @else
                        <td class="right">税込</td>
                        @endif
                        <td class="right">{{ number_format((int)$cost3) }}円</td>
                        <td class="right">{{ number_format((int)$count3) }}</td>
                        <td class="right">{{ number_format((int)$cost3*(int)$count3 ) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type4))
                    <tr>
                        <td class="left">{{ $type4 }}</td>
                        @if($category4==1)
                        <td class="right">10%</td>
                        @elseif($category4==2)
                        <td class="right">8%</td>
                        @else
                        <td class="right">税込</td>
                        @endif
                        <td class="right">{{ number_format((int)$cost4) }}円</td>
                        <td class="right">{{ number_format((int)$count4) }}</td>
                        <td class="right">{{ number_format((int)$cost4*(int)$count4) }}円</td>
                    </tr>
                    @endif
                    @if(isset($type5))
                    <tr>
                        <td class="left">{{ $type5 }}</td>
                        @if($category5==1)
                        <td class="right">10%</td>
                        @elseif($category5==2)
                        <td class="right">8%</td>
                        @else
                        <td class="right">税込</td>
                        @endif
                        <td class="right">{{ number_format((int)$cost5) }}円</td>
                        <td class="right">{{ number_format((int)$count5) }}</td>
                        <td class="right">{{ number_format((int)$cost5*(int)$count5) }}円</td>
                    </tr>
                    @endif
            </table>
            <!-- <table class="table5">
                <tbody>
                    <tr>
                        <td class="left">合計(税抜)</td>
                        <td class="right">{{ number_format((int)$cost1*(int)$count1 + (int)$cost2*(int)$count2 + (int)$cost3*(int)$count3 + (int)$cost4*(int)$count4 + (int)$cost5*(int)$count5 ) }}円</td>
                        <td class="center table-title bold">消費税総計</td>
                        <td class="right">{{number_format((int)$ten*0.1 + (int)$eight*0.08)}}</td>
                    </tr>
                </tbody>
            </table> -->
            <div class="address">
                <p>{{$company_name}}</p>
                @if(isset($postal_number))
                <p>〒{{$postal_number}}</p>
                @endif
                @if(isset($address))
                <p>{{$address}}</p>
                @endif
                @if(isset($phone_number))
                <p>TEL:{{$phone_number}}</p>
                @endif
                @if(isset($company_number))
                <p>T{{$company_number}}</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
