<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table ='histories';

    protected $fillable = [
        'test_id',
        'type',
        'textbook',
        'test_name',
        'user_name',
        'tested_user',
        'tested_name',
        'school',
    ];
    public function word()
    {
        return $this->hasMany(Word::class);
    }
    public function Type() {
        return $this->hasOne(Type::class, 'id','type');
    }
    public function Textbook() {
        return $this->hasOne(Textbook::class, 'id','textbook');
    }
}
