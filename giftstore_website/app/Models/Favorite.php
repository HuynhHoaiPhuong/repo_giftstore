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
        'id_favorite',
        'id_product',
        'id_member',
        'status',
    ];
    public $timestamps = false;
    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
