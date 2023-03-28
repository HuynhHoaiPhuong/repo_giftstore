<?php

namespace App\Models;

use App\Models\ProductCat;
use App\Models\ProductList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product',
        'id_product_list',
        'id_product_cat',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'price',
        'code',
        'created_at',
        'updated_at',
    ];
    public function productlist(){
        return $this->belongsTo(ProductList::class, 'id_product_list', 'id_product_list');
    }
    public function productcat(){
        return $this->belongsTo(ProductCat::class, 'id_product_cat', 'id_product_cat');
    }
}
