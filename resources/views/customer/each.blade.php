<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head prefix= "og: http://ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="出雲のシロアリ駆除会社は、信頼性と経験豊富な専門家による効果的なシロアリ駆除サービスを提供しています。お問い合わせはこちらから。">
    <meta name="keywords" content="出雲, シロアリ駆除, 駆除会社, 専門家">
    <meta name="author" content="出雲のシロアリ駆除会社">
    <title>出雲のシロアリ駆除会社 山陰アクア お客様の声{{$question->area}} {{$question->name}}様</title>

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
        <!-- ハンバーガーメニュー -->
        <header class="header">
          <div class="menu-container">
            <div class="logo_sp">
                <img src="../../img/aqua_logo.png" style="width:95%;">
            </div>
            <div class="menu-button" onclick="toggleMenu()">メニュー<span style="font-size:0.5rem; color:black; padding-left:15px;">←クリックするとメニューが開きます</span></div>
            <ul class="menu-list" id="menuList">
              <li class="menu-list-item"><a href=#price style="font-weight:bold;">お値段</a></li>
              <li class="menu-list-item"><a href=#ant style="font-weight:bold;">シロアリ駆除</a></li>
              <li class="menu-list-item"><a href=#work style="font-weight:bold;">事業内容</a></li>
              <li class="menu-list-item"><a href=#company style="font-weight:bold;">会社概要</a></li>
            </ul>
            <div class="two">
              <div class="call" style="border:1px bold black; background-color: lightblue; text-align: center;">
                        <a href="tel:0120-233-880" style="font-weight:bold; ">電話する</a>
                        <h5 style="margin:0;">クリックで繋がります！</h5>
              </div>
              <div class="call" style="border:1px bold black; background-color: lightblue; text-align: center;">
                        <a href="mailto:saninaqua@gmail.com?subject=%E3%81%8A%E5%95%8F%E3%81%84%E5%90%88%E3%82%8F%E3%81%9B&amp;body=%E4%BB%A5%E4%B8%8B%E3%81%AB%E3%81%94%E8%A8%98%E5%85%A5%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%0A%0A%E5%90%8D%E5%89%8D%EF%BC%9A%0A%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A" style="font-weight:bold;">相談メール</a>
                        <h5 style="margin:0;">クリック！</h5>
              </div>
            </div>
        </div>

        </header>
        <!--トップ画像-->
          <div id="header" class="table">
            <div class="hed_content pc">
              <div class="two">
                <div class="call" style="border:1px bold black; background-color: lightblue;">
                  <a href=#price style="font-weight:bold;">5年間保証!</a>
                  <h5 style="margin:0;">安心のアフターフォロー</h5>
                </div><div class="call" style="border:1px bold black; background-color: lightblue;">
                  <a href=#ant style="font-weight:bold;">シロアリ駆除</a>
                  <h5 style="margin:0;">専門家が対応します！</h5>
                </div>
              </div>
              <div class="top_center">
                <p class="logo">
                  <img src="../../img/aqua_logo.png">
                </p>
                <div class="red_f" style="padding-top:20px;">
                  <h4 style="color:red; font-weight:bold;margin:10px 0 0 0;">
                    ご相談・現地調査・お見積無料！
                  </h4>
                  <h3 style="color:red; font-weight:bold;">
                    即日迅速対応いたします！
                  </h3>
                </div>
              </div>
                <div class="two">
                  <div class="call" style="border:1px bold black; background-color: lightblue;">
                    <a href="tel:0120-233-880" style="font-weight:bold;">電話する</a>
                    <h5 style="margin:0;">クリックで繋がります！</h5>
                  </div>
                  <div class="call" style="border:1px bold black; background-color: lightblue;">
                    <a href="mailto:saninaqua@gmail.com?subject=%E3%81%8A%E5%95%8F%E3%81%84%E5%90%88%E3%82%8F%E3%81%9B&amp;body=%E4%BB%A5%E4%B8%8B%E3%81%AB%E3%81%94%E8%A8%98%E5%85%A5%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%0A%0A%E5%90%8D%E5%89%8D%EF%BC%9A%0A%0A%E9%9B%BB%E8%A9%B1%E7%95%AA%E5%8F%B7%EF%BC%9A" style="font-weight:bold;">相談メール</a>
                    <h5 style="margin:0;">クリック！</h5>
                  </div>
                </div>
            </div>
          </div>
        <!--メイン-->
        <div class="body_content" id="body_content">
          <div class="title">
            <h1>アクア山陰</h1>
          <img src="../../img/voice.webp">
          </div>
          <div class="main">
            <div class="container">
            <div class="flow">
                <div class="f-image">
                          @if(!$question->image == null)
                          <img src="{{ asset('storage/' .$question->image) }}" alt="image">
                          @else
                          <img src="../../img/boy.webp" alt="boy">
                          @endif
                          @if($question->category ==1)
                            <h3>シロアリ工事 {{$question->area}} {{$question->name}}様</h3>
                            <p>Q1:シロアリ駆除工事のご依頼のきっかけは何ですか？</p>
                            @if($question->q1 ==1)
                            <p>羽アリ</p>
                            @elseif($question->q1 ==2)
                            <p>畳・床の老朽</p>
                            @elseif($question->q1 ==3)
                            <p>定期点検</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q2:どちらで当社を知りましたか？</p>
                            @if($question->q2 ==1)
                            <p>タウンページ</p>
                            @elseif($question->q2 ==2)
                            <p>パソコンで検索</p>
                            @elseif($question->q2 ==3)
                            <p>スマホで検索</p>
                            @elseif($question->q2 ==4)
                            <p>知人の紹介</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                            @if($question->q3 ==1)
                            <p>スタッフの対応</p>
                            @elseif($question->q3 ==2)
                            <p>予算</p>
                            @elseif($question->q3 ==3)
                            <p>資格があるから安心できる</p>
                            @elseif($question->q3 ==4)
                            <p>ホームページ</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                            @if($question->q4 ==1)
                            <p>大変満足</p>
                            @elseif($question->q4 ==2)
                            <p>満足</p>
                            @elseif($question->q4 ==3)
                            <p>普通</p>
                            @elseif($question->q4 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q5:スタッフの対応はどうでしたか？</p>
                            @if($question->q5 ==1)
                            <p>大変満足</p>
                            @elseif($question->q5 ==2)
                            <p>満足</p>
                            @elseif($question->q5 ==3)
                            <p>普通</p>
                            @elseif($question->q5 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q6:最後に感想をお願い致します。</p>
                            @if($question->q6 ==1)
                            <p>シロアリ工事を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                            @elseif($question->q6 ==2)
                            <p>丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                            @elseif($question->q6 ==3)
                            <p>スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                            @elseif($question->q6 ==4)
                            <p>迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                            @elseif($question->q6 ==5)
                            <p>おかげさまでシロアリの心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                            @elseif($question->q6 ==6)
                            <p>引き続きシロアリの保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                            @elseif($question->q6 ==7)
                            <p>お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                            @else
                            <p>今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                            @endif
                            @elseif($question->category ==2)
                            <h3>排水管高圧洗浄 {{$question->area}} {{$question->name}}様</h3>
                            <p>Q1:排水管高圧洗浄のご依頼のきっかけは何ですか？</p>
                            @if($question->q1 ==1)
                            <p>詰まり</p>
                            @elseif($question->q1 ==2)
                            <p>悪臭</p>
                            @elseif($question->q1 ==3)
                            <p>害虫</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q2:どちらで当社を知りましたか？</p>
                            @if($question->q2 ==1)
                            <p>タウンページ</p>
                            @elseif($question->q2 ==2)
                            <p>パソコンで検索</p>
                            @elseif($question->q2 ==3)
                            <p>スマホで検索</p>
                            @elseif($question->q2 ==4)
                            <p>知人の紹介</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                            @if($question->q3 ==1)
                            <p>スタッフの対応</p>
                            @elseif($question->q3 ==2)
                            <p>予算</p>
                            @elseif($question->q3 ==3)
                            <p>資格があるから安心できる</p>
                            @elseif($question->q3 ==4)
                            <p>ホームページ</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                            @if($question->q4 ==1)
                            <p>大変満足</p>
                            @elseif($question->q4 ==2)
                            <p>満足</p>
                            @elseif($question->q4 ==3)
                            <p>普通</p>
                            @elseif($question->q4 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q5:スタッフの対応はどうでしたか？</p>
                            @if($question->q5 ==1)
                            <p>大変満足</p>
                            @elseif($question->q5 ==2)
                            <p>満足</p>
                            @elseif($question->q5 ==3)
                            <p>普通</p>
                            @elseif($question->q5 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q6:最後に感想をお願い致します。</p>
                            @if($question->q6 ==1)
                            <p>排水管高圧洗浄を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                            @elseif($question->q6 ==2)
                            <p>丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                            @elseif($question->q6 ==3)
                            <p>迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                            @elseif($question->q6 ==4)
                            <p>スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                            @elseif($question->q6 ==5)
                            <p>おかげさまで排水管の心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                            @else
                            <p>お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                            @endif
                            @elseif($question->category ==3)
                            <h3>床下防湿 {{$question->area}} {{$question->name}}様</h3>
                              <p>Q1:床下防湿のご依頼のきっかけは何ですか？</p>
                            @if($question->q1 ==1)
                            <p>カビ</p>
                            @elseif($question->q1 ==2)
                            <p>畳の劣化</p>
                            @elseif($question->q1 ==3)
                            <p>定期点検</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q2:どちらで当社を知りましたか？</p>
                            @if($question->q2 ==1)
                            <p>タウンページ</p>
                            @elseif($question->q2 ==2)
                            <p>パソコンで検索</p>
                            @elseif($question->q2 ==3)
                            <p>スマホで検索</p>
                            @elseif($question->q2 ==4)
                            <p>知人の紹介</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                            @if($question->q3 ==1)
                            <p>スタッフの対応</p>
                            @elseif($question->q3 ==2)
                            <p>予算</p>
                            @elseif($question->q3 ==3)
                            <p>資格があるから安心できる</p>
                            @elseif($question->q3 ==4)
                            <p>ホームページ</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                            @if($question->q4 ==1)
                            <p>大変満足</p>
                            @elseif($question->q4 ==2)
                            <p>満足</p>
                            @elseif($question->q4 ==3)
                            <p>普通</p>
                            @elseif($question->q4 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q5:スタッフの対応はどうでしたか？</p>
                            @if($question->q5 ==1)
                            <p>大変満足</p>
                            @elseif($question->q5 ==2)
                            <p>満足</p>
                            @elseif($question->q5 ==3)
                            <p>普通</p>
                            @elseif($question->q5 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q6:最後に感想をお願い致します。</p>
                            @if($question->q6 ==1)
                            <p>畳の劣化を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                            @elseif($question->q6 ==2)
                            <p>丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                            @elseif($question->q6 ==3)
                            <p>迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                            @elseif($question->q6 ==4)
                            <p>引き続きシロアリの保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                            @elseif($question->q6 ==5)
                            <p>スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                            @elseif($question->q6 ==6)
                            <p>おかげさまでシロアリの心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                            @elseif($question->q6 ==7)
                            <p>お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                            @else
                            <p>今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                            @endif
                            @else
                            <h3>リフォーム {{$question->area}} {{$question->name}}様</h3>
                              <p>Q1:リフォームのご依頼のきっかけは何ですか？</p>
                            @if($question->q1 ==1)
                            <p>老朽化</p>
                            @elseif($question->q1 ==2)
                            <p>増築</p>
                            @elseif($question->q1 ==3)
                            <p>快適化</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q2:どちらで当社を知りましたか？</p>
                            @if($question->q2 ==1)
                            <p>タウンページ</p>
                            @elseif($question->q2 ==2)
                            <p>パソコンで検索</p>
                            @elseif($question->q2 ==3)
                            <p>スマホで検索</p>
                            @elseif($question->q2 ==4)
                            <p>知人の紹介</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                            @if($question->q3 ==1)
                            <p>スタッフの対応</p>
                            @elseif($question->q3 ==2)
                            <p>予算</p>
                            @elseif($question->q3 ==3)
                            <p>資格があるから安心できる</p>
                            @elseif($question->q3 ==4)
                            <p>ホームページ</p>
                            @else
                            <p>その他</p>
                            @endif
                            <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                            @if($question->q4 ==1)
                            <p>大変満足</p>
                            @elseif($question->q4 ==2)
                            <p>満足</p>
                            @elseif($question->q4 ==3)
                            <p>普通</p>
                            @elseif($question->q4 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q5:スタッフの対応はどうでしたか？</p>
                            @if($question->q5 ==1)
                            <p>大変満足</p>
                            @elseif($question->q5 ==2)
                            <p>満足</p>
                            @elseif($question->q5 ==3)
                            <p>普通</p>
                            @elseif($question->q5 ==4)
                            <p>少々悪い</p>
                            @else
                            <p>悪い</p>
                            @endif
                            <p>Q6:最後に感想をお願い致します。</p>
                            @if($question->q6 ==1)
                            <p>リフォーム工事を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                            @elseif($question->q6 ==2)
                            <p>丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                            @elseif($question->q6 ==3)
                            <p>スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                            @elseif($question->q6 ==4)
                            <p>迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                            @elseif($question->q6 ==5)
                            <p>おかげさまで心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                            @elseif($question->q6 ==6)
                            <p>引き続き保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                            @elseif($question->q6 ==7)
                            <p>お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                            @else
                            <p>今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                            @endif
                            @endif

                      </div>
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
