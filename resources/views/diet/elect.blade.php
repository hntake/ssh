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
            margin-bottom:100px;
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
        <h1>2024 衆議院議員総選挙</h1>
        <h2>不祥事議員に要注意！<br> 選挙区別候補者一覧</h2>
    </header>
    <div class="block-list">
    <div id="nav-drawer">
            <input id="nav-input" type="checkbox" class="nav-unshown">
            <label id="nav-open" for="nav-input"><span></span></label>
            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
            <div id="nav-content">
            <ul>
                    <li><a href="{{ url('diet/vote') }}">
                            <h3 ontouchstart="">選挙に行こう！サイトトップページに戻る</h3>
                        </a></li>
                    <li><a href="{{ url('diet/index') }}">
                        <h3 ontouchstart="">不祥事度ランキング</h3>
                    </a></li>
                    <li><a href="{{ url('diet/all') }}">
                        <h3 ontouchstart="">議員一覧</h3>
                    </a></li>
                    <li><a href="{{ url('diet/elect') }}">
                        <h3 ontouchstart="">2024 衆議院議員総選挙</h3>
                    </a></li>
                </ul>
            </div>
            <script>
                $(function() {
                    $('#nav-content li a').on('click', function(event) {
                        $('#nav-input').prop('checked', false);
                    });
                });
            </script>
        </div>
        <div class="block" onclick="toggleContent('content1')">北海道エリア</div>
            <div class="content-list" id="content1">
                <div class="block" onclick="toggleContent('content1_prefecture')">北海道</div>
            </div>
                <div class="content-list" id="content1_prefecture">
                    <div class="block" ><a href="{{route('next',['id'=>'北海道1'])}}">北海道1区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道2'])}}">北海道2区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道3'])}}">北海道3区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道4'])}}">北海道4区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道5'])}}">北海道5区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道6'])}}">北海道6区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道7'])}}">北海道7区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道8'])}}">北海道8区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道9'])}}">北海道9区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道10'])}}">北海道10区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道11'])}}">北海道11区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'北海道12'])}}">北海道12区</a></div>
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
                <div class="block" ><a href="{{route('next',['id'=>'青森1'])}}">青森1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'青森2'])}}">青森2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'青森3'])}}">青森3区</a></div>

            </div>
            <div class="content-list" id="content2_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'岩手1'])}}">岩手1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'岩手2'])}}">岩手2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'岩手3'])}}">岩手3区</a></div>
            </div>
                <div class="content-list" id="content2_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'宮城1'])}}">宮城1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮城2'])}}">宮城2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮城3'])}}">宮城3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮城4'])}}">宮城4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮城5'])}}">宮城5区</a></div>

                </div>
                <div class="content-list" id="content2_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'秋田1'])}}">秋田1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'秋田2'])}}">秋田2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'秋田3'])}}">秋田3区</a></div>
                </div>
                <div class="content-list" id="content2_prefecture5">
                <div class="block" ><a href="{{route('next',['id'=>'山形1'])}}">山形1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'山形2'])}}">山形2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'山形3'])}}">山形3区</a></div>
                </div>
                <div class="content-list" id="content2_prefecture6">
                <div class="block" ><a href="{{route('next',['id'=>'福島1'])}}">福島1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'福島2'])}}">福島2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'福島3'])}}">福島3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'福島4'])}}">福島4区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content3')">北関東エリア</div>
            <div class="content-list" id="content3">
                <div class="block" onclick="toggleContent('content3_prefecture1')">茨城県</div>
                <div class="block" onclick="toggleContent('content3_prefecture2')">栃木県</div>
                <div class="block" onclick="toggleContent('content3_prefecture3')">群馬県</div>
                <div class="block" onclick="toggleContent('content3_prefecture4')">埼玉県</div>
            </div>
                <div class="content-list" id="content3_prefecture1">
                <div class="block" ><a href="{{route('next',['id'=>'茨城1'])}}">茨城1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城2'])}}">茨城2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城3'])}}">茨城3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城4'])}}">茨城4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城5'])}}">茨城5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城6'])}}">茨城6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'茨城7'])}}">茨城7区</a></div>
                </div>
                <div class="content-list" id="content3_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'栃木1'])}}">栃木1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'栃木2'])}}">栃木2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'栃木3'])}}">栃木3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'栃木4'])}}">栃木4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'栃木5'])}}">栃木5区</a></div>
                </div>
                <div class="content-list" id="content3_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'群馬1'])}}">群馬1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'群馬2'])}}">群馬2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'群馬3'])}}">群馬3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'群馬4'])}}">群馬4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'群馬5'])}}">群馬5区</a></div>
                </div>
                <div class="content-list" id="content3_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'埼玉1'])}}">埼玉1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉2'])}}">埼玉2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉3'])}}">埼玉3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉4'])}}">埼玉4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉5'])}}">埼玉5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉6'])}}">埼玉6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉7'])}}">埼玉7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉8'])}}">埼玉8区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉9'])}}">埼玉9区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉10'])}}">埼玉10区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉11'])}}">埼玉11区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉12'])}}">埼玉12区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉13'])}}">埼玉13区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉14'])}}">埼玉14区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉15'])}}">埼玉15区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'埼玉16'])}}">埼玉16区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content4')">南関東エリア</div>
        <div class="content-list" id="content4">
                <div class="block" onclick="toggleContent('content4_prefecture1')">千葉県</div>
                <div class="block" onclick="toggleContent('content4_prefecture2')">神奈川県</div>
                <div class="block" onclick="toggleContent('content4_prefecture3')">山梨県</div>
            </div>
                <div class="content-list" id="content4_prefecture1">
                <div class="block" ><a href="{{route('next',['id'=>'千葉1'])}}">千葉1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉2'])}}">千葉2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉3'])}}">千葉3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉4'])}}">千葉4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉5'])}}">千葉5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉6'])}}">千葉6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉7'])}}">千葉7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉8'])}}">千葉8区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉9'])}}">千葉9区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉10'])}}">千葉10区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉11'])}}">千葉11区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉12'])}}">千葉12区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉13'])}}">千葉13区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'千葉14'])}}">千葉14区</a></div>
                </div>
                <div class="content-list" id="content4_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'神奈川1'])}}">神奈川1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川2'])}}">神奈川2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川3'])}}">神奈川3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川4'])}}">神奈川4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川5'])}}">神奈川5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川6'])}}">神奈川6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川7'])}}">神奈川7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川8'])}}">神奈川8区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川9'])}}">神奈川9区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川10'])}}">神奈川10区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川11'])}}">神奈川11区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川12'])}}">神奈川12区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川13'])}}">神奈川13区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川14'])}}">神奈川14区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川15'])}}">神奈川15区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川16'])}}">神奈川16区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川17'])}}">神奈川17区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川18'])}}">神奈川18区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川19'])}}">神奈川19区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'神奈川20'])}}">神奈川20区</a></div>
                </div>
                <div class="content-list" id="content4_prefecture3">
                    <div class="block"><a href="{{route('next',['id'=>'山梨1'])}}">山梨1区</a></div>
                    <div class="block"><a href="{{route('next',['id'=>'山梨2'])}}">山梨2区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content5')">東京エリア</div>
        <div class="content-list" id="content5">
                <div class="block" onclick="toggleContent('content5_prefecture')">東京都</div>
            </div>
            <div class="content-list" id="content5_prefecture">
            <div class="block" ><a href="{{route('next',['id'=>'東京1'])}}">東京1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京2'])}}">東京2区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京3'])}}">東京3区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京4'])}}">東京4区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京5'])}}">東京5区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京6'])}}">東京6区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京7'])}}">東京7区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京8'])}}">東京8区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京9'])}}">東京9区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京10'])}}">東京10区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京11'])}}">東京11区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京12'])}}">東京12区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京13'])}}">東京13区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京14'])}}">東京14区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京15'])}}">東京15区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京16'])}}">東京16区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京17'])}}">東京17区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京18'])}}">東京18区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京19'])}}">東京19区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京20'])}}">東京20区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京21'])}}">東京21区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京22'])}}">東京22区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京23'])}}">東京23区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京24'])}}">東京24区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京25'])}}">東京25区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京26'])}}">東京26区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京27'])}}">東京27区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京28'])}}">東京28区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京29'])}}">東京29区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'東京30'])}}">東京30区</a></div>
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
                <div class="block" ><a href="{{route('next',['id'=>'新潟1'])}}">新潟1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'新潟2'])}}">新潟2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'新潟3'])}}">新潟3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'新潟4'])}}">新潟4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'新潟5'])}}">新潟5区</a></div>
                </div>
                <div class="content-list" id="content6_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'長野1'])}}">長野1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長野2'])}}">長野2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長野3'])}}">長野3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長野4'])}}">長野4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長野5'])}}">長野5区</a></div>
                </div>
                <div class="content-list" id="content6_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'富山1'])}}">富山1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'富山2'])}}">富山2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'富山3'])}}">富山3区</a></div>
                </div>
                <div class="content-list" id="content6_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'石川1'])}}">石川1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'石川2'])}}">石川2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'石川3'])}}">石川3区</a></div>
                </div>
                <div class="content-list" id="content6_prefecture5">
                <div class="block" ><a href="{{route('next',['id'=>'福井1'])}}">福井1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'福井2'])}}">福井2区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content7')">東海エリア</div>
            <div class="content-list" id="content7">
                <div class="block" onclick="toggleContent('content7_prefecture1')">岐阜県</div>
                <div class="block" onclick="toggleContent('content7_prefecture2')">愛知県</div>
                <div class="block" onclick="toggleContent('content7_prefecture3')">静岡県</div>
                <div class="block" onclick="toggleContent('content7_prefecture4')">三重県</div>
            </div>
            <div class="content-list" id="content7_prefecture1">
            <div class="block" ><a href="{{route('next',['id'=>'岐阜1'])}}">岐阜1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'岐阜2'])}}">岐阜2区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'岐阜3'])}}">岐阜3区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'岐阜4'])}}">岐阜4区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'岐阜5'])}}">岐阜5区</a></div>
            </div>
                <div class="content-list" id="content7_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'愛知1'])}}">愛知1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知2'])}}">愛知2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知3'])}}">愛知3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知4'])}}">愛知4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知5'])}}">愛知5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知6'])}}">愛知6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知7'])}}">愛知7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知8'])}}">愛知8区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知9'])}}">愛知9区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知10'])}}">愛知10区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知11'])}}">愛知11区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知12'])}}">愛知12区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知13'])}}">愛知13区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知14'])}}">愛知14区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知15'])}}">愛知15区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛知16'])}}">愛知16区</a></div>
                </div>
                <div class="content-list" id="content7_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'静岡1'])}}">静岡1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡2'])}}">静岡2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡3'])}}">静岡3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡4'])}}">静岡4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡5'])}}">静岡5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡6'])}}">静岡6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡7'])}}">静岡7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'静岡8'])}}">静岡8区</a></div>
                </div>
                <div class="content-list" id="content7_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'三重1'])}}">三重1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'三重2'])}}">三重2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'三重3'])}}">三重3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'三重4'])}}">三重4区</a></div>
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
            <div class="block" ><a href="{{route('next',['id'=>'大阪1'])}}">大阪1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪2'])}}">大阪2区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪3'])}}">大阪3区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪4'])}}">大阪4区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪5'])}}">大阪5区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪6'])}}">大阪6区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪7'])}}">大阪7区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪8'])}}">大阪8区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪9'])}}">大阪9区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪10'])}}">大阪10区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪11'])}}">大阪11区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪12'])}}">大阪12区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪13'])}}">大阪13区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪14'])}}">大阪14区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪15'])}}">大阪15区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪16'])}}">大阪16区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪17'])}}">大阪17区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪18'])}}">大阪18区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'大阪19'])}}">大阪19区</a></div>
            </div>
                <div class="content-list" id="content8_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'兵庫1'])}}">兵庫1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫2'])}}">兵庫2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫3'])}}">兵庫3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫4'])}}">兵庫4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫5'])}}">兵庫5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫6'])}}">兵庫6区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫7'])}}">兵庫7区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫8'])}}">兵庫8区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫9'])}}">兵庫9区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫10'])}}">兵庫10区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫11'])}}">兵庫11区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'兵庫12'])}}">兵庫12区</a></div>
                </div>
                <div class="content-list" id="content8_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'滋賀1'])}}">滋賀1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'滋賀2'])}}">滋賀2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'滋賀3'])}}">滋賀3区</a></div>
                </div>
                <div class="content-list" id="content8_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'京都1'])}}">京都1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'京都2'])}}">京都2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'京都3'])}}">京都3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'京都4'])}}">京都4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'京都5'])}}">京都5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'京都6'])}}">京都6区</a></div>
                </div>
                <div class="content-list" id="content8_prefecture5">
                <div class="block" ><a href="{{route('next',['id'=>'奈良1'])}}">奈良1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'奈良2'])}}">奈良2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'奈良3'])}}">奈良3区</a></div>
                </div>
                <div class="content-list" id="content8_prefecture6">
                <div class="block" ><a href="{{route('next',['id'=>'和歌山1'])}}">和歌山1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'和歌山2'])}}">和歌山2区</a></div>
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
            <div class="block" ><a href="{{route('next',['id'=>'鳥取1'])}}">鳥取1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'鳥取2'])}}">鳥取2区</a></div>
            </div>
                <div class="content-list" id="content9_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'島根1'])}}">島根1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'島根2'])}}">島根2区</a></div>
                </div>
                <div class="content-list" id="content9_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'岡山1'])}}">岡山1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'岡山2'])}}">岡山2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'岡山3'])}}">岡山3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'岡山4'])}}">岡山4区</a></div>
                </div>
                <div class="content-list" id="content9_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'広島1'])}}">広島1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'広島2'])}}">広島2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'広島3'])}}">広島3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'広島4'])}}">広島4区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'広島5'])}}">広島5区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'広島6'])}}">広島6区</a></div>
                </div>
                <div class="content-list" id="content9_prefecture5">
                <div class="block" ><a href="{{route('next',['id'=>'山口1'])}}">山口1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'山口2'])}}">山口2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'山口3'])}}">山口3区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content10')">四国エリア</div>
            <div class="content-list" id="content10">
                <div class="block" onclick="toggleContent('content10_prefecture1')">徳島県</div>
                <div class="block" onclick="toggleContent('content10_prefecture2')">香川県</div>
                <div class="block" onclick="toggleContent('content10_prefecture3')">愛媛県</div>
                <div class="block" onclick="toggleContent('content10_prefecture4')">高知県</div>
            </div>
            <div class="content-list" id="content10_prefecture1">
            <div class="block" ><a href="{{route('next',['id'=>'徳島1'])}}">徳島1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'徳島2'])}}">徳島2区</a></div>
            </div>
                <div class="content-list" id="content10_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'香川1'])}}">香川1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'香川2'])}}">香川2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'香川3'])}}">香川3区</a></div>
                </div>
                <div class="content-list" id="content10_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'愛媛1'])}}">愛媛1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛媛2'])}}">愛媛2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'愛媛3'])}}">愛媛3区</a></div>
                </div>
                <div class="content-list" id="content10_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'高知1'])}}">高知1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'高知2'])}}">高知2区</a></div>
                </div>
        <div class="block" onclick="toggleContent('content11')">九州エリア</div>
            <div class="content-list" id="content11">
                <div class="block" onclick="toggleContent('content11_prefecture1')">福岡県</div>
                <div class="block" onclick="toggleContent('content11_prefecture2')">佐賀県</div>
                <div class="block" onclick="toggleContent('content11_prefecture3')">長崎県</div>
                <div class="block" onclick="toggleContent('content11_prefecture4')">大分県</div>
                <div class="block" onclick="toggleContent('content11_prefecture5')">宮崎県</div>
                <div class="block" onclick="toggleContent('content11_prefecture6')">熊本県</div>
                <div class="block" onclick="toggleContent('content11_prefecture7')">鹿児島県</div>
                <div class="block" onclick="toggleContent('content11_prefecture8')">沖縄県</div>
            </div>
            <div class="content-list" id="content11_prefecture1">
            <div class="block" ><a href="{{route('next',['id'=>'福岡1'])}}">福岡1区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡2'])}}">福岡2区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡3'])}}">福岡3区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡4'])}}">福岡4区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡5'])}}">福岡5区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡6'])}}">福岡6区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡7'])}}">福岡7区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡8'])}}">福岡8区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡9'])}}">福岡9区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡10'])}}">福岡10区</a></div>
            <div class="block" ><a href="{{route('next',['id'=>'福岡11'])}}">福岡11区</a></div>
            </div>
                <div class="content-list" id="content11_prefecture2">
                <div class="block" ><a href="{{route('next',['id'=>'佐賀1'])}}">佐賀1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'佐賀2'])}}">佐賀2区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture3">
                <div class="block" ><a href="{{route('next',['id'=>'長崎1'])}}">長崎1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長崎2'])}}">長崎2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'長崎3'])}}">長崎3区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture4">
                <div class="block" ><a href="{{route('next',['id'=>'大分1'])}}">大分1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'大分2'])}}">大分2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'大分3'])}}">大分3区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture5">
                <div class="block" ><a href="{{route('next',['id'=>'宮崎1'])}}">宮崎1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮崎2'])}}">宮崎2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'宮崎3'])}}">宮崎3区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture6">
                <div class="block" ><a href="{{route('next',['id'=>'熊本1'])}}">熊本1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'熊本2'])}}">熊本2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'熊本3'])}}">熊本3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'熊本4'])}}">熊本4区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture7">
                <div class="block" ><a href="{{route('next',['id'=>'鹿児島1'])}}">鹿児島1区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'鹿児島2'])}}">鹿児島2区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'鹿児島3'])}}">鹿児島3区</a></div>
                <div class="block" ><a href="{{route('next',['id'=>'鹿児島4'])}}">鹿児島4区</a></div>
                </div>
                <div class="content-list" id="content11_prefecture8">
                    <div class="block" ><a href="{{route('next',['id'=>'沖縄1'])}}">沖縄1区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'沖縄2'])}}">沖縄2区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'沖縄3'])}}">沖縄3区</a></div>
                    <div class="block" ><a href="{{route('next',['id'=>'沖縄4'])}}">沖縄4区</a></div>
                </div>

        </div>
    
        <div class="bottom">
                    <a name="scandal" class="scandal" ></a>

                    <h3 style="color:red; font-weight:bold;">※不祥事度数は当サイトに投稿された不祥事を以下の通り、数値化したものの合計数です。裏金疑惑議員には4点、統一教会関係議員には5点が加算されています</h3>
                    <a href="https://clearing-house.org/?p=6069" target=”_blank><p>・参照サイト:政治資金パーティー収入 裏金はおいくらでしたか？（裏金国会議員一覧）</p></a>
                    <a href="https://www.nikkan-gendai.com/articles/view/news/340481/2"target=”_blank><p>・自民“裏金”衆院議員44人の「新選挙区」はココだ! 政倫審拒否した全員を落選させるしかない【表付き】</p></a>
                    <a href="https://www.tokyo-np.co.jp/article/319270"target=”_blank><p>・「処分なし」の裏金議員ら46人は誰？ なぜ不問？「巻き込まれた」主張の議員も【一覧】</p></a>
                    <a href="https://digital.kyodonews.jp/static/diet/questionnaire/list0.html" target=”_blank><p>・参照サイト:共同通信 全国会議員７１２人アンケート 旧統一教会と政治の関係）</p></a>
                    <a href="https://www.news-postseven.com/archives/20220907_1790895.html?DETAIL" target=”_blank><p>・参照サイト:【鈴木エイト氏が追跡3000日】旧統一教会と関係していた国会議員168人名簿</p></a>
                    <a href="https://go2senkyo.com/shugiin/22503" target=”_blank><p>・参照サイト:選挙ドットコム 第50回衆議院議員選挙</p></a>
                    <p>・まだ衆議院選挙への立候補を正式に表明していない議員も、前回の選挙区から再び立候補する見込みで表示している場合もあります。</p>
                    <p>・選挙区や情報に間違いがありましたら、お気軽にご連絡ください。</p>
                        <div class="mail_button">
                            <a href="{{ route('contact.index') }}" style="margin:0 auto; display:flex; justify-content: center;    color: white;">Contact us</a>
                        </div>
                    <a href="https://x.com/long_msc" class="twitter-button" target="_blank">Twitter公式アカウント</a>
        </div>
        <div class="site-info">
                        <div class="widget">
                            <div class="copy-right">
                                <span class="copy-right-text">© All rights reserved by llco</span>
                            </div>
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
