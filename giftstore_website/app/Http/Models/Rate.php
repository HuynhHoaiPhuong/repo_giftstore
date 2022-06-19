<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Member;
class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member',
        'id_product',
        'start',
        'comment',
        'date_created',
        'like',
        'status',
    ];
    public $timestamp = false;
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
}
