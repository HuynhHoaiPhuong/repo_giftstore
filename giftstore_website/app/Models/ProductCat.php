<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductList;

class ProductCat extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_list',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'date_created',
        'date_updated',
    ];
    public function productlist(){
        return $this->belongsTo(ProductList::class, 'id_list', 'id');
    }
    public function products(){
        return $this->hasMany(Product::class,'id_cat','id');
    }
}
