<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix= "og: http://ogp.me/ns#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="出雲のシロアリ駆除会社は、信頼性と経験豊富な専門家による効果的なシロアリ駆除サービスを提供しています。お問い合わせはこちらから。">
        <meta name="keywords" content="出雲, シロアリ駆除, 駆除会社, 専門家">
        <meta name="author" content="出雲のシロアリ駆除会社">
        <title>{{$question->store}}写真アップロード＆編集</title>
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('css/word.css') }}">
            <link href="{{ asset('css/ad.css') }}" rel="stylesheet">
            <link href="{{ asset('css/aqua.css') }}" rel="stylesheet">
            <link href="{{ asset('css/drain.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="https://kit.fontawesome.com/8eb7c95a34.js" crossorigin="anonymous"></script>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  </head>
    <body >
      <div id="wrapper">
        <div class="container">
            <div class="image">
            <tr class="cell">
                @if(!$question->image == null)
                <td><img src="{{ asset('storage/' . $question->image) }}" alt="image">
                <td>
                @else
                <td><img src="../../img/boy.webp" alt="boy"></td>
                @endif
            </tr>
            </div>
            <form method="POST" action="{{route('q_upload_pic',['id'=> $question->id])}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="picture_edit">
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="button" style="margin:0 auto;"><input type="submit" value="アップロード" style="width:100px;"></div>
            </form>
            <form method="get" action="{{route('delete_pic',['id'=> $question->id])}}">
            @csrf
            <input type="hidden" name="path" value="{{ isset($path) ? $path : '' }}">
            <input type="submit" value="画像削除" style="width:100px;">
            </form>
        </div>
      </div>
    </body>
</html>

