<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    use HasFactory;
    protected $fillable = ['id','staff','status','supplier_name','due_date', 'item1','item2','item3','item4',
    'item5','item6','item7','item8','item9','item10','new_order1','new_order2','new_order3','new_order4','new_order5','new_order6','new_order7','new_order8','new_order9','new_order10'];

}
