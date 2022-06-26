<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'date_created',
        'date_updated',
    ];
    public function products(){
        //Tham số thứ 2 - lấy category_id từ class tham chiếu (Product) - foreign key
        //Tham số thứ 3- lấy category_id từ class chính (Category) - local key
        return $this->hasMany(Product::class,'id_list','id');
    }
    public function cats(){
        return $this->hasMany(Product::class,'id_cat','id');
    }
}
