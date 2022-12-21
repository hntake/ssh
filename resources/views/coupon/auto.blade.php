{!! $store_name !!}クーポン<br>
<br>
■使用期限<br>
@if($store_due ==1)
{!! $date !!}から30日間<br>
@elseif($store_due ==2)
{!! $date !!}から60日間<br>
@else
{!! $date !!}から180日間<br>
@endif
<br>
■クーポン利用の際にこちらをクリックしてください<br>
https://eng50cha.com/coupon/index/{!! $store_id !!}/coupon/{!!$coupon_id !!}<br>
<br>
