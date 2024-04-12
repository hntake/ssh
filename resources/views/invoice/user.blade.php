<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>無料PDF適格請求書作成サイト 会員専用作成ページ</title>

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
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8877496646325962"
    crossorigin="anonymous"></script>
    </head>
<body>
    <div class="container home">
        <div class="form">
            <h1>請求書作成</h1>
            <p style="text-align:center;">※必要な箇所だけ入力しましょう</p>
            <form action="{{ route('pdf_open') }}" method="GET">
                @csrf
                <div class="r-box">
                    <div class="form-block">
                        <label for="invoice_number">請求書No.</label>
                        <input type="text" id="invoice_number" name="invoice_number">
                    </div>
                    <div class="form-block">
                        <label for="billing-address">請求先</label>
                        <input type="text" id="billing-address" name="billing-address">
                    </div>
                    <div class="form-block">
                        <label for="billing-date">請求日</label>
                        <input type="date" id="billing-date" name="billing-date">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type1" class="col-md-4 col-form-label text-md-end">{{ __('内訳1') }}</label>
                        @if(isset($invoice->type1))
                        <input type="text" id="type1" name="type1" value="{{$invoice->type1}}">
                            @if($tax1==1)
                            <label for="tax1"><input type="radio" id="tax1" name="category1" value="1" checked>税率10%</label>
                            @else
                            <label for="tax2"><input type="radio" id="tax2" name="category1" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type1" name="type1">
                    </div>
                    <div class="form-block">
                        <label for="tax1"><input type="radio" id="tax1" name="category1" value="1" checked>税率10%</label>
                        <label for="tax2"><input type="radio" id="tax2" name="category1" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="cost1">単価</label>
                        <input type="text" id="cost1" name="cost1">
                    </div>
                    <div class="form-block">
                            <label for="count1">数量</label>
                            <input type="text" id="count1" name="count1">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type2" class="col-md-4 col-form-label text-md-end">{{ __('内訳2') }}</label>
                        @if(isset($invoice->type2))
                        <input type="text" id="type2" name="type2" value="{{$invoice->type2}}">
                            @if($tax2==1)
                            <label for="tax3"><input type="radio" id="tax3" name="category2" value="1" checked>税率10%</label>
                            @else
                            <label for="tax4"><input type="radio" id="tax4" name="category2" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type2" name="type2">
                    </div>
                    <div class="form-block">
                        <label for="tax3"><input type="radio" id="tax3" name="category2" value="1" checked>税率10%</label>
                        <label for="tax4"><input type="radio" id="tax4" name="category2" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="cost2">単価</label>
                        <input type="text" id="cost2" name="cost2">
                    </div>
                    <div class="form-block">
                            <label for="count2">数量</label>
                            <input type="text" id="count2" name="count2">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type3" class="col-md-4 col-form-label text-md-end">{{ __('内訳3') }}</label>
                        @if(isset($invoice->type3))
                        <input type="text" id="type3" name="type3" value="{{$invoice->type3}}">
                            @if($tax3==1)
                            <label for="tax5"><input type="radio" id="tax5" name="category3" value="1" checked>税率10%</label>
                            @else
                            <label for="tax6"><input type="radio" id="tax6" name="category3" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type3" name="type3">
                    </div>
                    <div class="form-block">
                        <label for="tax5"><input type="radio" id="tax5" name="category3" value="1" checked>税率10%</label>
                        <label for="tax6"><input type="radio" id="tax6" name="category3" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="cost3">単価</label>
                        <input type="text" id="cost3" name="cost3">
                    </div>
                    <div class="form-block">
                            <label for="count3">数量</label>
                            <input type="text" id="count3" name="count3">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type4" class="col-md-4 col-form-label text-md-end">{{ __('内訳4') }}</label>
                        @if(isset($invoice->type4))
                        <input type="text" id="type4" name="type4" value="{{$invoice->type4}}">
                            @if($tax4==1)
                            <label for="tax7"><input type="radio" id="tax7" name="category4" value="1" checked>税率10%</label>
                            @else
                            <label for="tax8"><input type="radio" id="tax8" name="category4" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type4" name="type4">
                    </div>
                    <div class="form-block">
                        <label for="tax7"><input type="radio" id="tax7" name="category4" value="1" checked>税率10%</label>
                        <label for="tax8"><input type="radio" id="tax8" name="category4" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                        <label for="cost4">単価</label>
                        <input type="text" id="cost4" name="cost4">
                    </div>
                    <div class="form-block">
                            <label for="count4">数量</label>
                            <input type="text" id="count4" name="count4">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳5') }}</label>
                        @if(isset($invoice->type5))
                        <input type="text" id="type5" name="type5" value="{{$invoice->type5}}">
                            @if($tax5==1)
                            <label for="tax9"><input type="radio" id="tax9" name="category5" value="1" checked>税率10%</label>
                            @else
                            <label for="tax10"><input type="radio" id="tax10" name="category5" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type5" name="type5">
                    </div>
                    <div class="form-block">
                        <label for="tax9"><input type="radio" id="tax9" name="category5" value="1" checked>税率10%</label>
                        <label for="tax10"><input type="radio" id="tax10" name="category5" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost5">単価</label>
                        <input type="text" id="cost5" name="cost5">
                    </div>
                    <div class="form-block">
                            <label for="count5">数量</label>
                            <input type="text" id="count5" name="count5">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type6" class="col-md-4 col-form-label text-md-end">{{ __('内訳6') }}</label>
                        @if(isset($invoice->type6))
                        <input type="text" id="type6" name="type6" value="{{$invoice->type6}}">
                            @if($tax6==1)
                            <label for="tax11"><input type="radio" id="tax11" name="category6" value="1" checked>税率10%</label>
                            @else
                            <label for="tax12"><input type="radio" id="tax12" name="category6" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type6" name="type6">
                    </div>
                    <div class="form-block">
                        <label for="tax11"><input type="radio" id="tax11" name="category6" value="1" checked>税率10%</label>
                        <label for="tax12"><input type="radio" id="tax12" name="category6" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost6">単価</label>
                        <input type="text" id="cost6" name="cost6">
                    </div>
                    <div class="form-block">
                            <label for="count6">数量</label>
                            <input type="text" id="count6" name="count6">
                    </div>
                </div><div class="r-box">
                    <div class="form-block">
                        <label for="type7" class="col-md-4 col-form-label text-md-end">{{ __('内訳7') }}</label>
                        @if(isset($invoice->type7))
                        <input type="text" id="type7" name="type7" value="{{$invoice->type7}}">
                            @if($tax7==1)
                            <label for="tax13"><input type="radio" id="tax13" name="category7" value="1" checked>税率10%</label>
                            @else
                            <label for="tax14"><input type="radio" id="tax14" name="category7" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type7" name="type7">
                    </div>
                    <div class="form-block">
                        <label for="tax13"><input type="radio" id="tax13" name="category7" value="1" checked>税率10%</label>
                        <label for="tax14"><input type="radio" id="tax14" name="category7" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost7">単価</label>
                        <input type="text" id="cost7" name="cost7">
                    </div>
                    <div class="form-block">
                            <label for="count7">数量</label>
                            <input type="text" id="count7" name="count7">
                    </div>
                </div><div class="r-box">
                    <div class="form-block">
                        <label for="type8" class="col-md-4 col-form-label text-md-end">{{ __('内訳8') }}</label>
                        @if(isset($invoice->type8))
                        <input type="text" id="type8" name="type8" value="{{$invoice->type8}}">
                            @if($tax8==1)
                            <label for="tax15"><input type="radio" id="tax15" name="category8" value="1" checked>税率10%</label>
                            @else
                            <label for="tax16"><input type="radio" id="tax16" name="category8" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type8" name="type8">
                    </div>
                    <div class="form-block">
                        <label for="tax15"><input type="radio" id="tax15" name="category8" value="1" checked>税率10%</label>
                        <label for="tax16"><input type="radio" id="tax16" name="category8" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost8">単価</label>
                        <input type="text" id="cost8" name="cost8">
                    </div>
                    <div class="form-block">
                            <label for="count8">数量</label>
                            <input type="text" id="count8" name="count8">
                    </div>
                </div><div class="r-box">
                    <div class="form-block">
                        <label for="type9" class="col-md-4 col-form-label text-md-end">{{ __('内訳9') }}</label>
                        @if(isset($invoice->type9))
                        <input type="text" id="type9" name="type9" value="{{$invoice->type9}}">
                            @if($tax9==1)
                            <label for="tax17"><input type="radio" id="tax17" name="category9" value="1" checked>税率10%</label>
                            @else
                            <label for="tax18"><input type="radio" id="tax18" name="category9" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type9" name="type9">
                    </div>
                    <div class="form-block">
                        <label for="tax17"><input type="radio" id="tax17" name="category9" value="1" checked>税率10%</label>
                        <label for="tax18"><input type="radio" id="tax18" name="category9" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost9">単価</label>
                        <input type="text" id="cost9" name="cost9">
                    </div>
                    <div class="form-block">
                            <label for="count9">数量</label>
                            <input type="text" id="count9" name="count9">
                    </div>
                </div><div class="r-box">
                    <div class="form-block">
                        <label for="type10" class="col-md-4 col-form-label text-md-end">{{ __('内訳10') }}</label>
                        @if(isset($invoice->type10))
                        <input type="text" id="type4" name="type10" value="{{$invoice->type10}}">
                            @if($tax10==1)
                            <label for="tax19"><input type="radio" id="tax19" name="category10" value="1" checked>税率10%</label>
                            @else
                            <label for="tax20"><input type="radio" id="tax20" name="category10" value="2" checked>税率8%</label>
                            @endif
                        @else
                        <input type="text" id="type10" name="type10">
                    </div>
                    <div class="form-block">
                        <label for="tax19"><input type="radio" id="tax19" name="category10" value="1" checked>税率10%</label>
                        <label for="tax20"><input type="radio" id="tax20" name="category10" value="2">税率8%</label>
                        @endif
                    </div>
                    <div class="form-block">
                            <label for="cost10">単価</label>
                        <input type="text" id="cost10" name="cost10">
                    </div>
                    <div class="form-block">
                            <label for="count10">数量</label>
                            <input type="text" id="count10" name="count10">
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                            <label for="company_name">会社名</label>
                            <input type="text" id="company_name" name="company_name" value="{{$invoice->company_name}}">
                    </div>
                    <div class="form-block">
                            <label for="postal_number">郵便番号</label>
                            @if(isset($invoice->postal_number))
                            <input type="text" id="postal_number" name="postal_number" value="{{$invoice->postal_number}}">
                            @else
                            <input type="text" id="postal_number" name="postal_number">
                            @endif
                    </div> <div class="form-block">
                            <label for="address">住所</label>
                            @if(isset($invoice->address))
                            <input type="text" id="address" name="address" value="{{$invoice->address}}">
                            @else
                            <input type="text" id="address" name="address">
                            @endif
                    </div>
                    <div class="form-block">
                            <label for="phone_number">電話番号</label>
                            @if(isset($invoice->phone_number))
                            <input type="text" id="phone_number" name="phone_number" value="{{$invoice->phone_number}}">
                            @else
                            <input type="text" id="phone_number" name="phone_number">
                            @endif
                    </div>
                    <div class="form-block">
                            <label for="company_number">登録番号</label>
                            @if(isset($invoice->company_number))
                            <input type="text" id="company_number" name="company_number" value="{{$invoice->company_number}}">
                            @else
                            <input type="text" id="company_number" name="company_number">
                            @endif
                    </div>
                </div>
                <button type="submit">請求書作成</button>
            </form>
        </div>
    </div>

</body>
</html>
