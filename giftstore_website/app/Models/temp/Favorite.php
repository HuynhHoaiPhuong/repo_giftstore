<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Product;
class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_product',
        'id_member',
        'status',
    ];
    public $timestamp = false;

    public function member(){
        return $this->belongsTo(Rank::class, 'id_member', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
