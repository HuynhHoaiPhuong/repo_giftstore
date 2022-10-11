<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class ActivitiesHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_user',
        'activity',
        'date_created',    
        'type'
    ];
    public $timestamp = false;

    public function users(){
        return $this->belongsTo(Users::class, 'id_user', 'id');
    }
}
