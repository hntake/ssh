<?php

// namespace App\Models;
namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Out;

class Product extends Model
{
    // use HasFactory;

    protected $fillable = ['id', 'product_name','stock','order','supplier_name','qr_code_path'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function out()
    {
        return $this->hasMany(Out::class);
    }

}
