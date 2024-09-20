@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{$store}} 利用履歴</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">日付</th>
                <th scope="col">カードUUID</th>
                <th scope="col">利用金額</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
            <tr>
                <!-- 日付のフォーマットを Y-m-d-H:i に変換 -->
                <td>{{ $purchase->created_at->format('Y-m-d-H:i') }}</td>

                <!-- UUIDのマスク（末尾4桁のみ表示） -->
                <td>{{ str_repeat('*', strlen($purchase->uuid) - 4) . substr($purchase->uuid, -4) }}</td>

                <!-- 利用金額 -->
                <td>¥{{ number_format($purchase->amount) }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    body {
        font-family: 'Noto Sans JP', sans-serif;
        background-color: #f8f9fa;
    }
    h1 {
        color: #333;
    }
    .table {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    th {
        background-color: #e9ecef;
        color: #495057;
    }
    td {
        color: #212529;
        border: 1px solid #dee2e6; /* セル間の線を追加 */   
    }
    .table-responsive{
        display: flex;
        justify-content: center;
    }
    .container{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }
</style>
@endsection