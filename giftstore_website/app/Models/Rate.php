<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member',
        'id_product',
        'star',
        'comment',
        'numb_like',
        'date_created',
        'status',
    ];
    public $timestamp = false;
}
