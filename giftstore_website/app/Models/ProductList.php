<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_product_list',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'created_at',
        'updated_at'
    ];
    // public function products(){
    //     //Tham số thứ 2 - lấy category_id từ class tham chiếu (Product) - foreign key
    //     //Tham số thứ 3- lấy category_id từ class chính (Category) - local key
    //     return $this->hasMany(Product::class,'id_product_list','id_product_list');
    // }
    // public function cats(){
    //     return $this->hasMany(Product::class,'id_product_cat','id_product_cat');
    // }
}