<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Provider;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_product',
        'id_category',
        'id_provider',
        'numerical_order',
        'name',
        'code',
        'photo',
        'price',
        'slug',
        'status',
        'created_at',
        'updated_at',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }
    public function provider(){
        return $this->belongsTo(Provider::class, 'id_provider', 'id_provider');
    }
}
