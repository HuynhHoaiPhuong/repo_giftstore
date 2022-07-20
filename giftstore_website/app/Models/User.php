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
    
    protected $table = 'tbl_user';
    // public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'id_role',
        'username',
        'password',
        'user_token',
        'photo',
        'fullname',
        'phone',
        'address',
        'gender',
        'birthday',
        'status',
    ];

    public $timestamp = false;

    public function role(){
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
    
}
