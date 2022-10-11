<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ranks;
use App\Models\ProductCats;

class Discounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_rank',
        'id_cat',
        'payment_price',    
        'status'
    ];
    public $timestamp = false;

    public function ranks(){
        return $this->belongsTo(Ranks::class, 'id_rank', 'id');
    }
    public function cats(){
        return $this->belongsTo(ProductCats::class, 'id_cat', 'id');
    }
}
