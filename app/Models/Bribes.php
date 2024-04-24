<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bribes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bribe',
    ];
}
