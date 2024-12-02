eギフトカードの申し込みを受け付けました。<br>
<br>
■メールアドレス<br>
{!! $email !!}<br>
<br>
■お名前<br>
{!! $name !!}<br>
<br>
■会社名・店舗名<br>
{!! $group !!}<br>
<br>
■電話番号<br>
{!! $phone !!}<br>
<br>
@if(isset($body))
■質問内容<br>
{!! nl2br($body) !!}<br>
@endif
