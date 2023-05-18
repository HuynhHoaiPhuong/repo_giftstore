<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseDetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_warehouse_detail',
        'id_warehouse',
        'id_product',
        'price_pay',
        'total_price',
        'status',
        'created_at',
        'updated_at',
    ];
    public function warehouse(){
        return $this->belongsTo(WareHouse::class, 'id_warehouse', 'id_warehouse');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
