<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_Order_Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_bill_order',
        'id_product',
        'price_order',
        'quantity',
        'total_price',
        'status',
    ];
    public $timestamp = false;
}
