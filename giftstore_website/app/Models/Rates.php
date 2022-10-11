<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Members;
use App\Models\Products;

class Rates extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_member',
        'id_product',
        'star',
        'comment',
        'numb_like',
        'date_created',
        'status'
    ];
    public $timestamp = false;

    public function members(){
        return $this->belongsTo(Members::class, 'id_member', 'id');
    }
    public function products(){
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }
}
