<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_photo',
        'numerical_order',
        'name',
        'photo',
        'link',
        'type',
        'status',
        'created_at',
        'updated_at'
    ];
}