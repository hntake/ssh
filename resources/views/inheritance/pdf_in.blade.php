<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>相続人情報</title>
    <style>
        @font-face {
            font-family: ipaexg;
            font-style: normal;
            font-weight: normal;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        @font-face {
            font-family: ipaexg;
            font-style: bold;
            font-weight: bold;
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }
        body {
            font-family: ipaexg !important;
            font-size: 12px; /* フォントサイズを小さくしてみる */

        }
        h1 {
            text-align: center;
        }
        h2{
            text-align: left;
        }
        .container {
            width: 100%;
        }
        .left,{
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }
        .right {
            width: 45%;
            display: inline-block;
            vertical-align: top;
            margin:0  0 0 55%;
        }
        .decedent,.spouse{
            position:relative;
            top:100px;
        }
        .divorced_children{
            width: 48%;
            display: inline-block;
            vertical-align: top;
            position:relative;
            top:-100px;
        }
        .children p {
            display: block;  /* 確認のために display プロパティを明示的に設定 */
        }
        .children{
            width: 48%;
            display: inline-block;
            vertical-align: top;
            z-index: 10;  /* 前面に表示する */
            position: relative;
            top: -150px;"
        }
        .divorced_spouse{
            top:0;
            text-align: left;
        }
      /* 縦の二重線のスタイル */
        .vertical-double-line-one {
            display: inline-block;
            height: 100px; /* 二重線の高さ */
            border-left: 3px double black; /* 二重線のスタイル */
            margin: 0 20px; /* 左右の余白 */
        }
        .vertical-double-line-one::after {
            content: "";
            display: block;
            width: 320px; /* 横線の幅 */
            height: 0;
            border-top: 2px solid black; /* 横線のスタイル */
            position: absolute;
            top: 15%; /* 二重線の中央に位置 */
            right: 360px; /* 二重線の右側に位置 */
        }
           /* 縦の二重線のスタイル */
        .vertical-double-line {
            display: inline-block;
            height: 100px; /* 二重線の高さ */
            border-left: 3px double black; /* 二重線のスタイル */
            margin: 0 20px; /* 左右の余白 */
            position:relative;
            top:100px;
        }
        .vertical-double-line::after {
            content: "";
            display: block;
            width: 340px; /* 横線の幅 */
            height: 0;
            border-top: 2px solid black; /* 横線のスタイル */
            position: absolute;
            top: 30%; /* 二重線の中央に位置 */
            right: -340px; /* 二重線の右側に位置 */
        }
           /* 縦の線を下部に追加するスタイル */
        .vertical-line-bottom {
            display: inline-block;
            height: 100px; /* 必要に応じて高さを調整 */
            border-left: 3px solid black; /* 縦線のスタイル */
            margin: 0 20px; /* 左右の余白 */
            position: absolute; /* これを変更 */
            left: -80px; /* 子供情報の左側に配置 */
            top: 60px; /* 必要に応じて調整 */

        }
        .vertical-line-bottom::after {
            content: "";
            display: block;
            width: 30px; /* 横線の幅 */
            height: 0;
            border-top: 3px solid black; /* 横線のスタイル */
            position: absolute;
            top: 73; /* 縦線の上部に位置 */
            left: 100%; /* 縦線の右側に配置 */
        }
        .bottom {
            position: absolute;
            bottom: 130; /* ページの一番下に固定 */
            width: 100%; /* 横幅をページ全体に広げる */
            text-align: center;
            page-break-inside: avoid;
        }
        .provider{
            border:1px solid black;
            text-align: left;
            width:60%;
            margin:0 auto;
            padding:8px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>被相続人 {{ $data['decedent']['name'] }} 法定相続情報</h1>
    </div>

    <div class="container">
            <!-- 離婚した子供情報 -->
        @if(isset($data['divorced_children']) && count($data['divorced_children']) > 0)
        <div class="divorced_spouse">
            <h2>（{{ $data['former_spouse_gender'] == 'female' ? '元妻' : '元夫' }}）</h2>
        </div>

        <!-- 縦の二重線をここに追加 -->
        <div class="vertical-double-line-one"></div>

        <div class="right">
            <div class="divorced_children">
                @foreach($data['divorced_children'] as $index => $child)
                    @if(isset( $data['child']['address']))
                    <p>住所: {{ $child['address'] }}</p>
                    @else
                    <br>
                    @endif
                    <p>出生: {{ $child['birthdate'] }}</p>
                    <p> ({{ $child['relationship'] }})</p>
                    <p> {{ $child['name'] }}</p>
                @endforeach
            </div>
        </div>
        @endif

        <div class="left">
            <!-- 被相続人情報 -->
            <div class="decedent">
                <p>最後の住所: {{ $data['decedent']['last_address'] }}</p>
                <p>最後の本籍: {{ $data['decedent']['last_domicile'] }}</p>
                <p>出生: {{ $data['decedent']['birthdate'] }}</p>
                <p>死亡: {{ $data['decedent']['deathdate'] }}</p>
                <h2>(被相続人)</h2>
                <p> {{ $data['decedent']['name'] }}</p>
            </div>
            <!-- 縦の二重線をここに追加 -->
            <div class="vertical-double-line"></div>

            <!-- 配偶者情報 -->
            <div class="spouse">
                @if(isset( $data['spouse']['address']))
                <p>住所: {{ $data['spouse']['address'] }}</p>
                @else
                <br>
                @endif
                <p>出生: {{ $data['spouse']['birthdate'] }}</p>
                <p>({{ $data['spouse']['relationship'] }})</p>
                <p> {{ $data['spouse']['name'] }}</p>
            </div>
        </div>

        <div class="right">
            <!-- 子供情報 -->
            <div class="children" >
                @foreach ($data['children'] as $index => $child)
                <div class="child">
                    @if(isset($child['address']))
                    <p>住所: {{ $child['address'] }}</p>
                    @else
                    <br>
                    @endif
                    <p>出生: {{ $child['birthdate'] }}</p>
                    <p> ({{ $child['relationship'] }})</p>
                    <p> {{ $child['name'] }}</p>
                    @if($child['name']==$data['provider']['name'])
                    <p>(申出人)</p>
                    @endif
                </div>
                @endforeach
                <!-- 子供が複数いる場合のみ縦線を追加 -->
                @if(count($data['children']) > 1)
                <div class="vertical-line-bottom"></div>
                @endif
            </div>
        </div>
    </div>
        <div class="bottom">
            <h5>以下余白</h5>
            <div class="provider">
                <p>作成日:{{$data['provider']['currentDateJapanese']}}</p>
                <p>作成者 住所:{{$data['provider']['address']}}</p>
                <p>      {{$data['provider']['name']}}</p>

            </div>
        </div>
    </div>

</body>
</html>