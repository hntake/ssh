<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Form extends Model
{
    use HasFactory;

    public function Category() {
        return $this->hasOne(Category::class, 'id','category');
    }
}
