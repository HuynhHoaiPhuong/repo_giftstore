<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
