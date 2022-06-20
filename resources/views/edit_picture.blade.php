@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
@section('content')


<div class="header-logo-menu">
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
          <ul>
          <li><a href="{{ url('home') }}"><h3>ホーム画面に戻る</h3></a></li>
                <li><a href="{{ url('history') }}"><h3>全履歴</h3></a></li>
                <li><a href="{{ url('profile') }}"><h3>Myページ</h3></a></li>
                <li><a href="{{ url('all_list') }}"><h3>テスト一覧</h3></a></li>
                <li><a href="{{ url('create') }}"><h3>新規作成</h3></a></li>
                <li><a href="{{ url('search_result') }}"><h3>テスト検索</h3></a></li>
                <li><a href="{{ url('search_user') }}"><h3>ユーザー検索</h3></a></li>
          </ul>
      </div>
      <script>
        $(function() {
         $('#nav-content li a').on('click', function(event) {
        $('#nav-input').prop('checked', false);
        });
        });
      </script>
    </div>
  </div>

  @if (session('status'))<div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">{{ session('status') }}</div>@endif

  <div class="image">
    <tr class="cell">
            @if(!$user->image == null)
                    <td ><img src="{{ asset('storage/' . $user->image) }}" alt="image" ><td>
            @else
                    <td><img src="/img/icon_man.png" alt="man_icon"></td>
                    @endif
    </tr>
  </div>
    <form method="POST" action="{{route('uploadpic',['id'=> $user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('patch')
            <div class="picture_edit">
                <input type="file" name="image" id="image" class="form-control" >
            </div>
            <div  class="button"><input type="submit" value="アップロード"></div>
    </form>
    <form method="get" action="{{route('deletepic',['id'=> $user->id])}}">
      @csrf
      <input type="hidden" name="path" value="{{ isset($path) ? $path : '' }}">
      <input type="submit" value="画像削除">
    </form>

