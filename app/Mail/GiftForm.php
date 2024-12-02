<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftForm extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $name;
    private $group;
    private $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->email = $inputs['email'];
        $this->name = $inputs['name'];
        $this->group  = $inputs['group'];
        $this->phone  = $inputs['phone'];
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
            ->to('hntake@gmail.com')
            ->subject('llcoより自動送信メールです')
            ->view('gift/mail')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'group'  => $this->group,
                'phone'  => $this->phone,
            ]);
    }
}
