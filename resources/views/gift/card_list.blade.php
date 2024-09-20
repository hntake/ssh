@extends('layouts.app')
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">{{$store}} <br>購入されたギフトカード一覧</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">日付</th>
                    <th scope="col">UUID</th>                    
                    <th scope="col">購入金額</th>
                    <th scope="col">残高</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gifts as $gift)
                <tr>
                    <td>{{ $gift->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ substr($gift->uuid, -4) }}</td> <!-- 最後の4桁のみ表示 -->
                    <td>¥{{ number_format($gift->price) }}</td>
                    <td>¥{{ number_format($gift->balance) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    body {
        font-family: 'Noto Sans JP', sans-serif;
        background-color: #f8f9fa;
    }
    h2 {
        color: #333;
        display: flex;
        justify-content: center;
        text-align:center;
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
     /* iPad向けのスタイル */
    @media only screen and (min-width: 768px) and (max-width: 1024px) {
        .table-responsive {
            width: 90%; /* iPadで表示を大きくする */
        }
        td, th {
            font-size: 2rem; /* テキストのサイズを大きくする */
        }
    }

    /* スマートフォン向け */
    @media only screen and (max-width: 767px) {
        .table-responsive {
            width: 100%;
        }
        td, th {
            font-size: 1rem;
        }
    }
</style>
@endsection