<?php


namespace App\Mail;

use App\Models\Gift;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftMail extends Mailable
{
    use Queueable, SerializesModels;

    public $gift;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Gift $gift)
    {
        $this->gift = $gift;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ギフトカードのご案内')
                    ->markdown('emails.gift')
                    ->with([
                        'giftUrl' => url('gift/use/' . $this->gift->uuid),
                        'price' => $this->gift->price,
                        'store' => $this->gift->store->name

                    ]);
    }
}
