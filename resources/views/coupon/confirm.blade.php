<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>確認画面 </title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mail_confirm.css') }}">

    <script type="text/javascript">
        history.pushState(null, null, null);

        window.addEventListener("popstate", function() {
        history.pushState(null, null, null);
        });
    </script>



</head>
<body>
    <table>
        <tbody>
            <tr>
                <td>

                    <div class="container">
                        <div class="body_container">
                            <form method="POST" action="{{ route('coupon.send',['coupon_id'=>$coupon_id]) }}">
                                @csrf
                                確認お願い致します。
                                <br>
                                <br>
                                    <label>メールアドレス</label><br>
                                {{ $input['email'] }}
                                <input name="email" value="{{ $input['email'] }}" type="hidden">
                                <br>
                                <br>
                                入力内容修正が必要な場合はブラウザの戻るボタンでお戻りください
                                <br>
                                <br>
                                <button type="submit_button" name="action" value="submit">
                                送信する
                                </button>
                            </form>
                            <input type="hidden" name="coupon_id" value="{{$coupon_id}}">
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        history.pushState(null, null, null);

        window.addEventListener("popstate", function() {
        history.pushState(null, null, null);
        });
    </script>
</body>
</html>
