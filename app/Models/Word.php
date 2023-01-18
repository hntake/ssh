<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Textbook;
use App\Models\Type;
use App\Models\History;

class Word extends Model
{
    use HasFactory;

    protected $table ='words';

    protected $fillable = [
        'type',
        'textbook',
        'test_name',
        'user_name',
        'ja1',
        'ja2',
        'ja3',
        'ja4',
        'ja5',
        'ja6',
        'ja7',
        'ja8',
        'ja9',
        'ja10',
        'en1',
        'en2',
        'en3',
        'en4',
        'en5',
        'en6',
        'en7',
        'en8',
        'en9',
        'en10',


    ];
    public function Type() {
        return $this->hasOne(Type::class, 'id','type');
    }
    public function Textbook() {
        return $this->hasOne(Textbook::class, 'id','textbook');
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }
    //「商品(products)はカテゴリ(category)に属する」というリレーション関係を定義する
    public function category()
    {
        return $this->belongsTo(Type::class);
    }
    /*お気に入り登録*/
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }

    /*later*/
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
