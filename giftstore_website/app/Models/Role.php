<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory;
    protected $table = 'roles';
    protected $keyType = 'string';
    protected $primaryKey = 'id_role';
    protected $fillable=[
        'id_role',
        'name',
    ];
}
