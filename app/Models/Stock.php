<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Stock extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name','tel','email','password','email_verify_token','email_verified_at','postal','address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
