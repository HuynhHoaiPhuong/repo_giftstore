<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
use App\Models\User;
use App\Models\WareHouse;
use App\Models\Payment;

class BillOrder extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_bill_order',
        'id_provider',
        'id_payment',
        'id_user',
        'id_warehouse',
        'total_quantity',        
        'total_price',
        'date_order',
        'date_of_payment',
        'status',
    ];
    
    public function provider(){
        return $this->belongsTo(Provider::class, 'id_provider', 'id_provider');
    }
    public function payment(){
        return $this->belongsTo(Payment::class, 'id_payment', 'id_payment');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function wareHouse(){
        return $this->belongsTo(WareHouse::class, 'id_warehouse', 'id_warehouse');
    }}
