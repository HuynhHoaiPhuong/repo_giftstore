<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_provider',
        'name',
        'address',
        'phone',
        'email',
        'status'
    ];}
