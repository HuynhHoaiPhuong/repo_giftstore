<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillOrder;
use App\Models\Product;

class BillOrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_bill_order_detail',
        'id_bill_order',
        'id_product',
        'price_order',
        'quantity',
        'total_price'
    ];
    
    public function billOrder(){
        return $this->belongsTo(BillOrder::class, 'id_bill_order', 'id_bill_order');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }

}
