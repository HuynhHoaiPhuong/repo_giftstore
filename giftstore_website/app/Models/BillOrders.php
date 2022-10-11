<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producers;
use App\Models\Users;
use App\Models\Stocks;

class BillOrders extends Model
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
        'status'
    ];
    public $timestamp = false;

    public function producers(){
        return $this->belongsTo(Producers::class, 'id_producer', 'id');
    }
    public function users(){
        return $this->belongsTo(Users::class, 'id_user', 'id');
    }
    public function stocks(){
        return $this->belongsTo(Stocks::class, 'id_stock', 'id');
    }
}
