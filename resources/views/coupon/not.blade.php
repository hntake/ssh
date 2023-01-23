<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>送信完了画面</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">





</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>

                <div class="container">
                    <div class="body_container">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="top">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="logo">
                                                                <a href="{{ url('/') }}"><img src="/img/logo_llco.png" alt="logo" style="width:50%;"></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <div class="header">
                                            <tr>
                                                <td>{{ __('またのご利用お待ちしております。') }}</td>
                                            </tr>
                                            <div class="logo">
                                                <a href="{{ url('use') }}"><img src="/img/eng50cha.png" alt="logo" style="width:50%;"></a>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                        </div>

                    </div>
                </div>
                </td>
            </tr>
        </tbody>
    </table>
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



