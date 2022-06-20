@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <h1>メールアドレスが確認できました</h1>
              <p>あなたのメールアドレスが確認できました．</p>
              <p><a href="{{url('/login')}}">ここからログインしてください．</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
