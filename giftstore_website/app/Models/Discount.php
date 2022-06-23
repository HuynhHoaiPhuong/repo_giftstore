<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\Category;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_rank',
        'id_cat',
        'payment_price',    
        'status',
    ];
    public $timestamp = false;
}
