<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Ship;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 注文インスタンス
     *
     * @var \App\Models\Ship
     */
    protected $ship;

    public $data;      //追加
    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param Ship $ship
     * @return void
     */
    public function __construct($data,  Ship $ship)
    {
        $this->data = $data;      //追加
        $this->ship = $ship;      //追加
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('email')
        ->subject('注文書')
        ->with([
            'data'=>$this->data,
            'ship'=>$this->ship,
    ]);
    }
}
