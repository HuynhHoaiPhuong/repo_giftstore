<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bills;
use App\Models\Products;

class BillDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_bill',
        'id_product',
        'price',
        'quantity',
        'discount',
        'rate_status'
    ];
    public $timestamp = false;

    public function bills(){
        return $this->belongsTo(Bills::class, 'id_bill', 'id');
    }
    public function products(){
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }
}
