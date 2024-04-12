<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;


class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $email_verify_token;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $user, $email_verify_token)
    {
        $this->user = $user;
        $this->email_verify_token = $email_verify_token;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('invoice.register_mail')
        ->with([
            'email_verify_token' => $this->user->email_verify_token,
            'id' => $this->user->id
            ])
            ->subject('メールアドレスの確認'); // メールの件名を設定する
    }
}
