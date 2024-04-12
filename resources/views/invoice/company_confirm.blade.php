<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>無料PDF適格請求書作成サイト 会社情報確認ページ</title>

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
        <div class="form">
            <h1>会社情報確認</h1>
            <p style="text-align:center;">※登録を確認してください</p>
            <form action="{{ route('invoice_company_create',['id'=>$id]) }}" method="POST">
                @csrf
                <div class="r-box">
                    <div class="form-block">
                            <label for="company_name">会社名</label>
                            <input type="text" id="company_name" name="company_name" value="{{ $data['company_name'] }}">
                    </div>
                    <div class="form-block">
                            <label for="postal_number">郵便番号</label>
                            @if(isset($postal_number))
                            <input type="text" id="postal_number" name="postal_number" value="{{ $data['postal_number'] }}">
                            @else
                            <input type="text" id="postal_number" name="postal_number">
                            @endif
                    </div> <div class="form-block">
                            <label for="address">住所</label>
                            @if(isset($address))
                            <input type="text" id="address" name="address" value="{{$data['address']}}">
                            @else
                            <input type="text" id="address" name="address">
                            @endif
                    </div>
                    <div class="form-block">
                            <label for="phone_number">電話番号</label>
                            @if(isset($phone_number))
                            <input type="text" id="phone_number" name="phone_number" value="{{$data['postal_number']}}">
                            @else
                            <input type="text" id="phone_number" name="phone_number">
                            @endif
                    </div>
                    <div class="form-block">
                            <label for="company_number">登録番号</label>
                            @if(isset($company_number))
                            <input type="text" id="company_number" name="company_number" value="{{$company_number}}">
                            @else
                            <input type="text" id="company_number" name="company_number">
                            @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type1" class="col-md-4 col-form-label text-md-end">{{ __('内訳1') }}</label>
                        @if(isset($type1))
                        <input type="text" id="type1" name="type1" value="{{$data['type1']}}">
                        @else
                        <input type="text" id="type1" name="type1">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax1))
                        @if($tax1==1)
                            <label for="category1"><input type="radio" id="category1" name="tax1" value="1" checked>税率10%</label>
                        @else    
                            <label for="category2"><input type="radio" id="category2" name="tax1" value="2"checked>税率8%</label>
                        @endif
                    @else
                    <label for="category1"><input type="radio" id="category1" name="tax1" value="1" checked>税率10%</label>
                    <label for="category2"><input type="radio" id="category2" name="tax1" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type2" class="col-md-4 col-form-label text-md-end">{{ __('内訳2') }}</label>
                        @if(isset($type2))
                        <input type="text" id="type2" name="type2" value="{{$data['type2']}}">
                        @else
                        <input type="text" id="type2" name="type2">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax2))
                        @if($tax2==1)    
                        <label for="category3"><input type="radio" id="category3" name="tax2" value="1" checked>税率10%</label>
                        @else
                        <label for="category4"><input type="radio" id="category4" name="tax2" value="2" checked>税率8%</label>
                        @endif
                    @else    
                        <label for="category3"><input type="radio" id="category3" name="tax2" value="1" checked>税率10%</label>
                        <label for="category4"><input type="radio" id="category4" name="tax2" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type3" class="col-md-4 col-form-label text-md-end">{{ __('内訳3') }}</label>
                        @if(isset($type3))
                        <input type="text" id="type3" name="type3" value="{{$data['type3']}}">
                        @else
                        <input type="text" id="type3" name="type3">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax3))
                        @if($tax3==1)       
                        <label for="category5"><input type="radio" id="category5" name="tax3" value="1" checked>税率10%</label>
                        @else
                        <label for="category6"><input type="radio" id="category6" name="tax3" value="2"checked>税率8%</label>
                        @endif
                    @else   
                        <label for="category5"><input type="radio" id="category5" name="tax3" value="1" checked>税率10%</label>
                        <label for="category6"><input type="radio" id="category6" name="tax3" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type4" class="col-md-4 col-form-label text-md-end">{{ __('内訳4') }}</label>
                        @if(isset($type4))
                        <input type="text" id="type4" name="type4" value="{{$data['type4']}}">
                        @else
                        <input type="text" id="type4" name="type4">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax4))
                        @if($tax4==1)      
                        <label for="category7"><input type="radio" id="category7" name="tax4" value="1" checked>税率10%</label>
                        @else
                        <label for="category8"><input type="radio" id="category8" name="tax4" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category7"><input type="radio" id="category7" name="tax4" value="1" checked>税率10%</label>
                        <label for="category8"><input type="radio" id="category8" name="tax4" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('内訳5') }}</label>
                        @if(isset($type5))
                        <input type="text" id="type5" name="type5" value="{{$data['type5']}}">
                        @else
                        <input type="text" id="type5" name="type5">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax5))
                        @if($tax5==1)     
                        <label for="category9"><input type="radio" id="category9" name="tax5" value="1" checked>税率10%</label>
                        @else
                        <label for="category10"><input type="radio" id="category10" name="tax5" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category9"><input type="radio" id="category9" name="tax5" value="1" checked>税率10%</label>
                        <label for="category10"><input type="radio" id="category10" name="tax5" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
                <div class="r-box">
                    <div class="form-block">
                        <label for="type6" class="col-md-4 col-form-label text-md-end">{{ __('内訳6') }}</label>
                        @if(isset($type6))
                        <input type="text" id="type6" name="type6" value="{{$data['type6']}}">
                        @else
                        <input type="text" id="type6" name="type6">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax6))
                        @if($tax6==1)      
                        <label for="category11"><input type="radio" id="category11" name="tax6" value="1" checked>税率10%</label>
                        @else
                        <label for="category12"><input type="radio" id="category12" name="tax6" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category11"><input type="radio" id="category11" name="tax6" value="1" checked>税率10%</label>
                        <label for="category12"><input type="radio" id="category12" name="tax6" value="2">税率8%</label>
                    @endif
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type7" class="col-md-4 col-form-label text-md-end">{{ __('内訳7') }}</label>
                        @if(isset($type7))
                        <input type="text" id="type7" name="type7" value="{{$data['type7']}}">
                        @else
                        <input type="text" id="type7" name="type7">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax7))
                        @if($tax7==1)     
                        <label for="category13"><input type="radio" id="category13" name="tax7" value="1" checked>税率10%</label>
                        @else
                        <label for="category14"><input type="radio" id="category14" name="tax7" value="2" checked>税率8%</label>
                        @endif
                    @else
                    <label for="category13"><input type="radio" id="category13" name="tax7" value="1" checked>税率10%</label>
                    <label for="category14"><input type="radio" id="category14" name="tax7" value="2" >税率8%</label>
                    @endif
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type8" class="col-md-4 col-form-label text-md-end">{{ __('内訳8') }}</label>
                        @if(isset($type8))
                        <input type="text" id="type8" name="type8" value="{{$data['type8']}}">
                        @else
                        <input type="text" id="type8" name="type8">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax8))
                        @if($tax8==1)     
                        <label for="category15"><input type="radio" id="category17" name="tax8" value="1" checked>税率10%</label>
                        @else
                        <label for="category16"><input type="radio" id="category16" name="tax8" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category15"><input type="radio" id="category17" name="tax8" value="1" checked>税率10%</label>
                        <label for="category16"><input type="radio" id="category16" name="tax8" value="2">税率8%</label>
                    @endif
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type9" class="col-md-4 col-form-label text-md-end">{{ __('内訳9') }}</label>
                        @if(isset($type9))
                        <input type="text" id="type9" name="type9" value="{{$data['type9']}}">
                        @else
                        <input type="text" id="type9" name="type9">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax9))
                        @if($tax9==1) 
                        <label for="category17"><input type="radio" id="category17" name="tax9" value="1" checked>税率10%</label>
                        @else
                        <label for="category18"><input type="radio" id="category18" name="tax9" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category17"><input type="radio" id="category17" name="tax9" value="1" checked>税率10%</label>
                        <label for="category18"><input type="radio" id="category18" name="tax9" value="2">税率8%</label>
                    @endif
                    </div>
                </div>   <div class="r-box">
                    <div class="form-block">
                        <label for="type10" class="col-md-4 col-form-label text-md-end">{{ __('内訳10') }}</label>
                        @if(isset($type10))
                        <input type="text" id="type10" name="type10" value="{{$data['type10']}}">
                        @else
                        <input type="text" id="type10" name="type10">
                        @endif
                    </div>
                    <div class="form-block">
                    @if(isset($tax10))
                        @if($tax10==1) 
                        <label for="category19"><input type="radio" id="category19" name="tax10" value="1" checked>税率10%</label>
                        @else
                        <label for="category20"><input type="radio" id="category20" name="tax10" value="2" checked>税率8%</label>
                        @endif
                    @else
                        <label for="category19"><input type="radio" id="category19" name="tax10" value="1" checked>税率10%</label>
                        <label for="category20"><input type="radio" id="category20" name="tax10" value="2">税率8%</label>
                    @endif
                    </div>
                </div>
            
                <button type="submit">会社情報を登録する</button>
            </form>
        </div>
    </div>

</body>
</html>
