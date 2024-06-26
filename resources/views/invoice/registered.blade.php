@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録完了</div>

                <div class="card-body" style="text-align:start;">
                    <p>この度は、ご登録いただき、誠にありがとうございます。</p>
                    <p>
                        ご本人様確認のため、ご登録いただいたメールアドレスに、
                        本登録のご案内のメールが届きます。
                    </p>
                    <p>
                        そちらに記載されているURLにアクセスし、
                        アカウントの本登録を完了させてください。
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
