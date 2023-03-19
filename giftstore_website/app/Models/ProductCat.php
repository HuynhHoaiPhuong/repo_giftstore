<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductList;

class ProductCat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product_cat',
        'id_product_list',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'create_at',
        'update_at',
    ];
    public function productlist(){
        return $this->belongsTo(ProductList::class, 'id_product_list', 'id_product_list');
    }
}