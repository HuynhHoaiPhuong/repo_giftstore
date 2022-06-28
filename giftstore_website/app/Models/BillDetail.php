<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_bill',
        'id_product',
        'price',
        'quantity',
        'discount',
        'rate_status',
    ];
    public $timestamp = false;
}
