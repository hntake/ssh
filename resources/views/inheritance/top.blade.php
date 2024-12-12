<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="このサイトでは、無料で「法定相続一覧図」を簡単に作成することができます。この一覧図は、相続手続きに必要な「法定相続情報証明制度」の一環として、相続関係を明確に整理するために使われます。

「法定相続情報証明制度」とは、相続人が戸籍謄本などの書類を登記所に提出し、相続関係を表した一覧図（法定相続情報一覧図）の内容が、民法に基づく正しい相続関係であることを確認する制度です。この手続きにより、登記官が認証した一覧図の写しを無料で受け取ることができ、これをさまざまな相続手続きで活用できます。

当サイトでは、必要な情報を入力するだけで、複雑な手続きや書類作成が簡単に完了します。相続手続きの円滑な進行をお手伝いするために、ぜひご活用ください。">
        <meta name="keywords" content="法定相続一覧図, 法定相続一覧図作成, 法定相続一覧図無料作成, 法定相続一覧図 自分で, 法定相続一覧図 書き方
        ">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@ITcha50">
        <meta name="twitter:title" content="無料で法定相続情報一覧図を作成!">
        <meta name="twitter:description" content="無料で登録もなく利用できるオンラインサービスを使って、簡単に法定相続情報一覧図をPDF形式で作成しましょう。
                使いやすいインターフェースとカスタマイズ可能なテンプレートで、法定相続情報一覧図をスムーズに行います。簡単な入力フォームから情報を入力し、
                即座に法定相続情報一覧図を生成します。">
        <meta name="twitter:image" content="https://eng50cha.com/img/inheritance.png">

    <title>法定相続一覧図PDF 無料作成サイト</title>
    <style>
        body {
            font-family: 'Noto Sans JP', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 8px;
            width: 90%;

        }
        .container {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin: 10px 0;
            font-size: 18px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            max-width: 300px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 10px;
            }
            img {
                width: 100%;
            }
        }
    </style>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
        crossorigin="anonymous"></script>
</head>
<body>
    <!-- Twitterシェアボタン -->

    <blockquote class="twitter-tweet"><p lang="en" dir="ltr"> 
        <a href="https://twitter.com/share" class="twitter-share-button" data-text="無料で法定相続情報一覧図を作成できます!" data-url="{{url('inheritance/top')}}">Tweet</a>
    </blockquote>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="container">
        <h1>無料法定相続一覧図作成サイト</h1>
        <div>
            <a href="{{url('img/inheritance.png')}}" target="_blank" style="display:flex;">
                <img src="../img/inheritance.png"  alt="無料 法定相続一覧図作成" style="width:20%; margin:0 auto;">
            </a>
        </div>
        <p>このサイトでは、「法定相続一覧図」を簡単に無料で作成することができます。この一覧図は、相続手続きに必要な「法定相続情報証明制度」の一環として、相続関係を明確に整理するために使われます。</p>

        <p>「法定相続情報証明制度」とは、相続人が戸籍謄本などの書類を登記所に提出し、相続関係を表した一覧図（法定相続情報一覧図）の内容が、民法に基づく正しい相続関係であることを確認する制度です。
            この手続きにより、登記官が認証した一覧図の写しを無料で受け取ることができ、これをさまざまな相続手続きで活用できます。</p>

        <p> 詳細は法務局の<a href="https://houmukyoku.moj.go.jp/homu/page7_000013.html" style="color:blue; font-weight:bold;">公式ページ</a>をご覧ください</p>

        <p> 当サイトでは、必要な情報を入力するだけで、複雑な法定相続一覧図の書類がPDFで簡単に作成できます。相続手続きの円滑な進行をお手伝いするために、ぜひご活用ください。</p>


        <form action="{{ route('inheritance_select') }}" method="POST">
            @csrf
            <label for="family_structure">家族構成を選択してください:</label>
            <select name="family_structure" id="family_structure" required>
                <option value="" disabled selected>選択してください</option>
                <option value="spouse_children">配偶者と子供(一人か二人)</option>
                <option value="divorced_children">離婚した子供あり(一人)</option>
                <option value="divorced_children_two">離婚した子供あり(二人)</option>
            </select>
            <button type="submit">次へ</button>
        </form>
        <h3>選択肢にない家族構成での作成は、有料（¥1,000）にて承っております。ご希望の方は、<a href="{{ route('contact.index') }}">こちらまでメール</a>でお問い合わせください</h3>
    </div>
</body>
</html>