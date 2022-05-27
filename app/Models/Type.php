<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',

    ];

    //m_categoriesテーブルから::pluckでcategory_nameとidを抽出し、$categoriesに返す関数を作る
    public function getLists()
    {
        $types = Type::pluck('type', 'id');

        return $types;
    }
    //「カテゴリ(category)はたくさんの商品(products)をもつ」というリレーション関係を定義する
    public function products()
    {
        return $this->hasMany(Word::class);
    }
}
