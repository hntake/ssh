<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Models\Ship;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Collection; // コレクションを使うためのインポートが必要です

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * 注文インスタンス
     *
     * @var \App\Models\Ship
     */
    protected $ship;

    /**
     * 注文インスタンス
     *
     * @var \App\Models\Stock
     */
    protected $stock;
    protected $ships; // 配列やコレクションを扱う変数名

    public $data;      //追加
    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param Ship $ship
     * @return void
     */
    public function __construct(array $data, Collection $ships, Stock $stock) // コレクションに型を変更
    {
        $this->data = $data;      //追加
        $this->ships = $ships;      //追加
        $this->stock = $stock;      //追加

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
            'ships'=>$this->ships,
            'stock'=>$this->stock,
    ]);
    }
}
