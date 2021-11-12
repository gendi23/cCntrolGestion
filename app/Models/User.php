<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'empresa_id',
        'role_id',
        'name',
        'email',
        'password',
        'token_password',
        'token_email',
        'is_active',
        'is_primary',
        'is_verified',
        'notifications'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN = 1;
    const ARMADOR = 2;
    const AUDITOR = 3;

    public static function isAdmin(){
        return Auth::user()->role_id === self::ADMIN;
    }

    public static function isArmador(){
        return Auth::user()->role_id === self::ARMADOR;
    }

    public static function isAdminMaritimo(){
        return Auth::user()->role_id === self::AUDITOR;
    }
    /* Foreign Keys */

    public function empresa(){
        return $this->belongsto('App\Models\Empresa', 'empresa_id');
    }

    public function role(){
        return $this->belongsto('App\Models\Role', 'role_id');
    }
}
