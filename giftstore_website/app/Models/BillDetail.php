<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Discount;

class BillDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_bill_detail',
        'id_bill',
        'id_product',
        'id_discount',
        'quantity',
        'total_price',
        'rate_status',
    ];
    
    public function bill(){
        return $this->belongsTo(Bill::class, 'id_bill', 'id_bill');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
    public function discount(){
        return $this->belongsTo(Discount::class, 'id_discount', 'id_discount');
    }
}
