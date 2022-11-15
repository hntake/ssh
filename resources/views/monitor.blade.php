<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>英単語強化サイトエイゴメ モニタリングツールとは？英語学習サイト”エイゴメ” </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="top">
        <a href=https://eng50cha.com><img src="img/title3.png" alt="top"></a>
    </div>
    <div class="rule">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">
            モニタリングツールとは？
        </h2>
        <h3>
            エイゴメを利用する各生徒に特定の番号（クラス番号）を登録してもらうことで、その番号を持つ生徒の利用履歴などをウェブ上で確認することが出来るシステム
        </h3>
    </div>
    <div class="video">
        <a href="img/admin.mp4">こちらから動画で確認できます</a>
    </div>
    <div class="monitor">
        <h3 style="color:red;"> <img src="img/new.png" alt="new" style="width:30px; height:auto;">追加機能</h3>
        <p>生徒にコメントを残せるようになりました</p>
        <img src="img/post.png" style="border:1px black solid;  height:auto;">
        <p>以下の様に生徒のホーム画面に表示されます</p>
        <img src="img/comment.png">

    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">管理者画面トップページ</h2>
        <p>まずは、自分の生徒全体の利用履歴が最新順に表示されます</p>
        <img src="img/monitor1.png" alt="monitor1">
    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">個別データ検索画面</h2>
        <p>個別での利用履歴も確認できます</p>
        <img src="img/ideviews.png" alt="monitor2" style=" height:auto;">
        <img src="img/ideview.png" alt="monitor2" style=" height:auto;">

    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">ポイント内訳</h3>
            <p>利用でポイントが加算されるシステムは、以下の様に加算されています</p>
            <img src="img/monitor2.png" alt="monitor2" style=" height:auto;">
    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">対象グループ内ポイントランキング</h3>
            <p>ポイント数で生徒の頑張りを可視化しています</p>
            <img src="img/monitor3.png" alt="monitor3">
    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">直近のデータを抽出表示</h3>
            <img src="img/monitor41.png" alt="monitor4" style=" height:auto;">
    </div>
    <div class="monitor">
        <p>仮に直近一週間利用をクリックした場合は、以下の様に表示されます</p>
        <img src="img/monitor5.png" alt="monitor5">
    </div>
    <div class="monitor">
        <h2 style="font-family: 'Noto Sans JP', sans-serif;">料金プラン</h3>
            <ul>
                <li>初回設定費用:2,000円</li>
                <li>初年度年会費<span>無料</span></li>
                <li>次年度より年会費:1,000円</li>
            </ul>
            <h4>保証期間：登録から一年間</h4>
            <h4>※サーバートラブルなど一時的な停止を除く長期の利用不可が生じた場合は<span style="color:red;">全額返金致します。</span></h4>
            <div class="llco" style="background-color:unset;">
                <div class="button"><a href="{{ route('admin_form') }}" style="background-color:none;">申込ページへ</a></div>
            </div>
    </div>
    </div>
    <div class="top">
        <a href="{{ url('/') }}">
            <h3>エイゴメトップページに戻る</h3>
        </a>
    </div>
    <footer>
        <p>© All rights reserved by llco</p>
        <div class="contact">
            <h3>
                お問い合わせ・ご質問はこちら迄
            </h3>
            <a href="{{ route('contact.index') }}" class="button" style="font-size: 1.0rem; font-weight: 700;letter-spacing: normal;text-decoration: none;color: aliceblue;">Contact us</a>
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
</body>

</html>
