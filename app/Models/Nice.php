<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{

    use HasFactory;

    protected $fillable = [
        'created_id',
        'created_user',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function post() {
        return $this->belongsTo('App\Models\Word');
    }

/*     public function Users() {
        return $this->hasOne(User::class, 'id','created_id');
    } */
}
