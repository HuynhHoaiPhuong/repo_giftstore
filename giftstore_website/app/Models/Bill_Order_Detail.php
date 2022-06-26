<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill_Order;
use App\Models\Product;

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


    public function billOrder(){
        return $this->belongsTo(Bill_Order::class, 'id_bill_order', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }

}
