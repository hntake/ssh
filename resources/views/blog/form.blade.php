<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブログ作成ページ</title>
<!-- Styles -->
<link rel="stylesheet" href="{{ asset('../css/blog.css') }}">
</head>
<body>

        <div class="wrapper">
            <div class="header"><h1>投稿ページ</h1></div>
            <div class="content_wrapper">
    <div class="content2">

        <form action="/newpostsend" method="post">
            @csrf
            <p>タイトル</p>
            <input type="text" name="title" class="formtitle">

            <p>&nbsp;</p>
            <p>本文</p>
            <textarea name="main" cols="40" rows="10"></textarea>

            <p>&nbsp;</p>
            <input type="submit" class="submitbtn">
        </div>
        <div class="title_image">
            <a href="{{url('/')}}" class="">トップページへ戻る</a>
        </div>
        </form>

    </div>
</div>
</body>
</html>
 -->
