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
        'id',
        'id_user',
        'id_rank',
        'current_point',
        'status',
        'date_created',
        'date_updated'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id');
    }
}
