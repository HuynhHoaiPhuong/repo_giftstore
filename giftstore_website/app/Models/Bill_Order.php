<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producer;
use App\Models\User;
use App\Models\Stock;

class Bill_Order extends Model
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

    public function producer(){
        return $this->belongsTo(Producer::class, 'id_producer', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function sotck(){
        return $this->belongsTo(Stock::class, 'id_stock', 'id');
    }
}
