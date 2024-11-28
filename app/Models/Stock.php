<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class Stock extends Authenticatable
{
    use HasFactory,Billable;

    protected $fillable = [
        'name','tel','email','password','email_verify_token','email_verified_at','postal','address','stripe_id', 'payment_method','paid','pm_type','pm_last_four','reminder_email_date'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
