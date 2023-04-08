<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id_rank',
        'rank_name',
        'score_level',
        'status',
        'created_at',
        'updated_at',
    ];
}
