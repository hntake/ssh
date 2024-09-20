<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;


class Gift extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'uuid',
        'valid',
        'store_uuid',
        'balance',
    ];
    public function store() {
        return $this->belongsTo(Store::class, 'store_uuid', 'uuid'); 
    }
}
