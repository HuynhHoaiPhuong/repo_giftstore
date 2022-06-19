<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Bill_Order;
class Bill_Order_Details extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'price_order',
        'id_product',
        'quantity',
        'total_price',
        'id_bill_order',
        'status',
    ];
    public $timestamp = false;
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
    public function billOrder(){
        return $this->belongsTo(BillOrder::class, 'id_bill_order', 'id_bill_order');
    }
}
