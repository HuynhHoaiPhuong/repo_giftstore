<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
use App\Models\Product;

class StockDetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_stock_detail',
        'id_stock',
        'id_product',
        'quantity',
        'price_pay',
        'total_price',
        'status',
        'created_at',
        'updated_at',
    ];
    public function stock(){
        return $this->belongsTo(Stock::class, 'id_stock', 'id_stock');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
