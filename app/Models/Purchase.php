<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
     // 使用するテーブル
    protected $table = 'purchases';

    // Mass assignment可能なフィールド
    protected $fillable = [
        'store',
        'amount',
        'uuid',
    ];
}
