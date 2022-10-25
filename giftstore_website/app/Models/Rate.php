<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member',
        'id_product',
        'star',
        'comment',
        'numb_like',
        'date_created',
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
