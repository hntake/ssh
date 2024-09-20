<!-- resources/views/thankyou.blade.php -->

@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/gift.css') }}">

@section('content')
    <div class="container">
        <h1>ありがとうございました！</h1>
        <p>ギフトカードが正常に送信されました。受取人にメールで通知されます。</p>

        <!-- PDF領収書ダウンロードボタン -->
        <a href="{{ route('download_receipt', ['id' => $gift->id]) }}" class="btn btn-primary">
            PDF領収書をダウンロード
        </a>
    </div>
@endsection