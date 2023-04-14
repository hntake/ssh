<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Coupon;
use App\Models\Store;
use Carbon\Carbon;



class CouponMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email,$store_id,$store_due,$coupon_id,$store_name,$date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input,$coupon_id)
    {
        $this->email = $input['email'];
        $this->store_id = Coupon::where('id','=',$coupon_id)->value('uuid');
        $this->store_due = Store::where('uuid','=',$this->store_id)->value('due');
        $this->coupon_id = Coupon::where('id','=',$coupon_id)->value('id');
        $this->store_name = Coupon::where('id','=',$coupon_id)->value('store_name');
        $this->date =  Carbon::tomorrow()->format('Y-m-d');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
        ->from('info@itcha50.com')
        ->subject('クーポンです')
        ->view('coupon.auto')
        ->with([
            'email' => $this->email,
            'store_id' => $this->store_id,
            'store_due' => $this->store_due,
            'coupon_id' => $this->coupon_id,
            'store_name' => $this->store_name,
            'date' => $this->date,
        ]);
    }
}
