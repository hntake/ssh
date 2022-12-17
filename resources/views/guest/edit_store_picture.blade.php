@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
<title>画像編集画面 店舗様</title>

@section('content')






<div class="image">
  <tr class="cell">
    @if(!$guest->image == null)
    <td><img src="{{ asset('storage/' . $guest->image) }}" alt="image">
    <td>
      @else
    <td><img src="/img/icon_man.png" alt="man_icon"></td>
    @endif
  </tr>
</div>
<form method="POST" action="{{route('uploadpic_store',['id'=> $guest->id])}}" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="picture_edit">
    <input type="file" name="image" id="image" class="form-control">
  </div>
  <div class="button"><input type="submit" value="アップロード"></div>
</form>
<form method="get" action="{{route('deletepic_store',['id'=> $guest->id])}}">
  @csrf
  <input type="hidden" name="path" value="{{ isset($path) ? $path : '' }}">
  <input type="submit" value="画像削除">
</form>
