<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ActivityHistories extends Model
{
    use HasFactory;
    protected $table = 'activity_histories';
    public $timestamps = true;
    protected $fillable = [
        'id_activity_history',
        'id_user',
        'activity',
        'type',
        'created_at',
        'updated_at',
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
