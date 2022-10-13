<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_rank',
        'rank_name',
        'point',
        'created_at',
        'updated_at'
    ];
}