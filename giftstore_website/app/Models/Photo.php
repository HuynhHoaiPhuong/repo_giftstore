<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_photo',
        'numb',
        'photo',
        'link',
        'name',
        'type',
        'act',
        'status',
        'created_at',
        'updated_at'
    ];
}