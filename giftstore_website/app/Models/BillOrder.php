<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_producer',
        'id_user',
        'id_stock',
        'quantity',        
        'total_price',
        'date_order',
        'status',
    ];
    public $timestamp = false;
}
