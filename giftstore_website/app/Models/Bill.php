<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
use App\Models\Voucher;
use App\Models\Payment;
class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    public $timestamps = false;
    protected $fillable = [
        'id_bill',
        'id_member', 
        'id_voucher',
        'id_payment',
        'total_quantity',
        'total_price',
        'order_date',
        // 'date_of_payment'
    ];

    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

    public function voucher(){
        return $this->belongsTo(Voucher::class, 'id_voucher', 'id_voucher');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'id_payment', 'id_payment');
    }

}
