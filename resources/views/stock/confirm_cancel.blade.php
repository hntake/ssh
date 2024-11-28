@extends('layouts.app2')


@section('content')
<div class="container">
    <h1>サブスクリプション停止の確認</h1>
    <p>現在のサブスクリプションを停止します。この操作は取り消すことができません。</p>

    <form action="{{ route('cancel', $stock->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">停止を確定する</button>
        <a href="{{ route('account',$stock->id) }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection