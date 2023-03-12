<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producer;
use App\Models\User;
use App\Models\Stock;

class BillOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bill_order',
        'id_producer',
        'id_user',
        'id_stock',
        'quantity',        
        'total_price',
        'date_order',
        'status'
    ];
    public $timestamps = false;

    public function producer(){
        return $this->belongsTo(Producer::class, 'id_producer', 'id_producer');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function stock(){
        return $this->belongsTo(Stock::class, 'id_stock', 'id_stock');
    }
}
