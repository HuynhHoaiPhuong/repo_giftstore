<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'content',
        'type',
        'status',
        'date_created',
        'date_updated'
    ];
}
