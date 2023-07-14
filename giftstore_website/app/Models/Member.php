<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rank;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_user',
        'id_rank',
        'current_point',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id_rank');
    }

    public function carts(){
        return $this->hasMany(Cart::class, 'id_member', 'id_member');
    }
}