<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;
use App\Models\Category;

class Discount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_discount',
        'id_rank',
        'id_category',
        'percent_price',    
        'status'
    ];
    
    public function rank(){
        return $this->belongsTo(Rank::class, 'id_rank', 'id_rank');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

}
