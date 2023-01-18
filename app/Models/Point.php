<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table ='points';

    protected $fillable = [
        'user_id','test_name','type'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
    public function Type() {
        return $this->hasOne(Type::class, 'id','type');
    }
}
