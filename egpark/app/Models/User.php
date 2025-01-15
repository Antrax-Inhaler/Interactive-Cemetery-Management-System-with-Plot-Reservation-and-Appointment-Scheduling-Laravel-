<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\ResetPasswordNotification;

use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use CanResetPassword;
    use Notifiable;
    use HasFactory;
    // Define fillable attributes
    protected $fillable = [
        'name', 'email', 'password', 'contact', 'address', 'profile_image',
    ];

    // Hidden attributes
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Attribute casting
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}

}
