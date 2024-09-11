<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Invoice extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'type1',
        'type2',
        'type3',
        'type4',
        'type5',
        'type6',
        'type7',
        'type8',
        'type9',
        'type10',
        'tax1',
        'tax2',
        'tax3',
        'tax4',
        'tax5',
        'tax6',
        'tax7',
        'tax8',
        'tax9',
        'tax10',
        'company_name',
        'postal_number',
        'address',
        'phone_number',
        'company_number',
        'email_verify_token',

    ];

}
