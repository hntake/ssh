<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>在庫管理アプリ 会社情報入力ページ</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="llco">
        <meta name="robots" content="index, follow">
        
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel="apple-touch-icon" href="./apple-touch-icon.png" sizes="180x180">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body>
    <div class="container home">
        <div class="form">
            <h1>会社情報を確認してください</h1>
            <form action="{{ route('stock_company_confirm',['id'=>$id]) }}" method="POST">
                @csrf
                <div class="r-box">
                    <div class="form-block">
                        <label for="company_name">会社名</label>
                        <input type="text" id="company_name" name="company_name" value="{{ $data['company_name'] }}">
                    </div>
                    <div class="form-block">
                        <label for="postal">郵便番号</label>
                        <input type="text" id="postal" name="postal" value="{{ $data['postal'] }}">
                        <button type="button" class="api-address">住所を取得</button>
                    </div> 
                    <div class="form-block">
                        <label for="address">住所</label>
                        <input type="text" id="address" name="address" value="{{ $data['address'] }}">
                    </div>
                    <div class="form-block">
                        <label for="phone_number">電話番号</label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ $data['phone_number'] }}">
                    </div>
                </div>
            
                <button type="submit">会社情報を登録する</button>
            </form>
            <button type="button" name="action" value="back" onclick="goBack()">
                入力内容修正
            </button>
        </div>
    </div>
    
    <script>
        document.querySelector('.api-address').addEventListener('click', () => {
            const elem = document.querySelector('#postal'); // 修正: postalを使用
            const zip = elem.value.trim();
            
            // 郵便番号が7桁の数字かチェック
            if (!/^\d{7}$/.test(zip)) {
                alert("郵便番号は7桁の数字で入力してください。");
                return;
            }

            fetch('/api/address/' + zip)
                .then((data) => data.json())
                .then((obj) => {
                    let txt;
                    if (!Object.keys(obj).length) {
                        txt = '住所が存在しません。';
                    } else {
                        txt = obj.pref + obj.city + obj.town;
                    }
                    document.querySelector('#address').value = txt;
                })
                .catch((error) => {
                    alert("住所の取得に失敗しました。");
                });
        });
    </script>
    <script>
        function goBack() {
            // 必要に応じて処理を追加
            // 例えば、前のページに戻る場合:
            window.history.back();
        }
    </script>
</body>
</html>