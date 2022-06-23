<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member', 
        'code_voucher',
        'total_price',
        'total_quantity',
        'payment',
        'date_order',
        'date_confirm',
        'status',
    ];

    public $timestamp = false;
}
