<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity_History extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_user',
        'activity',
        'date_create',    
        'type',
    ];
    public $timestamp = false;

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
