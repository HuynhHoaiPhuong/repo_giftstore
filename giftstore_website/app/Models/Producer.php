<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_producer',
        'name',
        'address',
        'phone',
        'email',
        'status'
    ];
    public $timestamps = false;
}
