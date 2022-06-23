<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_stock',
        'id_product',
        'quantity',
        'price_pay',
        'total_price',
        'date_create',
        'date_update',
        'status',
    ];

    public $timestamp = false;
}
