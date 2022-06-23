<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Member;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_product',
        'id_member',
        'status',
    ];
    public $timestamp = false;
}
