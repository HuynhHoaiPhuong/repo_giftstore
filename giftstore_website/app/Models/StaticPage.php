<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_static',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'content',
        'type',
        'status',
        'created_at',
        'updated_at'
    ];
}