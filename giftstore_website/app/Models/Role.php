<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_role';

    protected $fillable=[
        'id',
        'name',
    ];
}
