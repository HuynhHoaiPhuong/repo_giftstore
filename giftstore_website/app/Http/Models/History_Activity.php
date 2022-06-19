<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class History_Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'activity',
        'date_created',
        'id_user',
        'type',
    ];
    public $timestamp = false;
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
