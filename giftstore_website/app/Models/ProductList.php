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
}