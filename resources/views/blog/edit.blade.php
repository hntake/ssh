<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ブログ編集</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('../css/blog.css') }}">

    <!-- Quill -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>ブログ編集ページ</h1>
        </div>

        <div class="content_wrapper">
            <div class="content2">
                <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="post" name="editform" enctype="multipart/form-data">
                    @csrf
                    <p>タイトル</p>
                    <input type="text" name="title" class="formtitle" value="{{ old('title', $blog->title) }}">
                    @error('title')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <p>&nbsp;</p>
                    <p>本文</p>
                    <div id="editor" style="height: 200px;">{!! old('main', $blog->main) !!}</div>
                    <input type="hidden" name="main">

                    @error('main')
                        <p class="error">{{ $message }}</p>
                    @enderror

                    <p>&nbsp;</p>
                    <p>画像をアップロード（新しい画像で上書きします）</p>
                    <input type="file" name="post_img">

                    @if(file_exists(public_path().'/storage/post_img/'. $blog->id .'.jpg') ||
                        file_exists(public_path().'/storage/post_img/'. $blog->id .'.jpeg') ||
                        file_exists(public_path().'/storage/post_img/'. $blog->id .'.png') ||
                        file_exists(public_path().'/storage/post_img/'. $blog->id .'.gif'))

                        <p>現在の画像:</p>
                        @if(file_exists(public_path().'/storage/post_img/'. $blog->id .'.jpg'))
                            <img style="width:30%; height:auto;" src="/storage/post_img/{{ $blog->id }}.jpg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $blog->id .'.jpeg'))
                            <img style="width:30%; height:auto;" src="/storage/post_img/{{ $blog->id }}.jpeg">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $blog->id .'.png'))
                            <img style="width:30%; height:auto;" src="/storage/post_img/{{ $blog->id }}.png">
                        @elseif(file_exists(public_path().'/storage/post_img/'. $blog->id .'.gif'))
                            <img style="width:30%; height:auto;" src="/storage/post_img/{{ $blog->id }}.gif">
                        @endif
                    @endif

                    <p>&nbsp;</p>
                    <input type="submit" class="submitbtn" name="subbtn" value="更新する">
                </form>
            </div>
        </div>
    </div>

    <script>
        var quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'blockquote', 'image', 'video'],
                    [{ list: 'ordered' }, { list: 'bullet' }]
                ]
            },
            placeholder: 'ここに本文を入力してください...',
            theme: 'snow'
        });

        // フォーム送信時にQuillエディタのデータをinputに代入
        document.editform.subbtn.addEventListener('click', function() {
            document.querySelector('input[name=content]').value = document.querySelector('.ql-editor').innerHTML;
            document.editform.submit();
        });
    </script>
</body>

</html>