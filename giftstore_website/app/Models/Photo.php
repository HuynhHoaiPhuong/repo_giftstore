<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'numb',
        'photo',
        'link',
        'name',
        'type',
        'act',
        'status',
        'date_created',
        'date_updated'
    ];
}