<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\ProductCat;

class Discount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_discount',
        'id_rank',
        'id_product_cat',
        'percent_price',    
        'status'
    ];
    
    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id_rank');
    }
    public function productCat(){
        return $this->belongsTo(ProductCat::class, 'id_product_cat', 'id_product_cat');
    }

}
