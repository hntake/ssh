<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/faq.css') }}" rel="stylesheet">
</head>
<title>FAQ 英語学習サイト”エイゴメ” FAQ</title>

<body>
    <h1 style="margin: 30px 0; text-align: center;">FAQ</h1>
    <div class="category">
        <h2 style="margin: 30px 0; text-align: center;">カテゴリー</h2>
        <ul>
            <li><a href="#index1">登録について</a></li>
            <li><a href="#index2">ログインについて</a></li>
            <li><a href="#index3">テストについて</a></li>
            <li><a href="#index4">アカウント情報</a></li>
            <li><a href="#index5">ポイントについて</a></li>
        </ul>
    </div>
    <h2><a id="index1">登録について</a></h2>
    <ul class="accordion-area">
        <li>
            <section>

                <h2 class="title"><a id="index1">Q.登録後の認証メールが来ない</a></h2>
                <div class="box">
                    <p>1.迷惑メールとなっている場合があります。ご確認ください。</p>
                    <p>2.docomo、au、softbankなど各キャリアのセキュリティ設定により受信拒否と認識されているか、迷惑メール対策などでドメイン指定受信を設定している場合に、メールが正しく届かないことがございます。@itcha50.comからのメールを受信できるようにしてください。</p>
                    <p>3.gmailやyahooメールなどで登録すると以上のような問題が生じません。指定受信の設定が難しい場合はこちらでの再設定をお薦め致します。</p>
                </div>
                <h2 class="title">Q.メールアドレスは正しいのに登録できない</h2>
                <div class="box">
                    <p>登録にはメール認証が必要です。</p>
                    <p>docomo、au、softbankなど各キャリアのセキュリティ設定により受信拒否と認識されているか、迷惑メール対策などでドメイン指定受信を設定している場合に、メールが正しく届かないことがございます。@gmail.comドメインからのメールを受信できるようにしてください。</p>
                    <p>gmailやyahooメールなどで登録すると以上のような問題が生じません。指定受信の設定が難しい場合はこちらでの再設定をお薦め致します。</p>
                </div>
            </section>
        </li>
        <h2><a id="index2">ログインについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.登録したメールアドレスがわからない</h2>
                <div class="box">
                    <p>個別の対応が必要となります。お問い合わせフォームよりご相談ください。</p>
                    <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">こちらをクリック</a>
                </div>
                <h2 class="title">Q.パスワードがわからない</h2>
                <div class="box">
                    <p>ログイン画面のパスワードリセットボタンを押す→登録メールアドレスを入力→メールを確認してパスワードリセットサイトへ移動する</p>
                </div>
                <h2 class="title">Q.パスワードリセットメールが来ない</h2>
                <div class="box">
                    <p>登録の際に認証メールから確認している場合→迷惑メールBOXをご確認ください。</p>
                    <p>登録の際に認証メールから確認していない場合→登録できていません。<a href="#index">"登録後の認証メールが来ない"を参照してください</a></p>
                </div>
            </section>
        </li>
        <h2><a id="index3">テストについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.自分の作ったテストはどこにある？</h2>
                <div class="box">
                    <p>Myページにいくと自分の作成したテストがリストされています。</p>
                </div>
                <h2 class="title">Q.自分の作ったテストに間違いがあった</h2>
                <div class="box">
                    <p>Myページ内にて個々のテストを編集できます。</p>
                </div>
                <h2 class="title">Q.同じテストを作ってしまった</h2>
                <div class="box">
                    <p>Myページ内にて作成したテストを削除できます。</p>
                </div>
            </section>
        </li>
        <h2><a id="index4">アカウント情報</a></h2>
        <li>
            <section>
                <h2 class="title">Q.自分のプロフィールを変更したい</h2>
                <div class="box">
                    <p>Myページよりプロフィールが編集できます。</p>
                </div>
                <h2 class="title">Q.自分のアカウントを削除したい。</h2>
                <div class="box">
                    <p>Myページよりプロフィールが削除できます。</p>
                </div>
            </section>
        </li>
        <h2><a id="index5">ポイントについて</a></h2>
        <li>
            <section>
                <h2 class="title">Q.ポイントが増えない</h2>
                <div class="box">
                    <p>ログインしていますか？ログインしていても増えないときは直接お問い合わせください。</p>
                    <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: green;">こちらをクリック</a>
                </div>
                <h2 class="title">Q.ポイントが貯まったら何かもらえますか？</h2>
                <div class="box">
                    <p>現在検討中です。決まり次第当サイトにて発表します。</p>
                </div>
            </section>

        </li>
    </ul>
    <footer>
        <p>© All rights reserved by llco</p>
        <div class="contact">
            <h3>
                お問い合わせ・ご質問はこちら迄
                <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: blue;">Contact us</a>
            </h3>
        </div>
        <div class="left">
            <div class="policy">
                <a href="{{ url('policy') }}" class="button">プライバシーポリシー</a>
            </div>
            <div class="terms">
                <a href="{{ url('rule') }}" class="button">利用規約</a>
            </div>
            <div class="terms">
                <a href="{{ url('aboutus') }}" class="button">About Us</a>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-2-1/js/9-2-1.js"></script>
    <a href="#" class="gotop">トップへ</a>
    <script src="{{ asset('js/according.js') }}"></script>
</body>
