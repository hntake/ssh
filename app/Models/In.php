<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class In extends Model
{
    // use HasFactory;

    protected $fillable = ['id','product_id','in_amount','staff','name_id','voucher'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
