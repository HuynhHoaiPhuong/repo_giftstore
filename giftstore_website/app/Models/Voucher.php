<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_voucher',
        'name',
        'code',
        'number_of_uses',
        'percent_price',
        'max_price',
        'min_price',
        'description',
        'start_day',
        'expiration_date',
        'status'
    ];
}
