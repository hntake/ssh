<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>利用完了画面</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">

</head>
<body>
                <div class="container">
                    <div class="body_container">
                                    <div class="header">
                                        <h2>こちらの画面を<br>お店の方に見せてください。</h2>
                                    </div>
                                    <div style="text-align:center;">
                                        <span class="sp-none">
                                            @if($store->type == 1)
                                            <img src="/img/studies_100.png" alt="coupon" style="width:70%;">
                                            @elseif($store->type == 2)
                                            <img src="/img/studies_10.png" alt="coupon" style="width:70%;">
                                            @elseif($store->type == 3)
                                            <img src="/img/studies_5.png" alt="coupon" style="width:70%;">
                                            @elseif($store->type == 4)
                                            <img src="/img/studies_drink.png" alt="coupon" style="width:70%;">
                                            @else
                                            <img src="/img/studies_sweet.png" alt="coupon" style="width:70%;">
                                            @endif
                                        </span>
                                    </div>
                                    <div>
                                            <td class="subheadline" style="font-size:25px;">クーポン利用完了しました。<br>
                                            ご利用いただきありがとうございました。<br><br>又、<span style="color:green; font-weight:bold;">エイゴメ</span>をチャレンジしてみてください。
                                        </div>
                                    <div class="logo">
                                        <a href="{{ url('/') }}"><img src="/img/logo_llco.png" alt="logo" style="width:50%;"></a>
                                    </div>
                    </div>
                </div>
    <script>
$(function() {
  history.pushState(null, null, null);

  $(window).on("popstate", function(){
    history.pushState(null, null, null);
  });
});
</script>
</body>
</html>


