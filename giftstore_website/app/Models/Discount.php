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
        'id',
        'id_rank',
        'id_cat',
        'payment_price',    
        'status',
    ];
    public $timestamp = false;

    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id');
    }
    public function cat(){
        return $this->belongsTo(ProductCat::class, 'id_cat', 'id');
    }

}
