<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="このサイトでは、現役国会議員の不祥事データをわかりやすく視覚化しています。裏金問題や統一教会の問題だけでなく、他の不祥事に関する情報も掲載しています。
    全ての不祥事を数値化し、議員の不祥事をランキング表示しています。また、皆さんからの不祥事の投稿も歓迎しています。">
    <meta name="keywords" content="自民党,裏金問題,統一教会,国会議員,年齢順,衆議院,参議院,議員一覧,裏金">
    <meta name="author" content="llco">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> <!-- word.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/word.css') }}"> <!-- word.cssと連携 -->
    <link rel="stylesheet" href="{{ asset('css/diet.css') }}"> <!-- word.cssと連携 -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Watch them! 国会議員監視サイト">
    <meta property="og:description" content="We can change!  It's time to change Japan now.">
    <meta property="og:image" content="https://eng50cha.com/img/diet_banner_new.png">
    <meta property="og:url" content="https://eng50cha.com/diet/vote">
    <meta property="og:site_name" content="Watch them! 国会議員監視サイト">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ITcha50">
    <meta name="twitter:title" content="Watch them! 国会議員監視サイト">
    <meta name="twitter:description" content="We can change! It's time to change Japan now.">
    <meta name="twitter:image" content="https://eng50cha.com/img/diet_banner_new.png?4362984378">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link rel="apple-touch-icon" href="./apple-touch-icon.png" sizes="180x180">
    <title>2024 衆議院議員総選挙</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background: #333;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        #main-content {
            padding: 1rem;
            background: #fff;
            margin-top: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            text-align: left;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .call-to-action {
            background: #28a745;
            color: white;
            padding: 1rem;
            text-align: center;
            margin-top: 1rem;
            font-size: 1.2rem;
            cursor: pointer;
        }
        .call-to-action:hover {
            background: #218838;
        }
        .block-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .block {
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            background-color: #f0f0f0;
            text-align: center;
        }
        .block:hover {
            background-color: #ddd;
        }
        .content-list {
            display: none;
            margin-top: 10px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .content-list.open {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>2024 衆議院議員総選挙(仮)</h1>
        <p>不祥事議員には投票しない！ 選挙区別候補者一覧</p>
    </header>
    <div class="block-list">
        <div class="block" onclick="toggleContent('content1')">北海道エリア</div>
            <div class="content-list" id="content1">
                <div class="block" onclick="toggleContent('content1_prefecture')">北海道</div>
            </div>
                <div class="content-list" id="content1_prefecture">
                    <div class="block" ><a href="{{route('next',['id'=>'北海道1区'])}}">北海道1区</a></div>
                    <div class="block">北海道2区</div>
                    <div class="block" >北海道3区</div>
                    <div class="block">北海道4区</div>
                    <div class="block" >北海道5区</div>
                    <div class="block">北海道6区</div>
                    <div class="block" >北海道7区</div>
                    <div class="block">北海道8区</div>
                    <div class="block" >北海道9区</div>
                    <div class="block">北海道10区</div>
                    <div class="block" >北海道11区</div>
                    <div class="block">北海道12区</div>
                </div>
        <div class="block" onclick="toggleContent('content2')">東北エリア</div>
            <div class="content-list" id="content2">
                <div class="block" onclick="toggleContent('content2_prefecture1')">青森県</div>
                <div class="block" onclick="toggleContent('content2_prefecture2')">岩手県</div>
                <div class="block" onclick="toggleContent('content2_prefecture3')">宮城県</div>
                <div class="block" onclick="toggleContent('content2_prefecture4')">秋田県</div>
                <div class="block" onclick="toggleContent('content2_prefecture5')">山形県</div>
                <div class="block" onclick="toggleContent('content2_prefecture6')">福島県</div>
            </div>
                <div class="content-list" id="content2_prefecture1">
                    <div class="block">青森1区</div>
                    <div class="block">青森2区</div>
                </div>
                <div class="content-list" id="content2_prefecture2">
                    <div class="block">岩手1区</div>
                    <div class="block">岩手2区</div>
                    <div class="block">岩手3区</div>
                </div>
                <div class="content-list" id="content2_prefecture3">
                    <div class="block">宮城1区</div>
                    <div class="block">宮城2区</div>
                    <div class="block">宮城3区</div>
                    <div class="block">宮城4区</div>
                    <div class="block">宮城5区</div>
                </div>
                <div class="content-list" id="content2_prefecture4">
                    <div class="block">秋田1区</div>
                    <div class="block">秋田2区</div>
                    <div class="block">秋田3区</div>
                </div>
                <div class="content-list" id="content2_prefecture5">
                    <div class="block">山形1区</div>
                    <div class="block">山形2区</div>
                    <div class="block">山形3区</div>
                </div>
                <div class="content-list" id="content2_prefecture6">
                    <div class="block">福島1区</div>
                    <div class="block">福島2区</div>
                    <div class="block">福島3区</div>
                    <div class="block">福島4区</div>
                </div>
        <div class="block" onclick="toggleContent('content3')">北関東エリア</div>
            <div class="content-list" id="content3">
                <div class="block" onclick="toggleContent('content3_prefecture1')">茨城県</div>
                <div class="block" onclick="toggleContent('content3_prefecture2')">栃木県</div>
                <div class="block" onclick="toggleContent('content3_prefecture3')">群馬県</div>
                <div class="block" onclick="toggleContent('content3_prefecture4')">埼玉県</div>
            </div>
                <div class="content-list" id="content3_prefecture1">
                    <div class="block">茨城1区</div>
                    <div class="block">茨城2区</div>
                    <div class="block">茨城3区</div>
                    <div class="block">茨城4区</div>
                    <div class="block">茨城5区</div>
                    <div class="block">茨城6区</div>
                    <div class="block">茨城7区</div>
                </div>
                <div class="content-list" id="content3_prefecture2">
                    <div class="block">栃木1区</div>
                    <div class="block">栃木2区</div>
                    <div class="block">栃木3区</div>
                    <div class="block">栃木4区</div>
                    <div class="block">栃木5区</div>
                </div>
                <div class="content-list" id="content3_prefecture3">
                    <div class="block">群馬1区</div>
                    <div class="block">群馬2区</div>
                    <div class="block">群馬3区</div>
                    <div class="block">群馬4区</div>
                    <div class="block">群馬5区</div>
                </div>
                <div class="content-list" id="content3_prefecture4">
                    <div class="block">埼玉1区</div>
                    <div class="block">埼玉2区</div>
                    <div class="block">埼玉3区</div>
                    <div class="block">埼玉4区</div>
                    <div class="block">埼玉5区</div>
                    <div class="block">埼玉6区</div>
                    <div class="block">埼玉7区</div>
                    <div class="block">埼玉8区</div>
                    <div class="block">埼玉9区</div>
                    <div class="block">埼玉10区</div>
                    <div class="block">埼玉11区</div>
                    <div class="block">埼玉12区</div>
                    <div class="block">埼玉13区</div>
                    <div class="block">埼玉14区</div>
                    <div class="block">埼玉15区</div>
                    <div class="block">埼玉16区</div>
                </div>
        <div class="block" onclick="toggleContent('content4')">南関東エリア</div>
        <div class="content-list" id="content4">
                <div class="block" onclick="toggleContent('content4_prefecture1')">千葉県</div>
                <div class="block" onclick="toggleContent('content4_prefecture2')">神奈川県</div>
                <div class="block" onclick="toggleContent('content4_prefecture3')">山梨県</div>
            </div>
                <div class="content-list" id="content4_prefecture1">
                    <div class="block">千葉1区</div>
                    <div class="block">千葉2区</div>
                    <div class="block">千葉3区</div>
                    <div class="block">千葉4区</div>
                    <div class="block">千葉5区</div>
                    <div class="block">千葉6区</div>
                    <div class="block">千葉7区</div>
                    <div class="block">千葉8区</div>
                    <div class="block">千葉9区</div>
                    <div class="block">千葉10区</div>
                    <div class="block">千葉11区</div>
                    <div class="block">千葉12区</div>
                    <div class="block">千葉13区</div>
                    <div class="block">千葉14区</div>
                </div>
                <div class="content-list" id="content4_prefecture2">
                    <div class="block">神奈川1区</div>
                    <div class="block">神奈川2区</div>
                    <div class="block">神奈川3区</div>
                    <div class="block">神奈川4区</div>
                    <div class="block">神奈川5区</div>
                    <div class="block">神奈川6区</div>
                    <div class="block">神奈川7区</div>
                    <div class="block">神奈川8区</div>
                    <div class="block">神奈川9区</div>
                    <div class="block">神奈川10区</div>
                    <div class="block">神奈川11区</div>
                    <div class="block">神奈川12区</div>
                    <div class="block">神奈川13区</div>
                    <div class="block">神奈川14区</div>
                    <div class="block">神奈川15区</div>
                    <div class="block">神奈川16区</div>
                    <div class="block">神奈川17区</div>
                    <div class="block">神奈川18区</div>
                    <div class="block">神奈川19区</div>
                    <div class="block">神奈川20区</div>
                </div>
                <div class="content-list" id="content4_prefecture3">
                    <div class="block">山梨1区</div>
                    <div class="block">山梨2区</div>
                </div>
        <div class="block" onclick="toggleContent('content5')">東京エリア</div>
        <div class="content-list" id="content5">
                <div class="block" onclick="toggleContent('content5_prefecture')">東京都</div>
            </div>
            <div class="content-list" id="content5_prefecture1">
                    <div class="block">東京1区</div>
                    <div class="block">東京2区</div>
                    <div class="block">東京3区</div>
                    <div class="block">東京4区</div>
                    <div class="block">東京5区</div>
                    <div class="block">東京6区</div>
                    <div class="block">東京7区</div>
                    <div class="block">東京8区</div>
                    <div class="block">東京9区</div>
                    <div class="block">東京10区</div>
                    <div class="block">東京11区</div>
                    <div class="block">東京12区</div>
                    <div class="block">東京13区</div>
                    <div class="block">東京14区</div>
                    <div class="block">東京15区</div>
                    <div class="block">東京16区</div>
                    <div class="block">東京17区</div>
                    <div class="block">東京18区</div>
                    <div class="block">東京19区</div>
                    <div class="block">東京20区</div>
                    <div class="block">東京21区</div>
                    <div class="block">東京22区</div>
                    <div class="block">東京23区</div>
                    <div class="block">東京24区</div>
                    <div class="block">東京25区</div>
                    <div class="block">東京26区</div>
                    <div class="block">東京27区</div>
                    <div class="block">東京28区</div>
                    <div class="block">東京29区</div>
                    <div class="block">東京30区</div>
                </div>
        <div class="block" onclick="toggleContent('content6')">北陸信越エリア</div>
            <div class="content-list" id="content6">
                <div class="block" onclick="toggleContent('content6_prefecture1')">新潟県</div>
                <div class="block" onclick="toggleContent('content6_prefecture2')">長野県</div>
                <div class="block" onclick="toggleContent('content6_prefecture3')">富山県</div>
                <div class="block" onclick="toggleContent('content6_prefecture4')">石川県</div>
                <div class="block" onclick="toggleContent('content6_prefecture5')">福井県</div>
            </div>
                <div class="content-list" id="content6_prefecture1">
                    <div class="block">新潟1区</div>
                    <div class="block">新潟2区</div>
                    <div class="block">新潟3区</div>
                    <div class="block">新潟4区</div>
                    <div class="block">新潟5区</div>
                </div>
                <div class="content-list" id="content6_prefecture2">
                    <div class="block">長野1区</div>
                    <div class="block">長野2区</div>
                    <div class="block">長野3区</div>
                    <div class="block">長野4区</div>
                    <div class="block">長野5区</div>
                </div>
                <div class="content-list" id="content6_prefecture3">
                    <div class="block">富山1区</div>
                    <div class="block">富山2区</div>
                    <div class="block">富山3区</div>
                </div>
                <div class="content-list" id="content6_prefecture4">
                    <div class="block">石川1区</div>
                    <div class="block">石川2区</div>
                    <div class="block">石川3区</div>
                </div>
                <div class="content-list" id="content6_prefecture5">
                    <div class="block">福井1区</div>
                    <div class="block">福井2区</div>
                </div>
        <div class="block" onclick="toggleContent('content7')">東海エリア</div>
            <div class="content-list" id="content7">
                <div class="block" onclick="toggleContent('content7_prefecture1')">岐阜県</div>
                <div class="block" onclick="toggleContent('content7_prefecture2')">愛知県</div>
                <div class="block" onclick="toggleContent('content7_prefecture3')">静岡県</div>
                <div class="block" onclick="toggleContent('content7_prefecture4')">三重県</div>
            </div>
            <div class="content-list" id="content7_prefecture1">
                    <div class="block">岐阜1区</div>
                    <div class="block">岐阜2区</div>
                    <div class="block">岐阜3区</div>
                    <div class="block">岐阜4区</div>
                    <div class="block">岐阜5区</div>
                </div>
                <div class="content-list" id="content7_prefecture2">
                    <div class="block">愛知1区</div>
                    <div class="block">愛知2区</div>
                    <div class="block">愛知3区</div>
                    <div class="block">愛知4区</div>
                    <div class="block">愛知5区</div>
                    <div class="block">愛知6区</div>
                    <div class="block">愛知7区</div>
                    <div class="block">愛知8区</div>
                    <div class="block">愛知9区</div>
                    <div class="block">愛知10区</div>
                    <div class="block">愛知11区</div>
                    <div class="block">愛知12区</div>
                    <div class="block">愛知13区</div>
                    <div class="block">愛知14区</div>
                    <div class="block">愛知15区</div>
                    <div class="block">愛知16区</div>
                </div>
                <div class="content-list" id="content7_prefecture3">
                    <div class="block">静岡1区</div>
                    <div class="block">静岡2区</div>
                    <div class="block">静岡3区</div>
                    <div class="block">静岡4区</div>
                    <div class="block">静岡5区</div>
                    <div class="block">静岡6区</div>
                    <div class="block">静岡7区</div>
                    <div class="block">静岡8区</div>
                </div>
                <div class="content-list" id="content7_prefecture4">
                    <div class="block">三重1区</div>
                    <div class="block">三重2区</div>
                    <div class="block">三重3区</div>
                    <div class="block">三重4区</div>
                </div>
        <div class="block" onclick="toggleContent('content8')">近畿エリア</div>
            <div class="content-list" id="content8">
                <div class="block" onclick="toggleContent('content8_prefecture1')">大阪府</div>
                <div class="block" onclick="toggleContent('content8_prefecture2')">兵庫県</div>
                <div class="block" onclick="toggleContent('content8_prefecture3')">滋賀県</div>
                <div class="block" onclick="toggleContent('content8_prefecture4')">京都府</div>
                <div class="block" onclick="toggleContent('content8_prefecture5')">奈良県</div>
                <div class="block" onclick="toggleContent('content8_prefecture6')">和歌山県</div>
            </div>
            <div class="content-list" id="content8_prefecture1">
                    <div class="block">大阪1区</div>
                    <div class="block">大阪2区</div>
                    <div class="block">大阪3区</div>
                    <div class="block">大阪4区</div>
                    <div class="block">大阪5区</div>
                    <div class="block">大阪6区</div>
                    <div class="block">大阪7区</div>
                    <div class="block">大阪8区</div>
                    <div class="block">大阪9区</div>
                    <div class="block">大阪10区</div>
                    <div class="block">大阪11区</div>
                    <div class="block">大阪12区</div>
                    <div class="block">大阪13区</div>
                    <div class="block">大阪14区</div>
                    <div class="block">大阪15区</div>
                    <div class="block">大阪16区</div>
                    <div class="block">大阪17区</div>
                    <div class="block">大阪18区</div>
                    <div class="block">大阪19区</div>
                </div>
                <div class="content-list" id="content8_prefecture2">
                    <div class="block">兵庫1区</div>
                    <div class="block">兵庫2区</div>
                    <div class="block">兵庫3区</div>
                    <div class="block">兵庫4区</div>
                    <div class="block">兵庫5区</div>
                    <div class="block">兵庫6区</div>
                    <div class="block">兵庫7区</div>
                    <div class="block">兵庫8区</div>
                    <div class="block">兵庫9区</div>
                    <div class="block">兵庫10区</div>
                    <div class="block">兵庫11区</div>
                    <div class="block">兵庫12区</div>
                </div>
                <div class="content-list" id="content8_prefecture3">
                    <div class="block">滋賀1区</div>
                    <div class="block">滋賀2区</div>
                    <div class="block">滋賀3区</div>
                </div>
                <div class="content-list" id="content8_prefecture4">
                    <div class="block">京都1区</div>
                    <div class="block">京都2区</div>
                    <div class="block">京都3区</div>
                    <div class="block">京都4区</div>
                    <div class="block">京都5区</div>
                    <div class="block">京都6区</div>
                </div>
                <div class="content-list" id="content8_prefecture5">
                    <div class="block">奈良1区</div>
                    <div class="block">奈良2区</div>
                    <div class="block">奈良3区</div>
                </div>
                <div class="content-list" id="content8_prefecture6">
                    <div class="block">和歌山1区</div>
                    <div class="block">和歌山2区</div>
                </div>
        <div class="block" onclick="toggleContent('content9')">中国エリア</div>
            <div class="content-list" id="content9">
                <div class="block" onclick="toggleContent('content9_prefecture1')">鳥取県</div>
                <div class="block" onclick="toggleContent('content9_prefecture2')">島根県</div>
                <div class="block" onclick="toggleContent('content9_prefecture3')">岡山県</div>
                <div class="block" onclick="toggleContent('content9_prefecture4')">広島県</div>
                <div class="block" onclick="toggleContent('content9_prefecture5')">山口県</div>
            </div>
            <div class="content-list" id="content9_prefecture1">
                    <div class="block">鳥取1区</div>
                    <div class="block">鳥取2区</div>
                </div>
                <div class="content-list" id="content9_prefecture2">
                    <div class="block">島根1区</div>
                    <div class="block">島根2区</div>
                </div>
                <div class="content-list" id="content9_prefecture3">
                    <div class="block">岡山1区</div>
                    <div class="block">岡山2区</div>
                    <div class="block">岡山3区</div>
                    <div class="block">岡山4区</div>
                </div>
                <div class="content-list" id="content9_prefecture4">
                    <div class="block">広島1区</div>
                    <div class="block">広島2区</div>
                    <div class="block">広島3区</div>
                    <div class="block">広島4区</div>
                    <div class="block">広島5区</div>
                    <div class="block">広島6区</div>
                </div>
                <div class="content-list" id="content9_prefecture5">
                    <div class="block">山口1区</div>
                    <div class="block">山口2区</div>
                    <div class="block">山口3区</div>
                </div>
        <div class="block" onclick="toggleContent('content10')">四国エリア</div>
            <div class="content-list" id="content10">
                <div class="block" onclick="toggleContent('content10_prefecture1')">徳島県</div>
                <div class="block" onclick="toggleContent('content10_prefecture2')">香川県</div>
                <div class="block" onclick="toggleContent('content10_prefecture3')">愛媛県</div>
                <div class="block" onclick="toggleContent('content10_prefecture4')">高知県</div>
            </div>
            <div class="content-list" id="content10_prefecture1">
                    <div class="block">徳島1区</div>
                    <div class="block">徳島2区</div>
                </div>
                <div class="content-list" id="content10_prefecture2">
                    <div class="block">香川1区</div>
                    <div class="block">香川2区</div>
                    <div class="block">香川3区</div>
                </div>
                <div class="content-list" id="content10_prefecture3">
                    <div class="block">愛媛1区</div>
                    <div class="block">愛媛2区</div>
                    <div class="block">愛媛3区</div>
                </div>
                <div class="content-list" id="content10_prefecture4">
                    <div class="block">高知1区</div>
                    <div class="block">高知2区</div>
                </div>
        <div class="block" onclick="toggleContent('content11')">九州エリア</div>
            <div class="content-list" id="content11">
                <div class="block" onclick="toggleContent('content11_prefecture1')">福岡県</div>
                <div class="block" onclick="toggleContent('content11_prefecture2')">佐賀県</div>
                <div class="block" onclick="toggleContent('content11_prefecture3')">長崎県</div>
                <div class="block" onclick="toggleContent('content11_prefecture4')">大分県</div>
                <div class="block" onclick="toggleContent('content11_prefecture5')">宮崎県</div>
                <div class="block" onclick="toggleContent('content11_prefecture6')">熊本県</div>
                <div class="block" onclick="toggleContent('content11_prefecture6')">鹿児島県</div>
                <div class="block" onclick="toggleContent('content11_prefecture6')">沖縄県</div>
            </div>
            <div class="content-list" id="content11_prefecture1">
                    <div class="block">福岡1区</div>
                    <div class="block">福岡2区</div>
                    <div class="block">福岡3区</div>
                    <div class="block">福岡4区</div>
                    <div class="block">福岡5区</div>
                    <div class="block">福岡6区</div>
                    <div class="block">福岡7区</div>
                    <div class="block">福岡8区</div>
                    <div class="block">福岡9区</div>
                    <div class="block">福岡10区</div>
                    <div class="block">福岡11区</div>
                </div>
                <div class="content-list" id="content11_prefecture2">
                    <div class="block">佐賀1区</div>
                    <div class="block">佐賀2区</div>
                </div>
                <div class="content-list" id="content11_prefecture3">
                    <div class="block">長崎1区</div>
                    <div class="block">長崎2区</div>
                    <div class="block">長崎3区</div>
                </div>
                <div class="content-list" id="content11_prefecture4">
                    <div class="block">大分1区</div>
                    <div class="block">大分2区</div>
                    <div class="block">大分3区</div>
                </div>
                <div class="content-list" id="content11_prefecture5">
                    <div class="block">宮崎1区</div>
                    <div class="block">宮崎2区</div>
                    <div class="block">宮崎3区</div>
                </div>
                <div class="content-list" id="content11_prefecture6">
                    <div class="block">熊本1区</div>
                    <div class="block">熊本2区</div>
                    <div class="block">熊本3区</div>
                    <div class="block">熊本4区</div>
                </div>
                <div class="content-list" id="content11_prefecture6">
                    <div class="block">鹿児島1区</div>
                    <div class="block">鹿児島2区</div>
                    <div class="block">鹿児島3区</div>
                    <div class="block">鹿児島4区</div>
                </div>
                <div class="content-list" id="content11_prefecture7">
                    <div class="block">沖縄1区</div>
                    <div class="block">沖縄2区</div>
                    <div class="block">沖縄3区</div>
                    <div class="block">沖縄4区</div>
                </div>
    </div>
    
    <!-- 他の地域の内容も同様に追加 -->

    <script>
        function toggleContent(id) {
            var contentList = document.getElementById(id);
            if (contentList.classList.contains('open')) {
                contentList.classList.remove('open');
            } else {
                var allContentLists = document.querySelectorAll('.content-list');
                allContentLists.forEach(function(item) {
                    item.classList.remove('open');
                });
                contentList.classList.add('open');
            }
        }
    </script>
</body>
</html>
