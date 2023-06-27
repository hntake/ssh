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


        <!--メイン-->
        <div class="body_content" id="body_content">

          <div class="main">
            <div class="container">
                <div class="flow">

                        <div class="f-image">
                                @if(!$question->image == null)
                                <img src="{{ asset('storage/' .$question->image) }}" alt="image">
                                @else
                                <img src="../../img/boy.webp" alt="boy">
                                @endif
                                <div class="pro_button"><a href="{{ route('q_edit_picture',['id'=> $question->id]) }}">画像変更</a></div>
                            <form method="POST" action="{{route('update_eq',['id'=> $question->id])}}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                        <h3>
                                            <input type="text" name="category" value="{{ $question->category}}" class="form-control">
                                            <input type="text" name="name" value="{{ $question->name}}" class="form-control">
                                             <input type="text" name="area" value="{{$question->area}}" class="form-control" style="width:100px;">
                                        </h3>
                                        <input type="submit" value="送信">
                                        <p>1:シロアリ 2:排水管高圧洗浄 3:床下防湿 4:リフォーム</p>
                                    </div>
                            </form>
                </div>

            </div >

          <!--サイドメニュー-->
            <div class="side">

              <div class="right-content">
                <h2>業務内容</h2>
                <div class="each">
                  <a href="index.html"><p>シロアリ駆除</p></a>
                </div >
                <div class="each">
                  <a href="#body_content"><p>排水管高圧洗浄</p></a>
                </div >
                <div class="each">
                  <a href="under.html"><p>防湿工事</p></a>
                </div >
                <div class="each" >
                  <a href="reform.html"><p>リフォーム工事</p></a>
                </div >
                <div class="each" >
                  <a href="voice.html"><p>お客様の声</p></a>
                </div >
                <div class="title_area">
                  <h3>
                    <a href="index.html"><img src="../../img/ant_black.png" style="width:100%;">
                  </h3>
                </div>
                <div class="title_area">
                  <h3>
                    <a href="reform.html"><img src="../../img/reform_top.webp" style="width:100%;">
                  </h3>
                </div>
                <div class="title_area">
                  <h3>
                    <a href="under.html"><img src="../../img/under_top.webp" style="width:100%;">
                  </h3>
                </div>


              </div >
            </div>
          </div>
         </div>
         <footer id="footer" class="mt40" >

          <aside class="company">
            <a href="company.html"><p>会社概要</p>
            会社名：株式会社 山陰アクア
            <br>
            住所:島根県出雲市天神町2番地
            <br>
            TEL : 0853-24-8277
            <div class="copyright">
              <p>copyright
                <spna>@</spna>
                山陰アクア 2023 All Rightts Reserved
              </p>
            </div></a>
          </aside>

        </footer>
      </div>
    </body>
  </html>
