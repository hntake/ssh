<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Later extends Model
{
    use HasFactory;
    protected $fillable = [
        'later_test',
        'later_test_name',
        'later_test_type',
        'later_test_textbook',
        'created_user',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function post() {
        return $this->belongsTo('App\Models\Word');
    }
    public function Type() {
        return $this->hasOne(Type::class, 'id','type');
    }
    public function Textbook() {
        return $this->hasOne(Textbook::class, 'id','textbook');
    }

      // 履修しているかどうかを判定
  public function done($user, $word)
  {
    $cnt = Later::where('created_user', $user)
                ->where('later_test', $word)
                ->count();
    return $cnt;
  }
}
