<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\PasswordResetNotification;
/* use Laravel\Cashier\Billable;
 */


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;/* Billable;*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'school',
        'email',
        'password',
        'image',
        'place',
        'year',
        'point',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     /**
     * パスワードリセット通知の送信をオーバーライド
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new PasswordResetNotification($token));
    }
    public function Year() {
        return $this->hasOne(Year::class, 'id','year');
    }
    public function Place() {
        return $this->hasOne(Place::class, 'id','place');
    }
}
