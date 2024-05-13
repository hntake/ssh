<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'address',
        'genre',
        'diet_id',
    ];

    public function Genre() {
        return $this->hasOne(Genre::class, 'id','genre');
    }

    public function diet()
    {
        return $this->hasOne(Diet::class, 'id', 'diet_id');
    }
}
