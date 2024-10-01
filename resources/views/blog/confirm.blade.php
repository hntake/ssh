<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>確認画面</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>確認画面</h1>
        </div>
        <div class="content_wrapper">
            <div class="content2">
                <p>タイトル</p>
                <p>{{ $post->title }}</p>
                <p>&nbsp;</p>
                <p>本文</p>
                <div>{ !!$post->main!! }</div>
                <p>&nbsp;</p>
                <p>画像</p>
                <div class="thumbnail" >
                    @if(file_exists(public_path().'/storage/post_img/'. $post->id .'.jpg'))
                    <img style="width:30%; height:auto ;" src="/storage/post_img/{{ $post->id }}.jpg">
                    @elseif(file_exists(public_path().'/storage/post_img/'. $post->id .'.jpeg'))
                    <img style="width:30%; height: auto;" src="/storage/post_img/{{ $post->id }}.jpeg">
                    @elseif(file_exists(public_path().'/storage/post_img/'. $post->id .'.png'))
                    <img style="width:30%; height: auto;" src="/storage/post_img/{{ $post->id }}.png">
                    @elseif(file_exists(public_path().'/storage/post_img/'. $post->id .'.gif'))
                    <img style="width:30%; height: auto;" src="/storage/post_img/{{ $post->id }}.gif">
                    @else
                </div>
                    <p>画像はアップロードされていません。</p>
                @endif
                <p>&nbsp;</p>

                <form action="{{ route('save',['id'=> $id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="title" value="{{ $post->title }}">
                    <input type="hidden" name="main" value="{{ $post->main }}">
                    <input type="hidden" name="post_img" value="{{ $post_img }}">
                    <button type="submit" name="action" value="save">登録する</button>
                    <button type="submit" name="action" value="draft">下書きに保存する</button>
                </form>
                <a href="{{ route('blog.edit', ['id' => $post->id]) }}" class="edit-button">
                戻る</a>
            </div>
        </div>
    </div>
</body>

</html>