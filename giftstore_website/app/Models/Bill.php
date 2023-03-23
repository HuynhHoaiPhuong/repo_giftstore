<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;
class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    public $timestamps = false;
    protected $fillable = [
        'id_bill',
        'id_member', 
        'code_voucher',
        'total_price',
        'total_quantity',
        'payment',
        'status',
        'date_order',
        'date_confirm',
    ];

    public function member(){
        return $this->belongsTo(Member::class, 'id_member', 'id_member');
    }

}
