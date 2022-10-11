<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillOrders;
use App\Models\Products;

class BillOrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_bill_order',
        'id_product',
        'price_order',
        'quantity',
        'total_price',
        'status'
    ];
    public $timestamp = false;


    public function billOrders(){
        return $this->belongsTo(BillOrders::class, 'id_bill_order', 'id');
    }
    public function products(){
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }
}
