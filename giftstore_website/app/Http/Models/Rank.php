<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'point',
        'status',
    ];
    public $timestamp = false;
}
