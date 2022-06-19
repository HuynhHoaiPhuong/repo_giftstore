<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\Category;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'payment_price',
        'id_rank',
        'id_cat',
        'status',
    ];
    public $timestamp = false;
    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id_rank');
    }
    public function cat(){
        return $this->belongsTo(Cat::class, 'id_cat', 'id_cat');
    }
}
