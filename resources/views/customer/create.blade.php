<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix= "og: http://ogp.me/ns#">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="出雲のシロアリ駆除会社は、信頼性と経験豊富な専門家による効果的なシロアリ駆除サービスを提供しています。お問い合わせはこちらから。">
        <meta name="keywords" content="出雲, シロアリ駆除, 駆除会社, 専門家">
        <meta name="author" content="出雲のシロアリ駆除会社">
        <title>{{$store}}お客様アンケートフォーム</title>
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
        <!-- ハンバーガーメニュー -->
        <header class="header">
          <div class="menu-container">
            <div class="logo_sp">
               <img src="../img/aqua_logo.png" style="width:95%;">
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

        <script>
                function showForm() {
                    var choice = document.getElementById("choice").value;
                    var form1 = document.getElementById("form1");
                    var form2 = document.getElementById("form2");
                    var form3 = document.getElementById("form3");
                    var form4 = document.getElementById("form4");

                    // フォームを表示または非表示にする
                    form1.style.display = (choice == 1) ? "block" : "none";
                    form2.style.display = (choice == 2) ? "block" : "none";
                    form3.style.display = (choice == 3) ? "block" : "none";
                    form4.style.display = (choice == 4) ? "block" : "none";
                }
                  // 最初にform1を表示させる
                    window.onload = function() {
                        var form1 = document.getElementById("form1");
                        form1.style.display = "block";
                 }
            </script>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h1>この度はありがとうございました。アンケートのご協力をお願いいたします。</h1>

                                @csrf

                                <!-- フォーム選択 -->
                                <label for="choice">業務選択</label>
                                <select name="choice" id="choice" onchange="showForm()">
                                    <option value="1">シロアリ</option>
                                    <option value="2">排水管高圧洗浄</option>
                                    <option value="3">床下防湿</option>
                                    <option value="4">リフォーム</option>
                                </select>
                                <div id="form1" style="display: none;">
                                    <h2>シロアリ駆除アンケート</h2>
                                    <form method="POST" action="{{ route('question.create') }}" >
                                    @csrf
                                        <input type="hidden" name="category" value="1">
                                        <div class="r-box ">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('イニシャル') }}</label> <span style="font-weight:bold;">※必須</span>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="r-box">
                                            <label for="area" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                                            <div class="col-md-6">
                                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <h4>Q1:シロアリ駆除工事のご依頼のきっかけは何ですか？</h4>
                                            <div class="q6">
                                            <input type="radio" name="q1" value="1"> 羽アリ
                                            <input type="radio" name="q1" value="2"> 畳・床の老朽
                                            <input type="radio" name="q1" value="3"> 定期点検
                                            <input type="radio" name="q1" value="4"> その他
                                            </div>
                                            <br>
                                            <h4>Q2:どちらで当社を知りましたか？</h4>
                                            <div class="q6">
                                            <input type="radio" name="q2" value="1"> タウンページ
                                            <input type="radio" name="q2" value="2"> パソコンで検索
                                            <input type="radio" name="q2" value="3"> スマホで検索
                                            <input type="radio" name="q2" value="4"> 知人の紹介
                                            <input type="radio" name="q2" value="5"> その他
                                            </div>
                                            <br>
                                            <h4>Q3:当社に決めて頂いた決め手は何ですか？</h4>
                                            <div class="q6">
                                            <input type="radio" name="q3" value="1"> スタッフの対応
                                            <input type="radio" name="q3" value="2"> 予算
                                            <input type="radio" name="q3" value="3">資格があるから安心できる
                                            <input type="radio" name="q3" value="4"> ホームページ
                                            <input type="radio" name="q3" value="5"> その他
                                            </div>
                                            <br>
                                            <h4>Q4:今回の当社の工事・調査の満足度を教えてください。</h4>
                                            <div class="q6">
                                            <input type="radio" name="q4" value="1"> 大変満足
                                            <input type="radio" name="q4" value="2"> 満足
                                            <input type="radio" name="q4" value="3"> 普通
                                            <input type="radio" name="q4" value="4"> 少々悪い
                                            <input type="radio" name="q4" value="5"> 悪い
                                            </div>
                                            <br>
                                            <h4>Q5:スタッフの対応はどうでしたか？</h4>
                                            <div class="q6">
                                            <input type="radio" name="q5" value="1"> 大変満足
                                            <input type="radio" name="q5" value="2"> 満足
                                            <input type="radio" name="q5" value="3"> 普通
                                            <input type="radio" name="q5" value="4"> 少々悪い
                                            <input type="radio" name="q5" value="5"> 悪い
                                            </div>
                                            <br>
                                            <h4>Q6:最後に感想をお願い致します。</h4>
                                            <div class="q6">
                                            <p><input type="radio" name="q6" value="1"> シロアリ工事を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                                            <p><input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                                            <p><input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                                            <p><input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                                            <p><input type="radio" name="q6" value="5"> おかげさまでシロアリの心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                                            <p><input type="radio" name="q6" value="6"> 引き続きシロアリの保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                                            <p><input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                                            <p><input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                                            </div>
                                            <br>
                                        </div>
                                        <input type="submit" value="送信" style="height:40px; background-color:lightblue; font-weight:bold; font-size:20px; width:100px;">
                                    </form>
                                </div>

                                <div id="form2" style="display: none;">
                                    <h2>排水管高圧洗浄アンケート</h2>
                                    <form method="POST" action="{{ route('question.create') }}">
                                    @csrf
                                    <input type="hidden" name="category" value="2">
                                        <div class="r-box ">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('イニシャル') }}</label> <span style="font-weight:bold;">※必須</span>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="r-box">
                                            <label for="area" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                                            <div class="col-md-6">
                                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <h4>Q1:排水管高圧洗浄のご依頼のきっかけは何ですか？</h4>
                                            <input type="radio" name="q1" value="1"> 詰まり
                                                <input type="radio" name="q1" value="2"> 悪臭
                                                <input type="radio" name="q1" value="3"> 害虫
                                                <input type="radio" name="q1" value="4"> その他
                                                <br>
                                                <h4>Q2:どちらで当社を知りましたか？</h4>
                                                <input type="radio" name="q2" value="1"> タウンページ
                                                <input type="radio" name="q2" value="2"> パソコンで検索
                                                <input type="radio" name="q2" value="3"> スマホで検索
                                                <input type="radio" name="q2" value="4"> 知人の紹介
                                                <input type="radio" name="q2" value="5"> その他
                                                <br>
                                                <h4>Q3:当社に決めて頂いた決め手は何ですか？</h4>
                                                <input type="radio" name="q3" value="1"> スタッフの対応
                                                <input type="radio" name="q3" value="2"> 予算
                                                <input type="radio" name="q3" value="3">資格があるから安心できる
                                                <input type="radio" name="q3" value="4"> ホームページ
                                                <input type="radio" name="q3" value="5"> その他
                                                <br>
                                                <h4>Q4:今回の当社の工事・調査の満足度を教えてください。</h4>
                                                <input type="radio" name="q4" value="1"> 大変満足
                                                <input type="radio" name="q4" value="2"> 満足
                                                <input type="radio" name="q4" value="3"> 普通
                                                <input type="radio" name="q4" value="4"> 少々悪い
                                                <input type="radio" name="q4" value="5"> 悪い
                                                <br>
                                                <h4>Q5:スタッフの対応はどうでしたか？</h4>
                                                <input type="radio" name="q5" value="1"> 大変満足
                                                <input type="radio" name="q5" value="2"> 満足
                                                <input type="radio" name="q5" value="3"> 普通
                                                <input type="radio" name="q5" value="4"> 少々悪い
                                                <input type="radio" name="q5" value="5"> 悪い
                                                <br>
                                                <h4>Q6:最後に感想をお願い致します。</h4>
                                                <p><input type="radio" name="q6" value="1"> 排水管高圧洗浄を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                                                <p><input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                                                <p><input type="radio" name="q6" value="3"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                                                <p><input type="radio" name="q6" value="4"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                                                <p><input type="radio" name="q6" value="5"> おかげさまで排水管の心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                                                <p><input type="radio" name="q6" value="6"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                                                <br>
                                            </div>
                                            <input type="submit" value="送信" style="height:40px; background-color:lightblue; font-weight:bold; font-size:20px; width:100px;">
                                    </form>
                                </div>

                                <div id="form3" style="display: none;">
                                    <h2>床下防湿アンケート</h2>
                                    <form method="POST" action="{{ route('question.create') }}" >
                                    @csrf
                                    <input type="hidden" name="category" value="3">
                                        <div class="r-box ">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('イニシャル') }}</label> <span style="font-weight:bold;">※必須</span>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="r-box">
                                            <label for="area" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                                            <div class="col-md-6">
                                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <h4>Q1:床下防湿のご依頼のきっかけは何ですか？</h4>
                                            <input type="radio" name="q1" value="1"> カビ
                                            <input type="radio" name="q1" value="2"> 畳の劣化
                                            <input type="radio" name="q1" value="3"> 定期点検
                                            <input type="radio" name="q1" value="4"> その他
                                            <br>
                                            <h4>Q2:どちらで当社を知りましたか？</h4>
                                            <input type="radio" name="q2" value="1"> タウンページ
                                            <input type="radio" name="q2" value="2"> パソコンで検索
                                            <input type="radio" name="q2" value="3"> スマホで検索
                                            <input type="radio" name="q2" value="4"> 知人の紹介
                                            <input type="radio" name="q2" value="5"> その他
                                            <br>
                                            <h4>Q3:当社に決めて頂いた決め手は何ですか？</h4>
                                            <input type="radio" name="q3" value="1"> スタッフの対応
                                            <input type="radio" name="q3" value="2"> 予算
                                            <input type="radio" name="q3" value="3">資格があるから安心できる
                                            <input type="radio" name="q3" value="4"> ホームページ
                                            <input type="radio" name="q3" value="5"> その他
                                            <br>
                                            <h4>Q4:今回の当社の工事・調査の満足度を教えてください。</h4>
                                            <input type="radio" name="q4" value="1"> 大変満足
                                            <input type="radio" name="q4" value="2"> 満足
                                            <input type="radio" name="q4" value="3"> 普通
                                            <input type="radio" name="q4" value="4"> 少々悪い
                                            <input type="radio" name="q4" value="5"> 悪い
                                            <br>
                                            <h4>Q5:スタッフの対応はどうでしたか？</h4>
                                            <input type="radio" name="q5" value="1"> 大変満足
                                            <input type="radio" name="q5" value="2"> 満足
                                            <input type="radio" name="q5" value="3"> 普通
                                            <input type="radio" name="q5" value="4"> 少々悪い
                                            <input type="radio" name="q5" value="5"> 悪い
                                            <br>
                                            <h4>Q6:最後に感想をお願い致します。</h4>
                                            <p><input type="radio" name="q6" value="1"> 床下防湿を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                                            <p><input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                                            <p><input type="radio" name="q6" value="3"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                                            <p><input type="radio" name="q6" value="4"> 引き続き保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                                            <p><input type="radio" name="q6" value="5"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                                            <p><input type="radio" name="q6" value="6"> おかげさまで心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                                            <p><input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                                            <p><input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                                            <br>
                                        </div>
                                        <input type="submit" value="送信" style="height:40px; background-color:lightblue; font-weight:bold; font-size:20px; width:100px;">
                                    </form>
                                </div>

                                <div id="form4" style="display: none;">
                                    <h2>リフォームアンケート</h2>
                                    <form method="POST" action="{{ route('question.create') }}" >
                                    @csrf
                                    <input type="hidden" name="category" value="4">
                                        <div class="r-box ">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('イニシャル') }}</label> <span style="font-weight:bold;">※必須</span>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="r-box">
                                            <label for="area" class="col-md-4 col-form-label text-md-end">{{ __('エリア') }}</label>

                                            <div class="col-md-6">
                                            <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <h4>Q1:リフォーム工事のご依頼のきっかけは何ですか？</h4>
                                            <input type="radio" name="q1" value="1"> 老朽化
                                            <input type="radio" name="q1" value="2"> 増築
                                            <input type="radio" name="q1" value="3"> 快適化
                                            <input type="radio" name="q1" value="4"> その他
                                            <br>
                                            <h4>Q2:どちらで当社を知りましたか？</h4>
                                            <input type="radio" name="q2" value="1"> タウンページ
                                            <input type="radio" name="q2" value="2"> パソコンで検索
                                            <input type="radio" name="q2" value="3"> スマホで検索
                                            <input type="radio" name="q2" value="4"> 知人の紹介
                                            <input type="radio" name="q2" value="5"> その他
                                            <br>
                                            <h4>Q3:当社に決めて頂いた決め手は何ですか？</h4>
                                            <input type="radio" name="q3" value="1"> スタッフの対応
                                            <input type="radio" name="q3" value="2"> 予算
                                            <input type="radio" name="q3" value="3">資格があるから安心できる
                                            <input type="radio" name="q3" value="4"> ホームページ
                                            <input type="radio" name="q3" value="5"> その他
                                            <br>
                                            <h4>Q4:今回の当社の工事・調査の満足度を教えてください。</h4>
                                            <input type="radio" name="q4" value="1"> 大変満足
                                            <input type="radio" name="q4" value="2"> 満足
                                            <input type="radio" name="q4" value="3"> 普通
                                            <input type="radio" name="q4" value="4"> 少々悪い
                                            <input type="radio" name="q4" value="5"> 悪い
                                            <br>
                                            <h4>Q5:スタッフの対応はどうでしたか？</h4>
                                            <input type="radio" name="q5" value="1"> 大変満足
                                            <input type="radio" name="q5" value="2"> 満足
                                            <input type="radio" name="q5" value="3"> 普通
                                            <input type="radio" name="q5" value="4"> 少々悪い
                                            <input type="radio" name="q5" value="5"> 悪い
                                            <br>
                                            <h4>Q6:最後に感想をお願い致します。</h4>
                                            <p><input type="radio" name="q6" value="1"> リフォーム工事を利用して本当にやって良かった！効果が実感できて安心しました。</p>
                                            <p><input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。</p>
                                            <p><input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。</p>
                                            <p><input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。</p>
                                            <p><input type="radio" name="q6" value="5"> おかげさまで心配がなくなりました。家族みんなで安心して過ごせて感謝しています。</p>
                                            <p><input type="radio" name="q6" value="6"> 引き続き保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。</p>
                                            <p><input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。</p>
                                            <p><input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。</p>
                                            <br>
                                        </div>
                                        <input type="submit" value="送信" style="height:40px; background-color:lightblue; font-weight:bold; font-size:20px; width:100px;">
                                    </form>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </body>
</html>
