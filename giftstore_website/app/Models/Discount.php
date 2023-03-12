<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\ProductCat;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_discount',
        'id_rank',
        'id_cat',
        'payment_price',    
        'status'
    ];
    public $timestamps = false;
    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id_rank');
    }
    public function cat(){
        return $this->belongsTo(ProductCat::class, 'id_cat', 'id_product_cat');
    }

}
