<?php

namespace App\Models\Models;

use App\Models\ProductCat;
use App\Models\ProductList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_list',
        'id_cat',
        'numb',
        'photo',
        'slug',
        'name',
        'description',
        'price',
        'code',
        'status',
        'date_created',
        'date_updated'
    ];
    public function productlist(){
        return $this->belongsTo(ProductList::class, 'id_list', 'id');
    }
    public function productcat(){
        return $this->belongsTo(ProductCat::class, 'id_cat', 'id');
    }
}
