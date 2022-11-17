<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_voucher',
        'code',
        'max_use',
        'max_price',
        'percent_price',
        'min_price_pay',
        'description',
        'date_start',
        'date_end',
        'status'
    ];
    public $timestamps = false;
}
