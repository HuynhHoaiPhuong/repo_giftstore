<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
use App\Models\Product;

class StockDetail extends Model
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

    public function stock(){
        return $this->belongsTo(Stock::class, 'id_stock', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
