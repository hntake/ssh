@component('mail::message')
# ギフトカードのご案内

こんにちは！

あなたに{{$store}}のギフトカードが贈られました。以下のリンクからギフトカードを受け取ることができます。

@component('mail::button', ['url' => $giftUrl])
ギフトカードを受け取る
@endcomponent

ギフトカードの金額は ¥{{ $price }} です。

ありがとうございます。

@endcomponent