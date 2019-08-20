<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class AccessmUser extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    protected $table = 'Access_m_User';

    use Authenticatable, CanResetPassword, Notifiable, Encryptable;

    protected $encryptable = ['roleid', 'name', 'email'];
    protected $fillable = ['name', 'email', 'password', 'uniquecode', 'username', 'roleid'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];
}
