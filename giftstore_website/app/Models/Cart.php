<?php

namespace App\Models;

use App\Models\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member',
        'id_product',
        'quantity',
        'price_pay'
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id');
    }
}
