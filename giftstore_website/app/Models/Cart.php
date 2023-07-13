<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Member;


class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_cart',
        'id_member',
        'id_product',
        'quantity',
        'price_pay',
    ];
    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
