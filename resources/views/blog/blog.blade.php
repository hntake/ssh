<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>newsite</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('../css/blog.css') }}">

    <!-- Quill -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>投稿ページ</h1>
        </div>
        <div class="content_wrapper">
            <div class="content2">

                <form action="{{route('save',['id'=> $id])}}" method="post" name="ansform" enctype="multipart/form-data">
                    @csrf
                    <p>タイトル</p>
                    <input type="text" name="title" class="formtitle" value="{{ old('title', session('title')) }}">
                    <p>&nbsp;</p>
                    <p>本文</p>
                    <div id="editor" style="height: 400px;">{!! old('main', session('main')) !!}</div>
                    <input type="hidden" name="main" value="{{ old('main', session('main')) }}">

                    <p>&nbsp;</p>
                    <p>画像をアップロード</p>
                    <input type="file" name="post_img">

                    <p>&nbsp;</p>
                    <button type="submit" name="action" value="save">登録する</button>
                    <button type="submit" name="action" value="draft">下書きに保存する</button>
                </form>

            </div>
        </div>
    </div>

    <script>
        var quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'blockquote', 'image', 'video'],
                    [{list: 'ordered'}, {list: 'bullet'}]
                ]
            },
            placeholder: 'Write your question here...',
            theme: 'snow'
        });
        // 回答フォームを送信
        document.ansform.subbtn.addEventListener('click', function() {
            // Quillのデータをinputに代入
            document.querySelector('input[name=main]').value = document.querySelector('.ql-editor').innerHTML;
            // 送信
            document.ansform.submit();
        });
    </script>

</body>

</html>
