<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stocks;
use App\Models\Products;

class StockDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_stock',
        'id_product',
        'quantity',
        'price_pay',
        'total_price',
        'date_created',
        'date_updated',
        'status'
    ];

    public $timestamp = false;

    public function stocks(){
        return $this->belongsTo(Stocks::class, 'id_stock', 'id');
    }
    public function products(){
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }
}
