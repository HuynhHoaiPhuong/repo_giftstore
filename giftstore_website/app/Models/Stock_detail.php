<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_stock',
        'id_product',
        'quantity',
        'price_pay',
        'total_price',
        'date_created',
        'date_updated',
        'status',
    ];

    public $timestamp = false;
}
