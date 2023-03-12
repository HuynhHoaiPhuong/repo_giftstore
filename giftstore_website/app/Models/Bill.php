<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bill',
        'id_member', 
        'code_voucher',
        'total_price',
        'total_quantity',
        'payment',
        'date_order',
        'date_confirm',
        'status'
    ];

    public $timestamps = false;

    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

}
