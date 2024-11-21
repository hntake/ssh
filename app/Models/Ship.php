<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $fillable = [ 'product_name','new_order','`supplier_name', 'staff', 'order_id','form_id','status'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function out()
    {
        return $this->hasMany(Out::class);
    }
}
