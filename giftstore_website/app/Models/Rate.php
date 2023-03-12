<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Product;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_rate',
        'id_member',
        'id_product',
        'star',
        'comment',
        'numb_like',
        'date_created',
        'status'
    ];
    public $timestamps = false;

    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
