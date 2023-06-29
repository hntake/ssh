<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>請求書 PDF</title>

        <!-- Fonts -->
        <link href="<https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap>" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body>
    <div class="container home">
        <div class="form">
            <h1>請求書作成</h1>
            <form action="{{ route('pdf') }}" method="GET">
                @csrf
                <div class="form-block">
                    <label for="project-name">案件名</label>
                    <input type="text" id="project-name" name="project-name">
                </div>
                <div class="form-block">
                    <label for="billing-address">請求先</label>
                    <input type="text" id="billing-address" name="billing-address">
                </div>
                <div class="form-block">
                    <label for="billing-date">請求日</label>
                    <input type="date" id="billing-date" name="billing-date">
                </div>
                <div class="r-box">
                    <label for="type1" class="col-md-4 col-form-label text-md-end">{{ __('種類') }}</label>
                        <div class="col-md-6">
                            <select name="type1">
                                @foreach(config('type') as $key => $work)
                                <option value="{{ $work}}" {{ old('type') === $work ? "selected" : ""}}>{{ $work }}</option>
                                @endforeach
                            </select>
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
                    <label for="type2" class="col-md-4 col-form-label text-md-end">{{ __('種類') }}</label>
                        <div class="col-md-6">
                            <select name="type2">
                                @foreach(config('type') as $key => $work)
                                <option value="{{ $work}}" {{ old('type') === $work ? "selected" : ""}}>{{ $work }}</option>
                                @endforeach
                            </select>
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
                    <label for="type3" class="col-md-4 col-form-label text-md-end">{{ __('種類') }}</label>
                        <div class="col-md-6">
                            <select name="type3">
                                @foreach(config('type') as $key => $work)
                                <option value="{{ $work}}" {{ old('type') === $work ? "selected" : ""}}>{{ $work }}</option>
                                @endforeach
                            </select>
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
                    <label for="type4" class="col-md-4 col-form-label text-md-end">{{ __('種類') }}</label>
                        <div class="col-md-6">
                            <select name="type4">
                                @foreach(config('type') as $key => $work)
                                <option value="{{ $work}}" {{ old('type') === $work ? "selected" : ""}}>{{ $work }}</option>
                                @endforeach
                            </select>
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
                    <label for="type5" class="col-md-4 col-form-label text-md-end">{{ __('種類') }}</label>
                        <div class="col-md-6">
                            <select name="type5">
                                @foreach(config('type') as $key => $work)
                                <option value="{{ $work}}" {{ old('type') === $work ? "selected" : ""}}>{{ $work }}</option>
                                @endforeach
                            </select>
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
                <button type="submit">請求書作成</button>
            </form>
        </div>
    </div>

</body>
</html>
