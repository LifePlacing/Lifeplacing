<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MsgResetPassword as ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

    public function sendPasswordResetNotification($token) 
    { 
        $this->notify(new ResetPasswordNotification($token)); 

    }

    protected $fillable = [
        'name', 'email', 'password', 'sexo', 'foto',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
