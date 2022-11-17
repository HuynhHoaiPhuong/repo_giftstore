<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use App\Models\Product;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bill_detail',
        'id_bill',
        'id_product',
        'price',
        'quantity',
        'discount',
        'rate_status'
    ];
    public $timestamps = false;

    public function bill(){
        return $this->belongsTo(Bill::class, 'id_bill', 'id_bill');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
