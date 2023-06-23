@extends('layouts.app')
<title>お客様アンケートフォーム</title>
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/word.css') }}">
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
    </script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>この度はありがとうございました。アンケートのご協力をお願いいたします。</h1>

                        @csrf
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
                            <form method="POST" action="{{ route('create_q') }}" enctype="text/plain">
                                <p>Q1:シロアリ駆除工事のご依頼のきっかけは何ですか？</p>
                                <input type="radio" name="q1" value="1"> 羽アリ
                                <input type="radio" name="q1" value="2"> 畳・床の老朽
                                <input type="radio" name="q1" value="4"> 定期点検
                                <input type="radio" name="q1" value="6"> その他
                                <br>
                                <p>Q2:どちらで当社を知りましたか？</p>
                                <input type="radio" name="q2" value="1"> タウンページ
                                <input type="radio" name="q2" value="2"> パソコンで検索
                                <input type="radio" name="q2" value="4"> スマホで検索
                                <input type="radio" name="q2" value="5"> 知人の紹介
                                <input type="radio" name="q2" value="6"> その他
                                <br>
                                <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                                <input type="radio" name="q3" value="1"> スタッフの対応
                                <input type="radio" name="q3" value="2"> 予算
                                <input type="radio" name="q3" value="4">資格があるから安心できる
                                <input type="radio" name="q3" value="5"> ホームページ
                                <input type="radio" name="q3" value="6"> その他
                                <br>
                                <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                                <input type="radio" name="q4" value="1"> 大変満足
                                <input type="radio" name="q4" value="2"> 満足
                                <input type="radio" name="q4" value="4"> 普通
                                <input type="radio" name="q4" value="5"> 少々悪い
                                <input type="radio" name="q4" value="6"> 悪い
                                <br>
                                <p>Q5:スタッフの対応はどうでしたか？</p>
                                <input type="radio" name="q5" value="1"> 大変満足
                                <input type="radio" name="q5" value="2"> 満足
                                <input type="radio" name="q5" value="4"> 普通
                                <input type="radio" name="q5" value="5"> 少々悪い
                                <input type="radio" name="q5" value="6"> 悪い
                                <br>
                                <p>Q6:最後に感想をお願い致します。</p>
                                <input type="radio" name="q6" value="1"> シロアリ工事を利用して本当にやって良かった！効果が実感できて安心しました。
                                <input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。
                                <input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。
                                <input type="radio" name="q6" value="6"> 引き続きシロアリの保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。
                                <input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。
                                <input type="radio" name="q6" value="5"> おかげさまでシロアリの心配がなくなりました。家族みんなで安心して過ごせて感謝しています。
                                <input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。
                                <input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。
                                <br>


                                <input type="submit" value="送信">
                            </form>
                        </div>

                        <div id="form2" style="display: none;">
                            <h2>排水管高圧洗浄アンケート</h2>
                            <form method="POST" action="{{ route('create_q') }}" enctype="text/plain">
                               <p>Q1:排水管高圧洗浄のご依頼のきっかけは何ですか？</p>
                               <input type="radio" name="q1" value="1"> 詰まり
                                <input type="radio" name="q1" value="2"> 悪臭
                                <input type="radio" name="q1" value="4"> 害虫
                                <input type="radio" name="q1" value="6"> その他
                                <br>
                                <p>Q2:どちらで当社を知りましたか？</p>
                                <input type="radio" name="q2" value="1"> タウンページ
                                <input type="radio" name="q2" value="2"> パソコンで検索
                                <input type="radio" name="q2" value="4"> スマホで検索
                                <input type="radio" name="q2" value="5"> 知人の紹介
                                <input type="radio" name="q2" value="6"> その他
                                <br>
                                <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                                <input type="radio" name="q3" value="1"> スタッフの対応
                                <input type="radio" name="q3" value="2"> 予算
                                <input type="radio" name="q3" value="4">資格があるから安心できる
                                <input type="radio" name="q3" value="5"> ホームページ
                                <input type="radio" name="q3" value="6"> その他
                                <br>
                                <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                                <input type="radio" name="q4" value="1"> 大変満足
                                <input type="radio" name="q4" value="2"> 満足
                                <input type="radio" name="q4" value="4"> 普通
                                <input type="radio" name="q4" value="5"> 少々悪い
                                <input type="radio" name="q4" value="6"> 悪い
                                <br>
                                <p>Q5:スタッフの対応はどうでしたか？</p>
                                <input type="radio" name="q5" value="1"> 大変満足
                                <input type="radio" name="q5" value="2"> 満足
                                <input type="radio" name="q5" value="4"> 普通
                                <input type="radio" name="q5" value="5"> 少々悪い
                                <input type="radio" name="q5" value="6"> 悪い
                                <br>
                                <p>Q6:最後に感想をお願い致します。</p>
                                <input type="radio" name="q6" value="1"> 排水管高圧洗浄を利用して本当にやって良かった！効果が実感できて安心しました。
                                <input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。
                                <input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。
                                <input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。
                                <input type="radio" name="q6" value="5"> おかげさまで排水管の心配がなくなりました。家族みんなで安心して過ごせて感謝しています。
                                <input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。
                                <br>

                                <input type="submit" value="送信">
                            </form>
                        </div>

                        <div id="form3" style="display: none;">
                            <h2>床下防湿アンケート</h2>
                            <form method="POST" action="{{ route('create_q') }}" enctype="text/plain">
                                <p>Q1:床下防湿のご依頼のきっかけは何ですか？</p>
                                <input type="radio" name="q1" value="1"> カビ
                                <input type="radio" name="q1" value="2"> 畳の劣化
                                <input type="radio" name="q1" value="4"> 定期点検
                                <input type="radio" name="q1" value="6"> その他
                                <br>
                                <p>Q2:どちらで当社を知りましたか？</p>
                                <input type="radio" name="q2" value="1"> タウンページ
                                <input type="radio" name="q2" value="2"> パソコンで検索
                                <input type="radio" name="q2" value="4"> スマホで検索
                                <input type="radio" name="q2" value="5"> 知人の紹介
                                <input type="radio" name="q2" value="6"> その他
                                <br>
                                <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                                <input type="radio" name="q3" value="1"> スタッフの対応
                                <input type="radio" name="q3" value="2"> 予算
                                <input type="radio" name="q3" value="4">資格があるから安心できる
                                <input type="radio" name="q3" value="5"> ホームページ
                                <input type="radio" name="q3" value="6"> その他
                                <br>
                                <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                                <input type="radio" name="q4" value="1"> 大変満足
                                <input type="radio" name="q4" value="2"> 満足
                                <input type="radio" name="q4" value="4"> 普通
                                <input type="radio" name="q4" value="5"> 少々悪い
                                <input type="radio" name="q4" value="6"> 悪い
                                <br>
                                <p>Q5:スタッフの対応はどうでしたか？</p>
                                <input type="radio" name="q5" value="1"> 大変満足
                                <input type="radio" name="q5" value="2"> 満足
                                <input type="radio" name="q5" value="4"> 普通
                                <input type="radio" name="q5" value="5"> 少々悪い
                                <input type="radio" name="q5" value="6"> 悪い
                                <br>
                                <p>Q6:最後に感想をお願い致します。</p>
                                <input type="radio" name="q6" value="1"> 床下防湿を利用して本当にやって良かった！効果が実感できて安心しました。
                                <input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。
                                <input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。
                                <input type="radio" name="q6" value="6"> 引き続き保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。
                                <input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。
                                <input type="radio" name="q6" value="5"> おかげさまで心配がなくなりました。家族みんなで安心して過ごせて感謝しています。
                                <input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。
                                <input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。
                                <br>


                                <input type="submit" value="送信">
                            </form>
                        </div>

                        <div id="form4" style="display: none;">
                            <h2>リフォームアンケート</h2>
                            <form method="POST" action="{{ route('create_q') }}" enctype="text/plain">
                                <p>Q1:リフォーム工事のご依頼のきっかけは何ですか？</p>
                                <input type="radio" name="q1" value="1"> 老朽化
                                <input type="radio" name="q1" value="2"> 増築
                                <input type="radio" name="q1" value="4"> 快適化
                                <input type="radio" name="q1" value="6"> その他
                                <br>
                                <p>Q2:どちらで当社を知りましたか？</p>
                                <input type="radio" name="q2" value="1"> タウンページ
                                <input type="radio" name="q2" value="2"> パソコンで検索
                                <input type="radio" name="q2" value="4"> スマホで検索
                                <input type="radio" name="q2" value="5"> 知人の紹介
                                <input type="radio" name="q2" value="6"> その他
                                <br>
                                <p>Q3:当社に決めて頂いた決め手は何ですか？</p>
                                <input type="radio" name="q3" value="1"> スタッフの対応
                                <input type="radio" name="q3" value="2"> 予算
                                <input type="radio" name="q3" value="4">資格があるから安心できる
                                <input type="radio" name="q3" value="5"> ホームページ
                                <input type="radio" name="q3" value="6"> その他
                                <br>
                                <p>Q4:今回の当社の工事・調査の満足度を教えてください。</p>
                                <input type="radio" name="q4" value="1"> 大変満足
                                <input type="radio" name="q4" value="2"> 満足
                                <input type="radio" name="q4" value="4"> 普通
                                <input type="radio" name="q4" value="5"> 少々悪い
                                <input type="radio" name="q4" value="6"> 悪い
                                <br>
                                <p>Q5:スタッフの対応はどうでしたか？</p>
                                <input type="radio" name="q5" value="1"> 大変満足
                                <input type="radio" name="q5" value="2"> 満足
                                <input type="radio" name="q5" value="4"> 普通
                                <input type="radio" name="q5" value="5"> 少々悪い
                                <input type="radio" name="q5" value="6"> 悪い
                                <br>
                                <p>Q6:最後に感想をお願い致します。</p>
                                <input type="radio" name="q6" value="1"> リフォーム工事を利用して本当にやって良かった！効果が実感できて安心しました。
                                <input type="radio" name="q6" value="2"> 丁寧な対応に心から感謝しています。細かな説明と配慮に感動しました。
                                <input type="radio" name="q6" value="4"> 迅速な対応に助かりました。早急に問題を解決していただき、本当に助かりました。
                                <input type="radio" name="q6" value="6"> 引き続き保証をお願いします。長期的な安心を求めていますので、よろしくお願いします。
                                <input type="radio" name="q6" value="3"> スピーディーな対応に感謝しています。迅速な行動力に頼りになる業者だと思いました。
                                <input type="radio" name="q6" value="5"> おかげさまで心配がなくなりました。家族みんなで安心して過ごせて感謝しています。
                                <input type="radio" name="q6" value="7"> お手入れが丁寧で信頼できる業者でした。安心して任せることができて本当に感謝しています。
                                <input type="radio" name="q6" value="8"> 今後も保証についてお願いしたいです。安心して暮らせるように、継続的なサポートをお願いします。
                                <br>


                                <input type="submit" value="送信">
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

