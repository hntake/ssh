<?php

//namespace App\Models;
namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Out extends Model
{
    /* use HasFactory; */

    protected $fillable = ['id','product_id','out_amount','staff','name_id'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
