@extends('layouts.app2')

<link rel="stylesheet" href="{{ asset('css/products.css') }}"> <!-- products.cssと連携 -->



@section('content')


<div class="container">
    <h1>従業員情報編集</h1>
    <form action="{{ route('staff.update', $staff->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">従業員名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $staff->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">更新</button>
        <a href="{{ route('staff_list', $staff->name_id) }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection