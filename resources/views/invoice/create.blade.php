<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>無料PDF適格請求書作成サイト 会社情報入力ページ</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="無料で登録もなく利用できるオンラインサービスで、簡単に適格請求書をPDF形式で作成しましょう。
        使いやすいインターフェースとカスタマイズ可能なテンプレートで、ビジネスの請求処理をスムーズに行います。簡単な入力フォームから情報を入力し、
        即座に請求書を生成します。">
        <meta name="keywords" content="インボイス, 適格請求書, 請求書 作成, PDF請求書, オンライン請求書, 無料請求書作成, ビジネス請求書, 請求書テンプレート,
        請求書 サンプル, 請求書ソフト, 請求書ジェネレータ, 請求書フォーマット, 請求書PDF">
        <meta name="author" content="llco">
        <meta name="robots" content="index, follow">
        <!-- Fonts -->
        <link href="<https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap>" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <link rel=”apple-touch-icon” href=”./apple-touch-icon.png” sizes=”180×180″>


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body>
    <div class="container home">
        <div class="top">
            <img src="../img/open_invoice.png" alt="適格請求書作成" style="width:30%;">
        </div>
        <div class="form">
            <h1>会社情報登録</h1>
            <p style="text-align:center;">※必要な箇所だけ入力しましょう</p>
            <form action="{{ route('invoice_company_post',['id'=>$invoice->id]) }}" method="POST">
                @csrf
                <div class="r-box">
                    <div class="form-block">
                            <label for="company_name">会社名</label>
                            <input type="text" id="company_name" name="company_name">
                    </div>
                    <div class="form-block">
                            <label for="postal_number">郵便番号</label>
                            <input type="text" id="postal_number" name="postal_number">
                    </div> <div class="form-block">
                            <label for="address">住所</label>
                            <input type="text" id="address" name="address">
                    </div>
                    <div class="form-block">
                            <label for="phone_number">電話番号</label>
                            <input type="text" id="phone_number" name="phone_number">
                    </div>
                    <div class="form-block">
                            <label for="company_number">登録番号</label>
                            <input type="text" id="company_number" name="company_number">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type1" class="col-md-4 col-form-label text-md-end">{{ __('内訳1') }}</label>
                        <input type="text" id="type1" name="type1">
                    </div>
                    <div class="form-block">
                        <label for="category1"><input type="radio" id="category1" name="tax1" value="1" checked>税率10%</label>
                        <label for="category2"><input type="radio" id="category2" name="tax1" value="2">税率8%</label>
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type2" class="col-md-4 col-form-label text-md-end">{{ __('内訳2') }}</label>
                        <input type="text" id="type2" name="type2">
                    </div>
                    <div class="form-block">
                        <label for="category3"><input type="radio" id="category3" name="tax2" value="1" checked>税率10%</label>
                        <label for="category4"><input type="radio" id="category4" name="tax2" value="2">税率8%</label>
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type3" class="col-md-4 col-form-label text-md-end">{{ __('内訳3') }}</label>
                        <input type="text" id="type3" name="type3">
                    </div>
                    <div class="form-block">
                        <label for="category5"><input type="radio" id="category5" name="tax3" value="1" checked>税率10%</label>
                        <label for="category6"><input type="radio" id="category6" name="tax3" value="2">税率8%</label>
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type4" class="col-md-4 col-form-label text-md-end">{{ __('内訳4') }}</label>
                        <input type="text" id="type4" name="type4">
                    </div>
                    <div class="form-block">
                        <label for="category7"><input type="radio" id="category7" name="tax4" value="1" checked>税率10%</label>
                        <label for="category8"><input type="radio" id="category8" name="tax4" value="2">税率8%</label>
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳5') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category9"><input type="radio" id="category9" name="tax5" value="1" checked>税率10%</label>
                        <label for="category10"><input type="radio" id="category10" name="tax5" value="2">税率8%</label>
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳6') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category11"><input type="radio" id="category11" name="tax6" value="1" checked>税率10%</label>
                        <label for="category12"><input type="radio" id="category12" name="tax6" value="2">税率8%</label>
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳7') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category13"><input type="radio" id="category13" name="tax7" value="1" checked>税率10%</label>
                        <label for="category14"><input type="radio" id="category14" name="tax7" value="2">税率8%</label>
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳8') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category15"><input type="radio" id="category17" name="tax8" value="1" checked>税率10%</label>
                        <label for="category16"><input type="radio" id="category16" name="tax8" value="2">税率8%</label>
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳9') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category17"><input type="radio" id="category17" name="tax9" value="1" checked>税率10%</label>
                        <label for="category18"><input type="radio" id="category18" name="tax9" value="2">税率8%</label>
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳10') }}</label>
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="category19"><input type="radio" id="category19" name="tax10" value="1" checked>税率10%</label>
                        <label for="category20"><input type="radio" id="category20" name="tax10" value="2">税率8%</label>
                    </div>
                </div>
         
                <button type="submit">会社情報を登録する</button>
            </form>
        </div>
    </div>

</body>
</html>
